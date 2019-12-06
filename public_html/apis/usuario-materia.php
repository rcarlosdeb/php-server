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
        $sql="INSERT INTO usuario_materia(id_usuario,id_materia)";
        $sql .= "VALUES ('".$user->id_usuario."','".$user->id_materia."')";
        $result = $conn->query($sql);
        if ($result) {
            sendResponse(200, $result , 'Registro realizado correctamente.');
        } else {
            sendResponse(404, [] ,'Materia no registrado');
        }
        $conn->close();
    }
}