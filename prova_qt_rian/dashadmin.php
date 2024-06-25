 <?php

 session_start();
 include("seguranca.php");
 include("conexao.php");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexao,$sql);

 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Painel Administrativo</title>
    
</head>

<body>
<?php
    echo "Seja bem vindo(a)" . $_SESSION['nome'];
    ?>
    <a href="sair.php">Sair</a>
    <h1> CRUD de usuários</h1>
    <form action = "inserir.php" method="post">
    <input type = "text" placeholder = "Digite o nome" name = "nome">
    <input type="email" name = "login" placeholder = "Digite seu imail">
    <input type="password" name = "senha" placeholder = "Digite sua senha">
    <select>
     <option value="admin"> Administrador</option>
     <option value="colaborador"> Colaborador</option>
    </select>
    <input type="submit" value = "Cadastre-se">
    </form>
    <h1>Listar Usuários</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Nivel de Acesso</th>
                <th>Ação</th>
            </tr>
            <tr>
            
            <tbody>
            <?php
                    while($linha = mysqli_fetch_assoc($resultado)){
                ?>                   
                <tr>
                   <td>
                   <td><?php echo $linha['id'] ?></td>
                    <td><?php echo $linha['nome'] ?></td>
                    <td><?php echo $linha['login'] ?><td>
                    <td><?php echo $linha['senha'] ?><td>
                    <td><?php echo $linha['nivel_acesso'] ?>
                     <td>
                        <button>Atualizar</button>
                        <a href="deletar.php?id=<?php echo $linha['id']?>">
                        <button>Deletar</button>
                        </a>
                     </td>   
                </tr>
                <?php }?>
            </tbody>
        </thead>
         
    </table> 
</body>
</html>