	<!doctype html>
	<html lang="pt-br">
	  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
			<link rel="icon" href="favicon.ico" type="image/x-icon">
		<title>Cadastro de Livros</title>
	  </head>
	<body>
		
	  
		<br><br><br>	
			
		
		 <div class="container-fluid">
				<div class="card bg-secondary shadow text-white" id="centralizar" style="width:400px;margin: 20px auto;">
						<div class="card-body">
	   
	   
							<form method="post" action="../model/cadastro_de_livros.php" enctype="multipart/form-data" >
								<legend><strong>CADASTRO DE LIVROS</strong></legend>

							 <div>  
							<label  class="form-label mt-2" id="la" for="no">Nome do livro</label>
							 <input class="form-control" type="text" id="no" name="nome">
							 </div>
							 <div>
							 <label  class="form-label mt-2" for="au">Autor</label>
							 <input class="form-control" type="text" id="au" name="autor">
							 </div>
							 <div>
							 <label  class="form-label mt-2" for="te">Editora</label>
							 <input class="form-control" type="text" id="te" name="editora">
							 </div>
							 <div>
							<label  class="form-label mt-2" for="fil" id="fi">Capa do livro</label> 
							<input class="form-control" type="file" id="fil" name="enviar_arquivo">
							</div>
							<div><input class="form-control my-4" type="submit" id="sub" name="enviar" value="Cadastrar">
							</form>
			
				 </div>
			</div>
		</div>
		<br>
	   
		
	<div><a class="btn btn-secondary" href="../view/tela_listagem_de_livros.php">exibir lista de livros</a></div>
	 
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
				   









			   





		   



		
		
