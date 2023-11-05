<?php
include('conexao.php');

$resultado = ""; // Variável para armazenar os resultados da busca

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProfessor'])) {
    // Receba o idProfessor do formulário
    $idProfessor = $_POST['idProfessor'];

    // Preparar a consulta SQL para buscar dados na tabela 'professor'
    $sql = "SELECT * FROM professor WHERE id = '$idProfessor'";

    // Executar a consulta SQL
    $result = $mysqli->query($sql);

    // Verificar se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Construir a tabela com os dados encontrados
        $resultado .= "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Idade</th>
                        </tr>";
        while($row = $result->fetch_assoc()) {
            $resultado .= "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . $row["nome"]. "</td>
                            <td>" . $row["idade"]. "</td>
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Professor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Buscar Professor</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID do Professor:</label>
            <input type="number" name="idProfessor" required>
        </p>
        <button type="submit">Buscar</button>
        <p>
            <a href="pagina_cadastro_professores.html">Voltar</a>
        </p> 
    </form>

    <!-- Exibir resultados na página -->
    <?php echo $resultado; ?>
</body>
</html>
