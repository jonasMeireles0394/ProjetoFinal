<?php

include('conexao.php');

if(isset($_POST['email']) && isset($_POST['senha'])){
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha da execução do código SQL: " . $mysqli->error);

    $quantidadeRegistros = $sql_query->num_rows;

    if($quantidadeRegistros == 1){
        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['user'] = $usuario['id'];
        $_SESSION['name'] = $usuario['nome'];

        //Redirecionar usuário para a página
        header('Location: painel.php');
        exit();
    } else {
        echo("E-mail ou senha incorretos!");
    }
} else {
    echo("Preencha ambos os campos de e-mail e senha.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="post">
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>