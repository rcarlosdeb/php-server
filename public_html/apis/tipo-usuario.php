<?php
include_once('../common/include.php');
$conn=getConnection();
if($conn==null){
    sendResponse(500,$conn,'Error de coneccion con el servidor');
}else{
    $sql = "SELECT * FROM tipo_usuario";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $users=array();
        while($row = $result->fetch_assoc()) {
            $user=array(
                "id_tipo_usuario" =>  $row["id_tipo_usuario"],
                "nombre" => $row["nombre"],
                "descripcion" => $row["descripcion"],
                "activo" => $row["activo"],
            );
            array_push($users,$user);
        }
        sendResponse(200,$users,'Lista de tipos de usuario');
    } else {
        sendResponse(404,[],'Tipo no disponibles');
    }
    $conn->close();
}
?>