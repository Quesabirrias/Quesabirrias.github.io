
<?php 
include("ValidarSesion.php");

$ubicacion="../img/$nickname/perfil.png";
$archivo= $_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, $ubicacion)){
    echo "El archivo se ha subido";
    header('Location:../miperfil.php');
}
else{
    echo 'Ha ocurrido un error, intente de nuevo';
    echo "<br> <a href='../miperfil.php'> Volver. </a>";
}

?>