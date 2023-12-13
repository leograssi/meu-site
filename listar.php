<?php
  session_start();
  include_once('conexao.php');


if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or lugar LIKE '%$data%' or  patrimonio LIKE '%$data%' ORDER BY id DESC";
}
else
{
  $sql = "SELECT * FROM usuarios ORDER BY id DESC";
}
$result = $conn->query($sql);
//print_r($result);


// $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
// 		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
// 		//Setar a quantidade de itens por pagina
// 		$qnt_result_pg = 3;
		
// 		//calcular o inicio visualização
// 		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
// 		$result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
// 		$resultado_usuarios = mysqli_query($conn, $result_usuarios);

//         $result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
// 		$resultado_pg = mysqli_query($conn, $result_pg);
// 		$row_pg = mysqli_fetch_assoc($resultado_pg);
// 		//echo $row_pg['num_result'];
// 		//Quantidade de pagina 
// 		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
// 		//Limitar os link antes depois
// 		$max_links = 2;
// 		echo "<a href='tela.php?pagina=1'>Primeira</a> ";
		
// 		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
// 			if($pag_ant >= 1){
// 				echo "<a href='tela.php?pagina=$pag_ant'>$pag_ant</a> ";
// 			}
// 		}
			
// 		echo "$pagina ";
		
// 		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
// 			if($pag_dep <= $quantidade_pg){
// 				echo "<a href='tela.php?pagina=$pag_dep'>$pag_dep</a> ";
// 			}
// 		}
		
// 		echo "<a href='tela.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tela Listar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
  <style>
    .box-search
    {
      display: flex;
      justify-content: center;
      gap: .1%;
    }
  </style>
<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark" style="background-color:#1b4384;">
        <div class="container-fluid" >
            <a  class="navbar-brand">
                <span class="ms-3 fs-5" >Usuários do Sistema</span>
                
            </a>
            <!-- <div class="box-search">
              <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                <button class="btn btn-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </button>
            </div> -->
    </nav>
    <div class="container">
         <div class="row justify-content-end mt-4">
            <div class="col-1">
                <a href= "formulario.php" class="btn btn-primary ms-2" style="background-color:#1b4384; border:#1b4384"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                </a>
            </div>
        </div>
        <hr>
        <div class="box-search">
              <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn btn-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </button>
            </div>
        <div class="row justify-content-center mt-4">
            <table class="table table-striped">
              <thead>
                <tr>
                   <!-- <th scope="col">#</th>  -->
                  <th scope="col">Lugar</th>
                  <th scope="col">Patrimonio</th>
                  <th scope="col">Problema</th>
                  <th scope="col">Solução</th>
                  <th scope="col">Técnico</th>
                  <th scope="col">Data/Hora</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Deletar</th>
                </tr>
              </thead>
              <tbody>
              <?php
          while($user_data = mysqli_fetch_assoc($result))
        {
          echo "<tr>";
        //   echo "<td>".$user_data['id']."</td>";
          echo "<td>".$user_data['lugar']."</td>";
          echo "<td>".$user_data['patrimonio']."</td>";
          echo "<td>".$user_data['problema']."</td>";
          echo "<td>".$user_data['solucao']."</td>";
          echo "<td>".$user_data['tecnico']."</td>";
          echo "<td>".$user_data['created']."</td>";
          echo "<td>
            <a class='btn btn-sm btn-primary' style='border: blue; background-color:#1b4384;'  href='edit.php?id=$user_data[id]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
            </svg>
            </a>
            </td>";

          echo "<td>
          <a class= 'btn btn-sm btn-primary' style='background-color: red; border: red;' href='proc_apagar_usuario.php?id=$user_data[id]'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
</svg>
          
          </a>
          </td>";
        }
        ?>
              </tbody>
            </table>  
        </div>
    </div>
</body>
<script>
   var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") 
    {
        searchData();
    }
});

function searchData()
{
    window.location = 'listar.php?search='+search.value;
}
</script>
</html>