<?php
include('conexao.php'); // Include the connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idUsuario']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    // Receive data from the form
    $idUsuario = $_POST['idUsuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepare the SQL query to check if the user with the provided ID exists
    $sql_check = "SELECT * FROM usuario WHERE id = '$idUsuario'";
    $result_check = $mysqli->query($sql_check);

    if ($result_check->num_rows > 0) {
        // The user with the provided ID exists, so update the values
        $sql_update = "UPDATE usuario SET nome='$nome', email='$email', senha='$senha' WHERE id='$idUsuario'";
        if ($mysqli->query($sql_update) === TRUE) {
            echo "Registro do usuário atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o registro do usuário: " . $mysqli->error;
        }
    } else {
        echo "Nenhum usuário encontrado com o ID fornecido.";
    }

    // Close the database connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Alterar Usuário</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID do Usuário:</label>
            <input type="number" name="idUsuario" required>
        </p>
        <p>
            <label>Novo Nome:</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Novo E-mail:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Nova Senha:</label>
            <input type="password" name="senha" required>
        </p>
        <button type="submit">Salvar Alterações</button>
        <p>
            <a href="usuario.html">Voltar</a>
        </p> 
    </form>
</body>
</html>
