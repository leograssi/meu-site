<?php
session_start();
include_once("conexao.php");

$lugar = filter_input(INPUT_POST, 'lugar', FILTER_SANITIZE_STRING);
$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_STRING);
$problema = filter_input(INPUT_POST, 'problema', FILTER_SANITIZE_STRING);
$solucao = filter_input(INPUT_POST, 'solucao', FILTER_SANITIZE_STRING);
$tecnico = filter_input(INPUT_POST, 'tecnico', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO usuarios (lugar, patrimonio, problema, solucao, tecnico, created) VALUES ('$lugar', '$patrimonio', '$problema', '$solucao', '$tecnico', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: formulario.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: formulario.php");
}
