<?php
include('conexao.php'); // Inclua o arquivo de conexão

$resultado = ""; // Variável para armazenar mensagens de sucesso ou erro

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['cargaHoraria'])) {
    // Receba os dados do formulário
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $cargaHoraria = $mysqli->real_escape_string($_POST['cargaHoraria']);

    // Preparar a consulta SQL para inserir dados na tabela 'disciplina'
    $sql = "INSERT INTO disciplina (nome, cargaHoraria) VALUES ('$nome', '$cargaHoraria')";

    // Executar a consulta SQL
    if ($mysqli->query($sql) === TRUE) {
        $resultado = "Disciplina cadastrada com sucesso!";
    } else {
        $resultado = "Erro ao cadastrar disciplina: " . $mysqli->error;
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Disciplinas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Disciplinas</h1>
    <form action="" method="post">
        <p>
            <label>Nome da Disciplina:</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Carga Horária:</label>
            <input type="number" name="cargaHoraria" required>
        </p>
        <button type="submit">Cadastrar Disciplina</button>
        <p><?php echo $resultado; ?></p>
        <p>
            <a href="pagina_cadastro_disciplinas.html">Voltar</a>
        </p>
    </form>
</body>
</html>
