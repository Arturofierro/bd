<?php

session_start();

$usuario=$_POST['username'];
$clave=$_POST['password'];

//
$conexion=mysqli_connect("localhost", "root", "", "users");
$consulta="SELECT * FROM usuarios WHERE num_reloj= '$usuario' and pass='$clave'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
$ver=mysqli_fetch_row($resultado);
$_SESSION['user'] = $ver;
if($filas > 0){

    if($ver[3] == "admin"){
        header("location:admin.php");
    }
    if($ver[3] == "inspector" || $ver[3] == "Inspector"  ){
        header("location:inspector/inspector.php");
    }

    if($ver[3] == "Supervisor Calidad" || $ver[3] == "supervisor caliad"  ){
        header("location:supervisorC/supervisorC.php");
    }
    if($ver[3] == "Supervisor Produccion" || $ver[3] == "supervisor produccion"  ){
        header("location:supervisorP/supervisorP.php");
    }
    if($ver[3] == "Capturista" || $ver[3] == "capturista"  ){
        header("location:capturista/capturista.php");
    }

 
}
else {
       header("location:erroracceso.html");
}
 mysqli_free_results($resultado);
 mysqli_close($conexion);
?>