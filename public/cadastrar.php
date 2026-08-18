<?php

include "../infra/conexao.php";

// aqui eu to cadastrando
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];

// Query: Dados que  vc vai enviar pro banco de dados
// aqui eu to criando uma query
$sql = "INSERT INTO livros (titulo,autor,ano) VALUES ('$titulo','$autor','$ano')";

//aqui eu to fazendo a conexão com o banco de dados utilizando a sql
mysqli_query($conexao, $sql);

header("Location: ../index.php");
?>