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
		<title>Compradores</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		
		

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
			<link rel="icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="tela_listagem_de_livrosl.php">PDO</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a class="nav-link text-white" href="tela_listagem_de_livros.php" style="font-size:15pt;">Registro de Venda <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link text-white" href="compradores.php" style="font-size:15pt;">Clientes</a>
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
			<button class="btn btn-info mt-4 mb-2" data-toggle="modal" data-target="#modal">Comprador</button>
		</div>
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">Foto</th>
			  <th scope="col">Nome</th>
			  <th scope="col">email</th>
			  <th scope="col">Telefone</th>
			  
			  <th scope="col">Ações</th>
			  <th></th>
			</tr>
		  </thead>
		  <tbody>
			<?php

				if(isset($_GET['buscar']) and $_GET['txtbuscar'] != ''){

					$nome_buscar = $_GET['txtbuscar'] . '%';

					
					$res = $conectar->query("SELECT * from comprador where  nome_comprador LIKE '$nome_buscar' or email_comprador LIKE '$nome_buscar' order by nome_comprador asc");

				}else{
					$res = $conectar->query("SELECT * from comprador  order by nome_comprador asc");
				} 

				


				$dados = $res->fetchAll(PDO::FETCH_ASSOC);
				$quantidade_compradores = count($dados);
				
				for ($i=0; $i < count($dados); $i++) { 
					foreach ($dados[$i] as $key => $value) {
					$id_comprador = $dados[$i]['id_comprador'];
					$nome_comprador = $dados[$i]['nome_comprador'];
					$email_comprador = $dados[$i]['email_comprador'];
					$telefone_comprador = $dados[$i]['telefone_comprador'];
					$foto = $dados[$i]['foto'];
					$endereco = $dados[$i]['endereco'];
					$desabilitado = $dados[$i]['desabilitado'];
					}
					?>

				<?php if ($desabilitado <> 1){ ?>
					<tr>
					<td><?php 
						if ($endereco) {
							echo "<img width='50px' src=".$endereco.">"; 
						} else {
							echo '<img width="50px" src="../uploads/sem-perfil.jpg">'; 
						}
						?>
					</td>
					<td><?php echo $nome_comprador; ?></td>
					<td><?php echo $email_comprador; ?></td>
					<td><?php echo $telefone_comprador; ?></td>
					<td>
						<?php 
							if ($endereco) {
								echo "<a href=".$endereco." download>
									<img width='25px' src='download.png'>
								</a>";
							}
						?>
						
					</td>
					<td>
						<a href="compradores.php?acao=editar&id_comprador=<?php echo $id_comprador; ?>" class="text-info mr-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
	  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
	  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
	</svg><i class="far fa-edit"></i></a>
						<a href="compradores.php?acao=excluir&id_comprador=<?php echo $id_comprador; ?>" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
	  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
	</svg></i></a>
					</td>
					
					</tr>
				<?php 
					} else { 
						$quantidade_compradores = $quantidade_compradores - 1;
					} 
				?>
			<?php 	 }	  ?>
		   
		  </tbody>
		</table>

		<div class="col-md-12">
			
			<p class="text-muted" align="right"><?php echo $quantidade_compradores; ?> Compradores</p>
			
		</div>

	</div>



	</body>
	</html>



	<div class="modal fade" id="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Inserir comprador</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<form method="post" enctype="multipart/form-data"> 
				  <div class="form-group">
					<label for="exampleFormControlInput1">Nome </label>
					<input type="text" class="form-control" id="exampleFormControlInput1" name="nome_comprador" placeholder="Nome">
				  </div>
				   <div class="form-group">
					<label for="exampleFormControlInput1">Email</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" name="email_comprador" placeholder="Email">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Telefone</label>
					<input type="text" class="form-control telefone" id="exampleFormControlInput1" name="telefone_comprador" placeholder="Telefone">
				  </div>
				  <input type="file" name="userfile">
		  </div>
		 
			  <div class="modal-footer">
				<button type="submit" name="salvar" class="btn btn-primary">Salvar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

			  </div>
		  </form>
		</div>
	  </div>
	</div>
	 





	<!--CADASTRO DOS Compradores -->
	<?php 
	if(isset($_POST['salvar'])){
		$userfileName = $_FILES['userfile']['name'];
		if ($userfileName) {
			$uploaddir = '../uploads/';
			$tipo = ".jpg";
			$radon = rand(10,99863564);
			$foto = $userfileName."-".$radon.$tipo;
			$endereco = $uploaddir . $foto;

			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $endereco)) {
				//echo "File is valid, and was successfully uploaded.\n";
			} else {
				//echo "Possible file upload attack!\n";
			}
		} else {
			$foto = '';
			$endereco = '';
		}

		// criar coluna no banco de dados para o nome da foto  // ja volto
		$nome_comprador = $_POST['nome_comprador'];
		$email_comprador = $_POST['email_comprador'];
		$telefone_comprador = $_POST['telefone_comprador'];
		

			//VERIFICAR SE O PRODUTO JÁ ESTÁ CADASTRADO
			$res = $conectar->query("SELECT * from comprador where nome_comprador = '$nome_comprador'");
			$dados = $res->fetchAll(PDO::FETCH_ASSOC);
			$linhas = count($dados);

			if($linhas == 0){
				
				$res = $conectar->prepare("insert into comprador (nome_comprador, email_comprador, telefone_comprador, foto, endereco) values (:nome_comprador, :email_comprador, :telefone_comprador, :foto, :endereco)");

				$res->bindValue(":nome_comprador", $nome_comprador);
				$res->bindValue(":email_comprador", $email_comprador);
				$res->bindValue(":telefone_comprador", $telefone_comprador);
				$res->bindValue(":foto", $foto);
				$res->bindValue(":endereco", $endereco);
				
				$res->execute();

				echo "<script language='javascript'>window.alert('Comprador Cadastrado!'); </script>";

				echo "<script language='javascript'>window.location='compradores.php'; </script>";
			}else{
				echo "<script language='javascript'>window.alert('Este comprador já está cadastrado!'); </script>";
			}
		
	}


	?>




	<!--EDIÇÃO DOS PRODUTOS -->
	<?php 
	if(@$_GET['acao'] == 'editar'){

		
		$id_comprador = $_GET['id_comprador'];
		$id_editar = $_GET['id_comprador'];

	$res = $conectar->query("SELECT * from comprador where id_comprador = '$id_comprador'");
				
	$dados = $res->fetch(PDO::FETCH_ASSOC);
				
	foreach ($dados as $key => $value) {
					
		$nome_comprador = $dados['nome_comprador'];
		$email_comprador = $dados['email_comprador'];
		$telefone_comprador = $dados['telefone_comprador'];

		$nome_rec = $dados['nome_comprador'];
					
	}

	?>


	<div class="modal" id="modalEditar" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Editar Comprador</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form method="post" enctype="multipart/form-data"> 
				<div class="form-group">
				<label for="exampleFormControlInput1">Nome</label>
				<input type="text" class="form-control" id="exampleFormControlInput1" name="nome_comprador" placeholder="Nome" value="<?php echo $nome_comprador; ?>">
				</div>
				<div class="form-group">
				<label for="exampleFormControlInput1">email</label>
				<input type="text" class="form-control" id="exampleFormControlInput1" name="email_comprador" placeholder="email" value="<?php echo $email_comprador; ?>">
				</div>
				
				<div class="form-group">
				<label for="exampleFormControlInput1">telefone</label>
				<input type="text" class="form-control telefone" name="telefone_comprador" placeholder="telefone" id="telefone" value="<?php echo $telefone_comprador; ?>">
				</div>
			<input type="file" name="userfile">
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

		$userfileName = $_FILES['userfile']['name'];
		if ($userfileName) {
			$uploaddir = '../uploads/';
			$tipo = ".jpg";
			$radon = rand(10,99863564);
			$foto = $userfileName."-".$radon.$tipo;
			$endereco = $uploaddir . $foto;

			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $endereco)) {
				//echo "File is valid, and was successfully uploaded.\n";
			} else {
				//echo "Possible file upload attack!\n";
			}
		} else {
			$foto = '';
			$endereco = '';
		}

		$nome_comprador = $_POST['nome_comprador'];
		$email_comprador = $_POST['email_comprador'];
		$telefone_comprador = $_POST['telefone_comprador'];
			
			//VERIFICAR SE O NOME DO comprador FOI MUDADO
			if($nome_rec != $nome_comprador){

				//VERIFICAR SE O comprador JÁ ESTÁ CADASTRADO
				$res = $conectar->query("SELECT * from comprador where nome_comprador = '$nome_comprador'");
				$dados = $res->fetchAll(PDO::FETCH_ASSOC);
				$linhas = count($dados);

				if($linhas != 0){
					echo "<script language='javascript'>window.alert('Este comprador já está cadastrado!'); </script>";
					exit();
				}

			}

				$res = $conectar->query("SELECT * from comprador where id_comprador = '$id_editar'");
				$dados = $res->fetch(PDO::FETCH_ASSOC);
				unlink($dados['endereco']);
				
				$res = $conectar->prepare("update comprador set nome_comprador = :nome_comprador, email_comprador = :email_comprador, telefone_comprador = :telefone_comprador, foto = :foto, endereco = :endereco where id_comprador = '$id_editar'");

				$res->bindValue(":nome_comprador", $nome_comprador);
				$res->bindValue(":email_comprador", $email_comprador);
				$res->bindValue(":telefone_comprador", $telefone_comprador);
				$res->bindValue(":foto", $foto);
				$res->bindValue(":endereco", $endereco);
				
				$res->execute();

				echo "<script language='javascript'>window.alert('comprador Editado!'); </script>";

				echo "<script language='javascript'>window.location='compradores.php'; </script>";
			

				
	}


	?>


	<?php } ?>




	<!--EXCLUSÃO DOS compradores -->
	<?php 
		if(@$_GET['acao'] == 'excluir'){
			$id_comprador = $_GET['id_comprador'];

			$res = $conectar->query("SELECT * from cadastro where comprador = '$id_comprador'");
			$dados = $res->fetchAll(PDO::FETCH_ASSOC);
			$linhas = count($dados);
			
			echo $linhas;
			if ($linhas > 0) {
				$desabilitado = 1;
				$res = $conectar->prepare("update comprador set desabilitado = :desabilitado where id_comprador = '$id_comprador'");
				$res->bindValue(":desabilitado", $desabilitado);
				$res->execute();

			} else {
				$conectar->query("delete from comprador where id_comprador = '$id_comprador'");
			}
			//$conectar->query("delete from comprador where id_comprador = '$id_comprador'");

			echo "<script language='javascript'>window.alert('comprador Excluido!'); </script>";

			echo "<script language='javascript'>window.location='compradores.php'; </script>";
				

		}
	?>

	<script src="./js/jquery.mask.js"></script>
	<script>
		$(document).ready(function(){
			
			$(".telefone").mask("(00) 0000-0000")
			

		});
	</script>

	<script> $("#modalEditar").modal("show");</script>