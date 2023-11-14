<?php

include("conexion.php");//llama el archivo conecxión

session_start();//inicia una nueva sesión o reanuda la existencia

$_SESSION['login']=false;//$_SESSION es una variable super glogal

//recibir y guardar datos enviados desde el formulario

$nickname =$_POST["nickname"];
$password =$_POST["contraseña"];

//Evaluando nickname ingresado

$consulta="SELECT * FROM persona WHERE Nickname = '$nickname'";
$consulta=mysqli_query($conexion, $consulta);
$consulta=mysqli_fetch_array($consulta);

if($consulta)
{
    if(password_verify($password, $consulta['Password'])) //extrae password de consulTA Y verifica que correspnda al password
    {
        $_SESSION['login']       =true;
        $_SESSION['nickname']    =$consulta['Nickname'];
        $_SESSION['nombre']      =$consulta['Nombre'];
        $_SESSION['apellidos']   =$consulta['Apellidos'];
        $_SESSION['edad']        =$consulta['Edad'];
        $_SESSION['descripcion'] =$consulta['Descripcion'];
        $_SESSION['fotoPerfil']  =$consulta['FotoPerfil'];

        header('Location:../miperfil.php');//redirecciona a la página miperfil

    }
    else{
        echo "Contraseña incorrecta";
        echo "<br> <a href='../index.html'> Intentelo de nuevo. </a>";
    }
}
else{
    echo "El usuario no existe!!";
    echo "<br> <a href='../index.html'> Intentelo de nuevo. </a>";
}

//Cerrando la conexión
mysqli_close($conexion);
?>