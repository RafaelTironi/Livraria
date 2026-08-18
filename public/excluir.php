<?php
include "../infra/conexao.php";


//Não poso pegar o id e colocar diretamente dentro da variavel SQL
//Porém, devo pegar a variavel pelo GET


$id = $_GET["id"];


//uso a ? para reservar o local
$sql = "DELETE FROM livros WHERE id=?";
// STMT é uma variavel que guarda uma CONSULTA
//Aqui eu preparo a conexão com o banco de dados
$stmt = $conexao->prepare($sql);
//Aqui eu eu falo para a consulta que o ID vai ser inteiro por causa do 'i'
$stmt->bind_param("i", $id);
//Aqui eu execulto a consulta
$stmt->execute();
header("Location: ../index.php");
?>
