<?php
include_once('../common/include.php');
include_once('../common/encipher.php');
$user = json_decode(file_get_contents("php://input"));
if(!$user->nombre_materia){
    sendResponse(400, [] , 'Nombres de materia Requiredo');  
}else if(!$user->codigo){
    sendResponse(400, [] , 'codigo de materia Requiredo');  
}else if(!$user->activo){
    sendResponse(400, [] , 'activo Requiredo');        
}else if(!$user->id_carrera){
    sendResponse(400, [] , 'carrera a la que pertenece Requiredo'); 
}else{
    $password = doEncrypt($user->pass);
    $conn=getConnection();
    if($conn==null){
        sendResponse(500,$conn,'Error de coneccion con el servidor');
    }else{
        $sql="INSERT INTO materia(nombre_materia, codigo, activo, id_carrera)";
        $sql .= "VALUES ('".$user->nombre_materia."','".$user->codigo."','".$user->activo."','".$user->id_carrera."')'";
        $result = $conn->query($sql);
        if ($result) {
            sendResponse(200, $result , 'Registro realizado correctamente.');
        } else {
            sendResponse(404, [] ,'Carrera no registrado');
        }
        $conn->close();
    }
}