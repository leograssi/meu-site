<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/_variables.scss">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <header>
    <nav class="navbar fixed-top" style="background-color: #1b4384;">
      <div class="container-fluid">
        <a class="navbar-brand" style="color: white;" href="./listar.php"  > PREFEITURA DE PONTAL DO PARANÁ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" style="background-color: white;" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" ></span>
        </button>
        </div>
      </div>
    </nav>
  </header>
  
  <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>

  <img src="./pontal.png">
  <div id="main-container" style="padding-top: 100px;">
    <form action="proc_edit_usuario.php" method="POST">
 
    <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

      <div class="half-box spacing">
        <label for=""><b>Local:</b> </label>
        <input type="text" name="lugar" placeholder="Digite o lugar:" value="<?php echo $row_usuario['lugar']; ?>"><br><br>
      </div>

      <div class="half-box spacing">
        <label for=""><b>Patrimonio: </b></label>
        <input type="text" name="patrimonio" placeholder="Digite o patrimonio" value="<?php echo $row_usuario['patrimonio']; ?>"><br><br>
      </div>

      <div class="half-box spacing">
        <label for=""><b>Problema: </b></label>
        <input type="text" name="problema" placeholder="Digite o problema" value="<?php echo $row_usuario['problema']; ?>"><br><br>
      </div>

      <div class="half-box spacing">
        <label for=""><b>Solução: </b> </label>
        <input type="text" name="solucao" placeholder="Digite o solucao" value="<?php echo $row_usuario['solucao']; ?>"><br><br>
      </div>

      <div class="half-box spacing">
      <label for="tecnico" value="<?php echo $row_usuario['tecnico']; ?>"><b> Escolha o técnico:</b></label>
        	<select name="tecnico">
			<option value="Leocádio">Leocádio</option>
			<option value="Emanuel">Emanuel</option>
			<option value="Luis Cesar">Luis Cesar</option>
			<option value="Gabriel">Gabriel</option>
			<option value="Abner">Abner</option>
			</select>
      </div>

      <div class="botao">
        <button type="reset">Limpar</button>
        <button type="submit" name="submit" id="submit">Enviar</button>
      </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>