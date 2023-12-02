<?php
include('conexao.php'); // Include the connection file

// Define variables to hold user data
$idUsuario = $nome = $email = $senha = "";
$resultMessage = "";

// Check if the button to retrieve all users is clicked
if (isset($_POST['buscarTodos'])) {
    // Prepare the SQL query to retrieve all users
    $sql_select_all = "SELECT * FROM usuario";
    $result_select_all = $mysqli->query($sql_select_all);

    if ($result_select_all->num_rows > 0) {
        // Fetch all user details
        $allUsers = $result_select_all->fetch_all(MYSQLI_ASSOC);
    } else {
        $resultMessage = "Nenhum usuário encontrado.";
    }
}

// Check if an ID is provided in the form
if (isset($_POST['idUsuario'])) {
    $idUsuario = $_POST['idUsuario'];

    // Prepare the SQL query to retrieve user details by ID
    $sql_select = "SELECT * FROM usuario WHERE id = '$idUsuario'";
    $result_select = $mysqli->query($sql_select);

    if ($result_select->num_rows > 0) {
        // Fetch user details
        $row = $result_select->fetch_assoc();
        $nome = $row['nome'];
        $email = $row['email'];
        $senha = $row['senha'];
    } else {
        $resultMessage = "";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuário por ID</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Buscar Usuário por ID</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID do Usuário:</label>
            <input type="number" name="idUsuario">
        </p>
        <button type="submit">Buscar Usuário</button>

        <!-- Button to retrieve all users -->
        <button type="submit" name="buscarTodos">Buscar Todos os Usuários</button>
    </form>

    <?php if (!empty($allUsers)) : ?>
        <h2>Todos os Usuários</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
            </tr>
            <?php foreach ($allUsers as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['nome']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['senha']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <?php if (!empty($nome)) : ?>
        <h2>Dados do Usuário</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
            </tr>
            <tr>
                <td><?php echo $idUsuario; ?></td>
                <td><?php echo $nome; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $senha; ?></td>
            </tr>
        </table>
        <p>
            <a href="alterar_usuario.php?idUsuario=<?php echo $idUsuario; ?>">Atualizar Usuário</a>
        </p>
    <?php endif; ?>

    <p>
        <?php echo $resultMessage; ?>
        <a href="usuario.html">Voltar</a>
    </p>
</body>
</html>
