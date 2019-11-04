<?php
include_once('../common/include.php');
include_once('../common/encipher.php');
$user = json_decode(file_get_contents("php://input"));
if(!$user->nombres){
    sendResponse(400, [] , 'Nombres Requiredo!');  
}else if(!$user->email){
    sendResponse(400, [] , 'Correo Requiredo!');  
}else if(!$user->pass){
    sendResponse(400, [] , 'Contrasenia Requiredo!');        
}else if(!$user->id_tipo_usuario){
    sendResponse(400, [] , 'Tipo usuario Requiredo!'); 
}else if(!$user->apellidos){
    sendResponse(400, [] , 'Apellidos Requiredo!'); 
}else if(!$user->direccion){
    sendResponse(400, [] , 'Direccion Requiredo!');
}else if(!$user->user){
    sendResponse(400, [] , 'User Requiredo!');
}else{
    $password = doEncrypt($user->pass);
    $conn=getConnection();
    if($conn==null){
        sendResponse(500,$conn,'Error de coneccion con el servidor');
    }else{
        $sql="INSERT INTO usuario(nombre_usuario, apellido_usuario, user, pass, email, direccion, id_tipo_usuario)";
        $sql .= "VALUES ('".$user->nombres."','".$user->apellidos."','".$user->user."','".$password."','".$user->email."','";
        $sql .= $user->direccion."','".$user->id_tipo_usuario."')";
        $result = $conn->query($sql);
        if ($result) {
            sendResponse(200, $result , 'Registro realizado correctamente.');
        } else {
            sendResponse(404, [] ,'Usuario no registrado');
        }
        $conn->close();
    }
}