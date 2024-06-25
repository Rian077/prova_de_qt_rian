<?php
session_start();
require_once("conexao.php");

if(!empty($_POST["login"]) && !empty($_POST['senha'])){

   $login = $_POST["login"];
   $senha = $_POST['senha'];
   
   $querry = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";

   $execucao = mysqli_query($conexao, $querry);

   $resultado = mysqli_fetch_assoc($execucao);

   if(!empty($resultado)){
        $_SESSION['nome'] = $resultado['nome'];
        $_SESSION['nivel'] = $resultado['nivel_acesso'];

        if($_SESSION['nivel'] == "admin"){
        header("location:dashadmin.php");
        }else{
        header("location:dashcolab.php");
        }  
    }else{
        $_SESSION['loginError'] = "Usuário ou senha incorretos";
        header("location: index.php");
    }
}else{
    $_SESSION['loginError'] = "Usuário ou senha não preenchidos";
    header("location: index.php");
}  

   


?>