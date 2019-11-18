<?php
include_once('../common/include.php');
$conn=getConnection();
if($conn==null){
    sendResponse(500,$conn,'Error de coneccion con el servidor');
}else{
    $sql = "SELECT * FROM materia";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $users=array();
        while($row = $result->fetch_assoc()) {
            $user=array(
                "id_materia" =>  $row["id_materia"],
                "nombre_materia" => $row["nombre_materia"],
                "codigo" => $row["codigo"],
                "activo" => $row["activo"],
                "id_carrera" => $row["id_carrera"],
                "id_usuario" => $row["id_usuario"],
            );
            array_push($users,$user);
        }
        sendResponse(200,$users,'Lista de materias');
    } else {
        sendResponse(404,[],'Materias no disponibles');
    }
    $conn->close();
}
?>