<?php

    session_start();

    if(isset($_POST['login'])){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        if($login == "user" && $senha == "1234"){
            $_SESSION['user'] = $login;
        }
    }

    header("location:FormSecao2.php");
?>