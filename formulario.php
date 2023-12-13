<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<title>Inicio</title>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/_variables.scss">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
  <header>
    <nav class="navbar fixed-top" style="background-color: #1b4384;">
      <div class="container-fluid">
        <a class="navbar-brand" style="color: white;"> PREFEITURA DE PONTAL DO PARANÁ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" style="background-color: white;" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" style="background-color: white;" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel" style="color: black">MENU</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
               <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listar.php" style="color: black;">Listar</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="http://www.pontaldoparana.pr.gov.br/index.php?sessao=b054603368xab0" style="color: black;">Ramal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://pontaldoparana.1doc.com.br/b.php?pg=o/login&n=3" style="color: black;">1Doc</a>
              </li>
              </li>
            </ul>
            <form class="d-flex mt-3" role="search">
              <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
              <button class="btn btn-success" type="submit" style="width: 120px;">Buscar</button>
            </form> 
          </div>
        </div>
      </div>
    </nav>
  </header>
  
  <img src="./pontal.png">
  <div id="main-container" style="padding-top: 100px;">
    <form action="proc_cad_usuario.php" method="POST">
 
      <div class="half-box spacing">
        <label for=""><b>Local:</b> </label>
        <input type="text" name="lugar" placeholder="Digite o lugar:">
      </div>

      <div class="half-box spacing">
        <label for=""><b>Patrimonio: </b></label>
        <input type="text" name="patrimonio" placeholder="Digite o patrimonio:">
      </div>

      <div class="half-box spacing">
        <label for=""><b>Problema: </b></label>
        <input type="text" name="problema" placeholder="Digite o problema:">
      </div>

      <div class="half-box spacing">
        <label for=""><b>Solução: </b> </label>
        <input type="text" name="solucao" placeholder="Digite a solução:">
      </div>

      <div class="half-box spacing">
        <label for="tecnico"><b> Escolha o técnico:</b></label>
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