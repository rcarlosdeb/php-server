<?php
include_once('../common/include.php');
include_once('../common/encipher.php');
$user = json_decode(file_get_contents("php://input"));
if(!$user->nombres){
    sendResponse(400, [] , 'Nombres Requiredo!');  
}else if(!$user->email){
    sendResponse(400, [] , 'Correo Requiredo!');  
}else if(!$user->pass){
    sendResponse(400, [] , 'Contraseña Requiredo!');        
}else if(!$user->id_tipo_usuario){
    sendResponse(400, [] , 'Tipo usuario Requiredo!');  
}else{
    $password = doEncrypt($user->pass);
    $conn=getConnection();
    if($conn==null){
        sendResponse(500,$conn,'Error de coneccion con el servidor');
    }else{
        $sql="INSERT INTO usuario(nombre_usuario, email, pass, id_tipo_usuario)";
        $sql .= "VALUES ('".$user->nombres."','".$user->email."','";
        $sql .= $password."','".$user->id_tipo_usuario."')";
        $result = $conn->query($sql);
        if ($result) {
            sendResponse(200, $result , 'Registro realizado correctamente.');
        } else {
            sendResponse(404, [] ,'Usuario no registrado');
        }
        $conn->close();
    }
}