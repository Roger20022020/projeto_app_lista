
<?php 

	require_once "../../../app_lista_tarefas/tarefa.model.php";
	require_once "../../../app_lista_tarefas/tarefa.service.php";	
	require_once "../../../app_lista_tarefas/conexao.php";
	require_once "../../../app_lista_tarefas/usuario.php";
	require_once "../../../app_lista_tarefas/usuario_service.php";

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao; // Operador ternário ou condicional

	//echo $acao;

	if($acao == 'inserir'){
		$tarefa = new Tarefa(); //objeto tarefa sendo criado, não o atributo
		$tarefa->__set('tarefa', $_POST['tarefa']); //atributo tarefa sendo informado

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa.php?inclusao=1');

	} elseif ($acao =='recuperar') {
		
		$tarefa = new Tarefa(); //objeto tarefa sendo criado, não o atributo
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas=$tarefaService->recuperar();

	} elseif ($acao == 'atualizar') {
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->atualizar()) {
			header('Location: todas_tarefas.php');
		}
	} elseif ($acao == 'remover') {
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();
		header('Location: todas_tarefas.php');

	} elseif ($acao == 'login') {
		
		$usuario = new Usuario();
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);

		$conexao = new Conexao();

		$UsuarioService = new UsuarioService($conexao, $usuario);
		$UsuarioService=$UsuarioService->logar();

		if ($UsuarioService) {
			header('Location: todas_tarefas.php?inclusao=2');
		} else {
			header('Location: login.php?inclusao=2');
		}		
		
	} elseif ($acao == 'cadastro') {

		$usuario = new Usuario(); //objeto sendo criado, não o atributo
		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);

		$conexao = new Conexao();

		$UsuarioService = new UsuarioService($conexao, $usuario);
		$UsuarioService->inserir();

		header('Location: login.php?inclusao=1');

	} /*else if($acao == 'marcarRealizada') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();

		header('location: todas_tarefas.php');
	} */				
 ?>