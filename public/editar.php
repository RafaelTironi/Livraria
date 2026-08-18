<?php

//Inclui o arquivo que faz a conexão com o banco de dados
include "../infra/conexao.php";

//Pego o ID que foi enviado pelo GET
$id = $_GET["id"];

//Valido o ID para verificar se ele não é inválido
if ($id === false || $id === null || $id <= 0) {
    die("ID inválido.");
}

//Aqui eu faço a consulta SQL para buscar o livro que possui esse ID
//Com Prepared Statements, eu poderia usar ? no lugar do $id
//Isso deixaria a consulta mais segura contra SQL Injection
$sql = "SELECT * FROM livros WHERE id = $id";

//Aqui eu executo a consulta no banco de dados
//Com Prepared Statements, no lugar de mysqli_query(), eu usaria prepare(), bind_param() e execute()
$resultado = mysqli_query($conexao, $sql);

//Aqui eu pego os dados do livro encontrado e guardo em uma variável
$livro = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Livraria</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Livraria</h1>
    </header>
    <main>
        <h2>Editando o livro <?php echo $livro["titulo"]?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $livro["id"]?>">

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $livro["titulo"]?>">
            <br>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" value="<?php echo $livro["autor"]?>">
            <br>
            <label for="ano">Ano de Publicação:</label>
            <input type="number" name="ano" value="<?php echo $livro["ano"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>