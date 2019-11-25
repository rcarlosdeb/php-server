<?php
include_once('../common/include.php');
$conn=getConnection();
$id=$_GET["user"];
$docente=$_GET["docente"];
if($id==null && $docente==null){
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
            sendResponse(200,$users,'Lista de todas las materias');
        } else {
            sendResponse(404,[],'Materias no disponibles');
        }
        $conn->close();
    }
}else{
    if(!$id==null && $docente==null){
        if($conn==null){
            sendResponse(500,$conn,'Error de coneccion con el servidor');
        }else{
            $sql = "SELECT materia.id_materia, materia.nombre_materia, materia.codigo, materia.activo, materia.id_carrera, materia.id_usuario FROM materia INNER JOIN usuario_materia WHERE materia.id_materia=usuario_materia.id_materia AND usuario_materia.id_usuario={$id}";
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
                sendResponse(200,$users,'Lista de materias por usuario');
            } else {
                sendResponse(404,[],'Materias no disponibles');
            }
            $conn->close();
        }
    }else{
        if($id==null && !$docente==null){
            if($conn==null){
                sendResponse(500,$conn,'Error de coneccion con el servidor');
            }else{
                $sql = "SELECT * FROM materia WHERE id_usuario={$docente}";
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
                    sendResponse(200,$users,'Lista de materias por docente');
                } else {
                    sendResponse(404,[],'Materias por docente no disponibles');
                }
                $conn->close();
            }
        }
    }
}
?>