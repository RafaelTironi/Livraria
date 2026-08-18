<?php

//Inclui o arquivo que faz a conexão com o banco de dados
include "../infra/conexao.php";

//Aqui eu estou pegando as variáveis que foram enviadas pelo POST
$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];

//Aqui eu estou colocando diretamente os valores das variáveis dentro da consulta SQL
//Com Prepared Statements, eu poderia usar ? no lugar dos valores
//Isso deixaria a consulta mais segura contra SQL Injection
$sql = "UPDATE livros SET titulo='$titulo',autor='$autor',ano='$ano' WHERE id = '$id'";

//Aqui eu executo a consulta no banco de dados
//Com Prepared Statements, no lugar de mysqli_query(), eu usaria prepare(), bind_param() e execute()
mysqli_query($conexao, $sql);

//Depois de atualizar o livro, volto para a página principal
header("Location: ../index.php");