	<?php
		  include_once '../banco/conexao_de_livros.php';
		$conectar = getConnection();
		
		@session_start();
	$usuario = $_SESSION['nome_usuario'];
	if ($usuario == ''){
		header('Location: login.php');
	}
	//echo $usuario;
	?>







	<!DOCTYPE html>
	<html>
	<head>
		
		<title>Livros</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		
		

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
			<link rel="icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand text-white" href="tela_listagem_de_livros">PDO</a>
	  

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a class="nav-link text-white" href="tela_listagem_de_livros.php" style="font-size:15pt;">Registro de Venda <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link text-white" href="compradores.php"  style="font-size:15pt;">Clientes</a>
		  </li>

		 
		 
		   <li class="nav-item ml-5">
			<a class="nav-link" href="home.html" style=" font-size: 17px;color: white;" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
	  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
	  <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
	</svg></a>
		  </li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
		  <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="txtbuscar">
		  <button class="btn btn-outline-white my-2 my-sm-0" type="submit" name="buscar">Buscar</button>
		</form>
	  </div>
	</nav>

	<div class="container">
		<div class="col-md-12">
			<button class="btn btn-info mt-4 mb-2" data-toggle="modal" data-target="#modal">Nova Venda</button>
		</div>
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">Id_livro</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Autor</th>
			  <th scope="col">Editora</th>
			  <th scope="col">Comprador</th>
			  <th scope="col">ações</th>
			</tr>
		  </thead>
		  <tbody>
			<?php

				if(isset($_GET['buscar']) and $_GET['txtbuscar'] != ''){

					$nome_buscar = $_GET['txtbuscar'] . '%';

					
					$res = $conectar->query("SELECT * from cadastro where nome_livro LIKE '$nome_buscar' order by nome_livro asc");

				}else{
					$res = $conectar->query("SELECT * from cadastro order by nome_livro asc");
				} 

				


				$dados = $res->fetchAll(PDO::FETCH_ASSOC);
				$quantidade_livros = count($dados);
				for ($i=0; $i < count($dados); $i++) { 
					foreach ($dados[$i] as $key => $value) {
					$id_livro = $dados[$i]['id_livro'];
					$nome_livro = $dados[$i]['nome_livro'];
					$autor = $dados[$i]['autor'];
					$editora = $dados[$i]['editora'];
					$comprador = $dados[$i]['comprador'];

					$res_p = $conectar->query("SELECT * from comprador where id_comprador = '$comprador'");
					$dados_p = $res_p->fetch(PDO::FETCH_ASSOC);
						foreach ($dados_p as $key => $value) {
						$nome_comprador = $dados_p['nome_comprador'];
						}
					}
					?>
					
			<tr>
				<td><?php echo $id_livro ?></td>
				<td><?php echo $nome_livro ?></td>
				<td><?php echo $autor ?></td>
				<td><?php echo $editora ?></td>
				<td><?php echo $nome_comprador?></td>
			  
			   <td>
				<a href="tela_listagem_de_livros.php?acao=editar&id_livro=<?php echo $id_livro; ?>" class="text-info mr-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
	  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
	  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
	</svg></a>
				<a href="tela_listagem_de_livros.php?acao=excluir&id_livro=<?php echo $id_livro; ?>" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
	  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
	</svg></a>
			  </td>

			</tr>

		<?php } ?>
		   
		  </tbody>
		</table>

	</div>



	</body>
	</html>



	<div class="modal" id="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Inserir Livro</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<form method="post">
				  
				   <div class="form-group">
					<label for="exampleFormControlInput1">Nome</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" name="nome_livro" placeholder="Nome do livro">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Autor</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" name="autor" placeholder="Autor">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Editora</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" name="editora" placeholder="Editora">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlSelect1">Comprador</label>
					<select class="form-control" name="comprador" id="exampleFormControlSelect1">

						<?php 
						$res = $conectar->query("SELECT * from comprador where desabilitado = 0 order by nome_comprador asc");

						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						
						for ($i=0; $i < count($dados); $i++) { 
							foreach ($dados[$i] as $key => $value) {
							$id_comprador = $dados[$i]['id_comprador'];
							$nome_comprador = $dados[$i]['nome_comprador'];
							
							}
							?>

						 ?>

					  <option value="<?php echo $id_comprador ?>"><?php echo $nome_comprador ?></option>

				  <?php } ?>
					 
					</select>
				  </div>
				  
				 
				  
				
		  </div>
		  <div class="modal-footer">
			<button type="submit" name="salvar" class="btn btn-primary">Salvar</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	 




	<!--CADASTRO DOS livros -->
	<?php 
	if(isset($_POST['salvar'])){

		


		$nome_livro = $_POST['nome_livro'];
		$autor = $_POST['autor'];
		$editora = $_POST['editora'];
		$comprador = $_POST['comprador'];
		
		

			//VERIFICAR SE O nome DO livro JÁ ESTÁ CADASTRADO
			$res = $conectar->query("SELECT * from cadastro where nome_livro = '$nome_livro'");
			$dados = $res->fetchAll(PDO::FETCH_ASSOC);
			$linhas = count($dados);

			if($linhas == 0){
				
				$res = $conectar->prepare("insert into cadastro (nome_livro, autor, editora, comprador) values (:nome_livro, :autor, :editora, :comprador)");

				$res->bindValue(":nome_livro", $nome_livro);
				$res->bindValue(":autor", $autor);
				$res->bindValue(":editora", $editora);
				$res->bindValue(":comprador", $comprador);
				
				
				$res->execute();

				echo "<script language='javascript'>window.alert('Livro Cadastrado!'); </script>";

				echo "<script language='javascript'>window.location='../view/tela_listagem_de_livros.php'; </script>";
			}else{
				echo "<script language='javascript'>window.alert('Este livro já está cadastrado!'); </script>";
			}

			
			
		

		
	}


	?>





	<!--EDIÇÃO DOS livros -->
	<?php 
	if(@$_GET['acao'] == 'editar'){
		$id_livro = $_GET['id_livro'];
		$id_editar = $_GET['id_livro'];

	$res = $conectar->query("SELECT * from cadastro where id_livro = '$id_livro'");
				
	$dados = $res->fetch(PDO::FETCH_ASSOC);
				
	foreach ($dados as $key => $value) {
					
		$nome_livro = $dados['nome_livro'];
		$autor = $dados['autor'];
		$editora = $dados['editora'];
		$comprador = $dados['comprador'];

		$res_p = $conectar->query("SELECT * from comprador where id_comprador = '$comprador'");
					$dados_p = $res_p->fetch(PDO::FETCH_ASSOC);
						foreach ($dados_p as $key => $value) {
						$nome_comprador = $dados_p['nome_comprador'];
						}

		$nome_livro_rec = $dados['nome_livro'];
					
	}

	?>


	<div class="modal" id="modalEditar" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Editar livro</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<form method="post"> 
				 
				  <div class="form-group">
					<label for="exampleFormControlInput1">Nome</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" name="nome_livro" placeholder="Nome" value="<?php echo $nome_livro ?>">
				  </div>
				   <div class="form-group">
					<label for="exampleFormControlInput1">Autor</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" name="autor" placeholder="autor" value="<?php echo $autor ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Editora</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" name="editora" placeholder="name@example.com" value="<?php echo $editora ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlSelect1">comprador</label>
					<select class="form-control" name="comprador" id="exampleFormControlSelect1">

						<option value="<?php echo $comprador ?>"><?php echo $nome_comprador ?></option>

						<?php 
						$res = $conectar->query("SELECT * from comprador order by nome_comprador asc");

						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						
						for ($i=0; $i < count($dados); $i++) { 
							foreach ($dados[$i] as $key => $value) {
							$id_comprador = $dados[$i]['id_comprador'];
							$nome_comp = $dados[$i]['nome_comprador'];
							
							}
							?>

						 ?>
						 
						   <?php 
						if($nome_comprador != $nome_comp){
					   ?>



						 <option value="<?php echo $id_comprador ?>"><?php echo $nome_comp ?></option>

						
								<?php } ?>
					 

						<?php } ?>
						
						  </select>
					  </div>
						
					 
				  
				 
				 
				 
				  
				
		  </div>
		 
			  <div class="modal-footer">
				<button type="submit" name="editar" class="btn btn-primary">Editar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

			  </div>
		  </form>
		</div>
	  </div>
	</div>


	<?php 
	if(isset($_POST['editar'])){

		$nome_livro = $_POST['nome_livro'];
		$autor = $_POST['autor'];
		$editora = $_POST['editora'];
		$comprador = $_POST['comprador'];
		
			
			//VERIFICAR SE O NOME DO comprador FOI MUDADO
			if($nome_comprador != $nome_comprador){

				//VERIFICAR SE O comprador JÁ ESTÁ CADASTRADO
				$res = $conectar->query("SELECT * from cadastro where nome_livro = '$nome_livro'");
				$dados = $res->fetchAll(PDO::FETCH_ASSOC);
				$linhas = count($dados);

				if($linhas != 0){
					echo "<script language='javascript'>window.alert('Este comprador já está cadastrado!'); </script>";
					exit();
				}

			}


				
				$res = $conectar->prepare("update cadastro set nome_livro = :nome_livro, autor = :autor, editora = :editora, comprador = :comprador where id_livro = '$id_editar'");

				$res->bindValue(":nome_livro", $nome_livro);
				$res->bindValue(":autor", $autor);
				$res->bindValue(":editora", $editora);
				$res->bindValue(":comprador", $comprador);
				
				
				$res->execute();

				
				echo "<script language='javascript'>window.alert('Livro Editado!'); </script>";

				echo "<script language='javascript'>window.location='tela_listagem_de_livros.php'; </script>";
			

				
	}


	?>


	<?php } ?>





	<!--EXCLUSÃO DOS livros -->
	<?php 
	if(@$_GET['acao'] == 'excluir'){
		$id_livro = $_GET['id_livro'];

		$conectar->query("delete from cadastro where id_livro = '$id_livro'");

		echo "<script language='javascript'>window.alert('Livro Excluido!'); </script>";

		echo "<script language='javascript'>window.location='tela_listagem_de_livros.php'; </script>";
			

	}
	?>






	<script> $("#modalEditar").modal("show");</script>



	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){
		  $('#telefone').mask('(00) 00000-0000');
		  $('#cpf').mask('000.000.000-00');
		  });
	</script>
		
	   
		  
	 
		





