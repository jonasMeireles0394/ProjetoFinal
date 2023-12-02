<?php
include('conexao.php'); // Include the connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idUsuario'])) {
    // Receive data from the form
    $idUsuario = $_POST['idUsuario'];

    // Prepare the SQL query to check if the user with the provided ID exists
    $sql_check = "SELECT * FROM usuario WHERE id = '$idUsuario'";
    $result_check = $mysqli->query($sql_check);

    if ($result_check->num_rows > 0) {
        // The user with the provided ID exists, so proceed with deletion
        $sql_delete = "DELETE FROM usuario WHERE id='$idUsuario'";
        if ($mysqli->query($sql_delete) === TRUE) {
            echo "Usuário excluído com sucesso!";
        } else {
            echo "Erro ao excluir usuário:" . $mysqli->error;
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
    <title>Excluir Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Excluir Usuário</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID do Usuário:</label>
            <input type="number" name="idUsuario" required>
        </p>
        <button type="submit">Excluir Usuário</button>
        <p>
            <a href="usuario.html">Voltar</a>
        </p> 
    </form>
</body>
</html>
