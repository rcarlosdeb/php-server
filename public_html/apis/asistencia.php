<?php
include_once('../common/include.php');
include_once('../common/encipher.php');
$user = json_decode(file_get_contents("php://input"));
if(!$user->id_usuario){
    sendResponse(400, [] , 'ID usuario Requiredo');  
}else if(!$user->id_materia){
    sendResponse(400, [] , 'ID de materia Requiredo');  
}else{
    $conn=getConnection();
    if($conn==null){
        sendResponse(500,$conn,'Error de coneccion con el servidor');
    }else{
        date_default_timezone_set('America/Los_Angeles');
        $fecha = "".date("Y")."-".date("m")."-".date("d")."";
        $sql2="SELECT id_usuario_materia FROM usuario_materia WHERE id_usuario=".$user->id_usuario." AND id_materia=".$user->id_materia;
        
        //$result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        if ($result2) {
            $arreglo=array();
            while($row = $result2->fetch_assoc()) {
                $ar=array(
                    "id_usuario_materia" =>  $row["id_usuario_materia"],
                );
                array_push($arreglo,$ar);
            }
            $id_user=$arreglo[0]["id_usuario_materia"];
            $sql=" INSERT INTO asistencia(qr,validacion,fecha,id_usuario_materia)";
            $sql .= "VALUES (1,1,'".$fecha."','".$id_user."')";
            $result = $conn->query($sql);
            if ($result) {
                sendResponse(200,$id_user,'Asistencia registrada');
            }else{
                sendResponse(404,$id_user,'Asistencia no registrada');
            }
            
        } else {
            sendResponse(404, [] ,'Materia no registrado');
        }
        $conn->close();
    }
}