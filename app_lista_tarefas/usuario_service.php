<?php 
	//CR
	class UsuarioService {

		private $conexao;
		private $usuario;

		public function __construct(Conexao $conexao, Usuario $usuario){
			$this->conexao = $conexao->conectar();
			$this->usuario = $usuario;
		}

		public function inserir(){ //CREATE
			$query = 'insert into tb_usuarios(nome, email, senha) values(:nome, :email, :senha)'; //Coluna e Valor
			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':nome', $this->usuario->__get('nome')); /*o get chama o valor que foi atribuido ao atributo nome dentro do objeto usuario que foi instanciado e o joga para o valor (:nom) que irá para o banco de dados*/

			//$stmt->execute();

			//$query = 'insert into tb_usuarios(email) values(:email)'; //Coluna e Valor
			//$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':email', $this->usuario->__get('email'));

			//$stmt->execute();			

			//$query = 'insert into tb_usuarios(senha) values(:senha)'; //Coluna e Valor
			//$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':senha', $this->usuario->__get('senha'));

			$stmt->execute();
		}
		public function logar(){ //requisição para verificar se dados no login existem no bd
			$query = 'select * from tb_usuarios where email = :email AND senha = :senha';	     
			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':email', $this->usuario->__get('email'));
			$stmt->bindValue(':senha', $this->usuario->__get('senha'));

			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}	
?>