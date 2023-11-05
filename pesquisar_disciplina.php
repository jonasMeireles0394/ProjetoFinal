<?php
include('conexao.php'); // Inclua o arquivo de conexão

$resultado = ""; // Variável para armazenar a tabela com os resultados

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idDisciplina'])) {
    // Receba o ID da disciplina do formulário
    $idDisciplina = $mysqli->real_escape_string($_POST['idDisciplina']);

    // Preparar a consulta SQL para buscar dados na tabela 'disciplina' pelo ID
    $sql = "SELECT * FROM disciplina WHERE id = '$idDisciplina'";

    // Executar a consulta SQL
    $result = $mysqli->query($sql);

    // Verificar se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Construir a tabela com os dados encontrados
        $resultado .= "<h2>Registro da Disciplina</h2>";
        $resultado .= "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Carga Horária</th>
                        </tr>";
        while($row = $result->fetch_assoc()) {
            $resultado .= "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . $row["nome"]. "</td>
                            <td>" . $row["cargaHoraria"]. "</td>
                        </tr>";
        }
        $resultado .= "</table>";
    } else {
        $resultado = "Nenhum registro encontrado para o ID informado.";
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Buscar Disciplina por ID</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Buscar Disciplina por ID</h1>
    <form action="" method="post">
        <p>
            <label>ID da Disciplina:</label>
            <input type="number" name="idDisciplina" required>
        </p>
        <button type="submit">Buscar Disciplina</button>
        <p>
            <a href="pagina_cadastro_disciplinas.html">Voltar</a>
        </p>
    </form>

    <!-- Exibir resultados na página -->
    <?php echo $resultado; ?>
</body>
</html>
