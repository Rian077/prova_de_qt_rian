<?php
session_start();
include("seguranca.php");
include("conexao.php");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexao,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Painel Colaborador</title>
    
</head>
<body>
    <?php
        echo "Seja bem vindo(a)" . $_SESSION['nome'];
    ?>
    <a href="sair.php">Sair</a>
    
    <h1>Listar Usuários</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Login</th>
            </tr>
            <tbody>
                 <?php
                    while($linha = mysqli_fetch_assoc($resultado)){
                ?>                   
                <tr>
                    <td><?php echo $linha['id'] ?></td>
                    <td><?php echo $linha['nome'] ?></td>
                    <td><?php echo $linha['login'] ?><td>
                </tr>
                <?php }?>
            </tbody>
        </thead>
         
    </table> 
</body>
</html>