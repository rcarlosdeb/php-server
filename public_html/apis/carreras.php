<?php
include_once('../common/include.php');
$conn=getConnection();
if($conn==null){
    sendResponse(500,$conn,'Error de coneccion con el servidor');
}else{
    $sql = "SELECT * FROM carrera";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $users=array();
        while($row = $result->fetch_assoc()) {
            $user=array(
                "id_carrera" =>  $row["id_carrera"],
                "nombre_carrera" => $row["nombre_carrera"],
                "codigo_carrera" => $row["codigo_carrera"],
                "activo" => $row["activo"],
                "id_departamento" => $row["id_departamento"],
            );
            array_push($users,$user);
        }
        sendResponse(200,$users,'Lista de carreras');
    } else {
        sendResponse(404,[],'Carreras no disponibles');
    }
    $conn->close();
}
?>