<?php

	/*$acao = 'cadastro';
	require 'tarefa_controller.php';

	/*
	echo '<pre>';
	print_r($tarefas);
	echo '</pre>';
	*/ Apenas para teste

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>
		
		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<!--<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li> Ainda será implementada--> 
						<li class="list-group-item"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<form method="post" action="tarefa_controller.php?acao=cadastro">
									<div class="form-group">
									  <label>Nome:</label><br>
									  <input type="text" class="form-control" name="nome"><br>

									  <label>Email:</label><br>
									  <input type="text" class="form-control" name="email"><br>

									  <label>Senha:</label><br>
									  <input type="text" class="form-control" name="senha">
									  <br><br>
									  <button class="btn btn-success">Cadastrar</button>		
									</div>  						
								  <br>								  
								</form>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
