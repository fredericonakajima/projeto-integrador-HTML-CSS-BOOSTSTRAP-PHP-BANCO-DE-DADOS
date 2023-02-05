		<?php
		  include_once '../banco/conexao_de_livros.php';
		$conectar = getConnection();
	?>
	<!doctype html>
	<html lang="pt-br">
	  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		 <link rel="stylesheet" href="loc.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
			<link rel="icon" href="favicon.ico" type="image/x-icon">
		<title>Login</title>
	  </head>
	  <body>
	   
			 <nav class="navbar navbar-dark bg-dark ">
						  <div class="container-fluid ">             
							  
							  <a class="nav-link text-white" href="#"><img src="menor-Senac_logo.svg.png" style="width:70px" alt=""><h4>Livraria Senac</h4></a>
							  <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#menuCursos" style="cursor:pointer"><span class="navbar-toggler-icon"></span></button>
						  
						  
							  <div class="navbar-collapse collapse" id="menuCursos">
								  <ul class="navbar-nav">
								  
									  <li class="nav-item">
										  <a class="nav-link text-white" href="login.php">Login</a>
									  </li>
									  <li class="nav-item">
										  <a class="nav-link text-white" href="tela_registro_de_usuarios.php">Cadastro</a>
									  </li>
									   <li class="nav-item">
			<a class="nav-link text-white" href="logout.php">Home</a>
		  </li>
		</ul>
								  </ul>
							  </div>
						  </div>                            
				</nav>
	   
	   
			<div class="container-fluid">
				<div class="card bg-dark shadow text-white" id="centralizar" style="width:400px;margin: 20px auto;">
						<div class="card-body">
							<form  method="post" class="p-1" action="autenticar.php"  >
								<legend><center>LOGIN</center></legend>
				
							<div>
								<label class="form-label" for="em">Email</label>
								<input class="form-control" type="email" id="em" name="email">
							</div>
							<div>
								<label class="form-label" for="se">Senha</label>
								<input  class="form-control" type="password" id="se" name="senha">
							</div>
							<div><input  class="form-control my-3" type="submit"  name="mandar" value="Entrar"></div>
							</form>
						</div>
				</div>
			</div>
			
			
		
	   <br><br>
	   
		

					
			   
		   
	   
	  
	   <!--CADASTRO DOS USUÁRIOS -->
	   <?php 
	   if(isset($_POST['enviar'])){
	   
		   
	   
	   
		   $nome = $_POST['nome'];
		   $email = $_POST['email'];
		   $senha = $_POST['senha'];
		   $confirmar_senha = $_POST['csenha'];
	   
		   if($senha == $confirmar_senha){
	   
			   //VERIFICAR SE EXISTE O EMAIL CADASTRADO NO BANCO DE DADOS
			   $res = $conectar->query("SELECT * from usuarios where email = '$email'");
			   $dados = $res->fetchAll(PDO::FETCH_ASSOC);
			   $linhas = count($dados);
	   
			   if($linhas == 0){
				   
				   $res = $conectar->prepare("insert into usuarios (nome, email, senha, nivel) values (:nome, :email, :senha, :nivel)");
	   
				   $res->bindValue(":nome", $nome);
				   $res->bindValue(":email", $email);
				   $res->bindValue(":senha", $senha);
				   $res->bindValue(":nivel", "Comum");
				   $res->execute();
	   
				   echo "<script language='javascript'>window.alert('Usuário Cadastrado!'); </script>";
			   }else{
				   echo "<script language='javascript'>window.alert('Este usuário já está cadastrado!'); </script>";
			   }
	   
			   
			   
		   }else{
			   echo "<script language='javascript'>window.alert('As senhas são Diferentes!'); </script>";
		   }
	   
		   
	   }
	   
	   
	   ?>
	   
	   

















		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
		-->
	  </body>
	</html>