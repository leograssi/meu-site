<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$lugar = filter_input(INPUT_POST, 'lugar', FILTER_SANITIZE_STRING);
$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_STRING);
$problema = filter_input(INPUT_POST, 'problema', FILTER_SANITIZE_STRING);
$solucao = filter_input(INPUT_POST, 'solucao', FILTER_SANITIZE_STRING);
$tecnico = filter_input(INPUT_POST, 'tecnico', FILTER_SANITIZE_STRING);

//echo "lugar: $lugar <br>";
//echo "E-mail: $patrimonio <br>";

$result_usuario = "UPDATE usuarios SET lugar='$lugar', patrimonio='$patrimonio', problema='$problema', solucao='$solucao', tecnico='$tecnico', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit.php?id=$id");
}
