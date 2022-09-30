<?php 
	//CRUD
	class TarefaService {

		private $conexao;
		private $tarefa;

		public function __construct(Conexao $conexao, Tarefa $tarefa){
			$this->conexao = $conexao->conectar();
			$this->tarefa = $tarefa;
		}

		public function inserir(){ //CREATE
			$query = 'insert into tb_tarefas(tarefa)values(:tarefa)'; //Coluna e Valor
			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa')); /*o get chama o valor que foi atribuido ao atributo tarefa dentro do objeto tarefa que foi instanciado e o joga para o valor (:tarefa) que irá para o banco de dados*/

			$stmt->execute();
		}
		public function recuperar(){ //READ
			$query = 'select t.id, s.status, t.tarefa 
				from tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)'; // faz o requerimento do bd utilizando modelo relacional acimilando o id_status da tabela tb_tarefas com id da tabela tb_status
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);

		}	
		public function atualizar(){ //UPDATE

			$query = 'update tb_tarefas set tarefa = :tarefa where id = :id';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
			$stmt->bindValue(':id', $this->tarefa->__get('id'));
			return $stmt->execute();
		}	

		public function remover(){ //DELETE

			$query = 'delete from tb_tarefas where id = :id';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id', $this->tarefa->__get('id'));
			return $stmt->execute();
		}
		
		public function marcarRealizada() { //update

		$query = "update tb_tarefas set id_status = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}
	}
 ?>