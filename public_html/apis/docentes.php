<?php
include_once('../common/include.php');
$conn=getConnection();
if($conn==null){
    sendResponse(500,$conn,'Error de coneccion con el servidor');
}else{
    $sql = "SELECT * FROM usuario WHERE id_tipo_usuario=3";
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
        sendResponse(200,$users,'Lista de docentes');
    } else {
        sendResponse(404,[],'Usuarios no disponibles');
    }
    $conn->close();
}
?>