<?php
    require('/../conf/conexion.php');
    $con=conexion();

    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $sql = "SELECT * FROM usuario WHERE email='$email' AND contrasenia='$pass'";

    $resultadoQuery=mysqli_query($con,$sql);
    if ($resultado = mysqli_fetch_array($resultadoQuery)) {
        session_start();
        $_SESSION['login'] = $email;
        $_SESSION['id'] = $resultado['id'];
        mysqli_close($con);
        header('Location: ./../index.php');
        session_write_close();  
    }
?>