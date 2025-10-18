<?php
	include_once("ConnectionFactory_class.php");
	include_once("Usuario_class.php");
	
	class UsuarioDAO{
			public $con = null;
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
	
		public function cadastrar($cont){
			try{
				$stmt = $this->con->prepare(
				"INSERT INTO usuario (nome, email, telefone, cidade, senha, foto)
				VALUES (:nome, :email, :telefone, :cidade, :senha, :foto)");
				$stmt->bindValue(":nome", $cont->getNome());
				$stmt->bindValue(":email", $cont->getEmail());
				$stmt->bindValue(":telefone", $cont->getTelefone());
				$stmt->bindValue(":cidade", $cont->getCidade());
				$stmt->bindValue(":senha", $cont->getSenha());
				$stmt->bindValue(":foto", "https://wallpapers.com/images/high/alpaca-lowered-ears-izpzu2pf2lupt5ho.webp");
				
				$stmt->execute();
			}
			catch(PDOException $ex){
				die("ERRO FATAL NO DAO: " . $ex->getMessage());
			}
		}

		public function login($cont) {
			try {
				$stmt = $this->con->prepare(
					"SELECT * FROM usuario WHERE email = :email AND senha = :senha"
				);
				$stmt->bindValue(":email", $cont->getEmail());
				$stmt->bindValue(":senha", $cont->getSenha());
				$stmt->execute();

				if ($stmt->rowCount() > 0) {
					$dado = $stmt->fetch(PDO::FETCH_ASSOC);
					$usuario = new Usuario();
					$usuario->setId($dado["id"]);
					$usuario->setNome($dado["nome"]);
					$usuario->setEmail($dado["email"]);
					$usuario->setTelefone($dado["telefone"]);
					$usuario->setCidade($dado["cidade"]);
					$usuario->setSenha($dado["senha"]);
					$usuario->setFoto($dado["foto"]);
					return $usuario;
				} else {
					return null; // Login failed
				}
			} catch (PDOException $ex) {
				die("ERRO FATAL NO DAO: " . $ex->getMessage());
			}
		}
		
		//alterar
		// public function alterar($cont){
		// 	try{
		// 		$stmt = $this->con->prepare(
		// 		"UPDATE contato SET nome=:nome, 
		// 		email = :email, telefone=:telefone, foto=:foto WHERE
		// 		id=:id");
				
		// 		//ligamos as âncoras aos valores de Contato
		// 		$stmt->bindValue(":nome", $cont->getNome());
		// 		$stmt->bindValue(":email", $cont->getEmail());
		// 		$stmt->bindValue(":telefone", $cont->getTelefone());
		// 		$stmt->bindValue(":foto", $cont->getFoto());
		// 		$stmt->bindValue(":id", $cont->getId());
				
		// 		$this->con->beginTransaction();
		// 	    $stmt->execute(); //execução do SQL	
		// 		$this->con->commit(); 
		// 		/*$this->con->close();
		// 		$this->con = null;*/	
		// 	}
		// 	catch(PDOException $ex){
		// 		echo "Erro: " . $ex->getMessage();
		// 	}
		// }
		//excluir
		// public function excluir($cont){
		// 	try{
		// 		$num = $this->con->exec("DELETE FROM contato WHERE id = " . $cont->getId());
		// 		//numero de linhas afetadas pelo comando
				
		// 		if($num >= 1){
		// 			return 1;
		// 		} else {
		// 			return 0;
		// 		}
		// 	}
		// 	catch(PDOException $ex){
		// 		echo "Erro: " . $ex->getMessage();
		// 	}
		// }
		
		// public function exibir($id){			
		// 	try{				
		// 		$lista = $this->con->query("SELECT * FROM contato WHERE id = " . $id);
				
		// 		/*$this->con->close();
		// 		$this->con = null;*/
				
		// 		$dado = $lista->fetchAll(PDO::FETCH_ASSOC);
				
		// 		$c = new Contato();
		// 		$c->setId($dado[0]["id"]);
		// 		$c->setNome($dado[0]["nome"]);
		// 		$c->setTelefone($dado[0]["telefone"]);
		// 		$c->setEmail($dado[0]["email"]);
		// 		$c->setFoto($dado[0]["foto"]);
				
		// 		return $c;	
		// 	}
		// 	catch(PDOException $ex){
		// 		echo "Erro: " . $ex->getMessage();
		// 	}
			
		// }
	}


?>