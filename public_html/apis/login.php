<?php
include_once('../common/include.php');
include_once('../common/encipher.php');
$user = json_decode(file_get_contents("php://input"));
if(!$user->email){
    sendResponse(400, [] , 'Correo requerido !');  
}else if(!$user->password){
    sendResponse(400, [] , 'Contraseña requerida !');        
}else{
    $conn=getConnection();
    if($conn==null){
        sendResponse(500,$conn,'Error de coneccion con el servidor');
    }else{
        $password=doEncrypt($user->password);
        $sql = "SELECT * FROM usuario WHERE email='";
        $sql.=$user->email."' AND pass = '".$password."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $users=array();
            while($row = $result->fetch_assoc()) {
                $user=array(
                    "id_usuario" =>  $row["id_usuario"],
                    "nombres" => $row["nombre_usuario"],
                    "apellidos" => $row["apellido_usuario"],
                    "user" => $row["user"],
                    "pass" => $row["pass"],
                    "email" => $row["email"],
                    "direccion" => $row["direccion"],
                    "id_tipo_usuario" => $row["id_tipo_usuario"],
                );
                array_push($users,$user);
            }
            sendResponse(200,$users,'Detalles de usuario');
        } else {
            sendResponse(404,[],'Usuario no encontrado');
        }
        $conn->close();
    }
}