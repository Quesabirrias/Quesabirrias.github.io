<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>

<!DOCTYPE html>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<html>
    <head>
        <meta charset="utf-8">
        <title> QUESABIRRIAS</title>
    </head>
    <body>
        <header>
            <div id="logo"> <!--id para trabajar con css-->
                <img src="img/logo.png" alt="logo" height="100" witdh="300">
            </div>
            <nav class="menu">
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="miperfil.php">Mi perfil</a></li>
                    <li><a href="amigos.php">Mis amigos</a></li>
                    <li><a href="fotos.php">Mis fotos</a></li>
                    <li><a href="agregar.php">Agregar amigos</a></li>
                    <li><a href="php/CerrarSesion.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </header>

        <section id="recuadros">
            <h2>Mis fotos</h2>

            <h3>
                <form action="php/SubirFoto.php" method="post" enctype="multipart/form-data">
                    Añadir imagen:<input name="archivo" id="archivo" type="file" accept=".JPG, .jpeg, .png" required>
                    <input type="submit" name="subir" value="subir">
                </form>
            </h3>


            <?php 
            $consulta="Select * From fotos F WHERE F.Nickname='$nickname'";
            $datos=mysqli_query($conexion, $consulta);
            while($fila=mysqli_fetch_array($datos)){
            ?>

            <section class="recuadro">
                <img src="<?php echo $fila['NombreFotos']?>" height="150" width="200">
        </section>
        <?php
            }
            ?> 
        </section>
        <footer>
            <p>Copyright &copy; QUESABIRRIAS</p>
        </footer>
    </body>
</html>