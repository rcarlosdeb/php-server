<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencia</title>
</head>
<body>

<h4>Aqui se iran listando los recursos disponibles para consumir desde la aplicacion de flutter</h4>
<p>- <a href="http://35.232.215.93/apis/user.php">Todos los usuarios</a>
<br><br> Lista de todos los usuarios actualmente en la base de datos, no se muestra la contraseña para evitar fallos de seguridad
</p>

<p>- <a href="http://35.232.215.93/apis/tipo-usuario.php">Tipos de usuario</a>
<br><br> Lista de los tipos de usuario que manejara el sistema
</p>

<p>- <a href="http://35.232.215.93/apis/login.php">Verificar el usuario y contraseña</a>
<br><br> Se debera usar la url anterior para hacer POST de un json que debe contener al menos las propiedades email y pass:
<br>{email:'rcarlosdeb@gmail.com', pass:'contrasenia'}
<br> El resultado para un usuario valido es un estatus 200 y todos los detalle del usuario que se ha buscado
<br> Cuando el usuario sea incorrecto el resultado es un estatus 404 
</p>

<p>- <a href="http://35.232.215.93/apis/singup.php">Registro de usuario</a>
<br><br> Se debera usar la url anterior para hacer POST de un json que debe contener al menos las propiedades: nombres, email, pass, id_tipo_usuario
<br>Ejempplo: {"nombres":"Roberto carlos", "apellidos":"Castro", "user":"rcarlosdeb", "pass":"12345678","email":"rcarlosdeb@gmail.com", "id_tipo_usuario":2, "direccion":"santa ana, santa ana"}
<br> El resultado para registro correcto es un estatus 200
<br> El resultado para un registro incorrecto por falta de propiedades u otro error es estatus 404
</p>

</body>
</html>