<?php
require_once __DIR__ . '/../util/ConnectionFactory_class.php';
require_once __DIR__ . '/../model/Usuario_class.php';

class UsuarioDAO
{
	public $con = null;

	public function __construct()
	{
		$conF = new ConnectionFactory();
		$this->con = $conF->getConnection();
	}

	public function create($cont)
	{
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO usuario (nome, email, telefone, cidade, senha, foto)
				VALUES (:nome, :email, :telefone, :cidade, :senha, :foto)"
			);
			$stmt->bindValue(":nome", $cont->getNome());
			$stmt->bindValue(":email", $cont->getEmail());
			$stmt->bindValue(":telefone", $cont->getTelefone());
			$stmt->bindValue(":cidade", $cont->getCidade());
			$stmt->bindValue(":senha", $cont->getSenha());
			$stmt->bindValue(":foto", $cont->getFoto());

			$stmt->execute();

			// retorna o ID do usuário inserido
			return $this->con->lastInsertId();
		} catch (PDOException $ex) {
			echo "Erro no DAO";
		}
	}

	public function login($email, $senha)
	{
		try {
			$stmt = $this->con->prepare(
				"SELECT * FROM usuario WHERE email = :email"
			);
			$stmt->bindValue(":email", $email);
			$stmt->execute();

			$dado = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($dado && password_verify($senha, $dado["senha"])) {
				$usuario = new Usuario();
				$usuario->setId($dado["id"]);
				$usuario->setNome($dado["nome"]);
				$usuario->setEmail($dado["email"]);
				$usuario->setTelefone($dado["telefone"]);
				$usuario->setCidade($dado["cidade"]);
				$usuario->setFoto($dado["foto"]);
				return $usuario;
			} else {
				return null;
			}
		} catch (PDOException $ex) {
			echo "Falha ao fazer login";
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

	public function buscar($id)
	{
		try {
			$stmt = $this->con->prepare(
				"SELECT * FROM usuario WHERE id = :id"
			);
			$stmt->bindValue(":id", $id);

			$stmt->execute();

			$dado = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($dado) {
				$perfil = new Usuario();
				$perfil->setId($dado["id"]);
				$perfil->setNome($dado["nome"]);
				$perfil->setEmail($dado["email"]);
				$perfil->setTelefone($dado["telefone"]);
				$perfil->setCidade($dado["cidade"]);
				$perfil->setFoto($dado["foto"]);

				return $perfil;
			}
			// Exibe a view 404 caso não encontre o usuário (caminho relativo ao diretório do DAO)
			include_once __DIR__ . '/../view/404.php';
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	public function atualizar($usuario, $atualizarSenha = false)
	{
		try {
			if ($atualizarSenha) {
				$stmt = $this->con->prepare(
					"UPDATE usuario SET nome = :nome, email = :email, telefone = :telefone, cidade = :cidade, foto = :foto, senha = :senha WHERE id = :id"
				);
				$stmt->bindValue(":senha", $usuario->getSenha());
			} else {
				$stmt = $this->con->prepare(
					"UPDATE usuario SET nome = :nome, email = :email, telefone = :telefone, cidade = :cidade, foto = :foto WHERE id = :id"
				);
			}

			$stmt->bindValue(":nome", $usuario->getNome());
			$stmt->bindValue(":email", $usuario->getEmail());
			$stmt->bindValue(":telefone", $usuario->getTelefone());
			$stmt->bindValue(":cidade", $usuario->getCidade());
			$stmt->bindValue(":foto", $usuario->getFoto());
			$stmt->bindValue(":id", $usuario->getId());

			$stmt->execute();

			return true;
		} catch (PDOException $ex) {
			echo "Erro ao atualizar: " . $ex->getMessage();
			return false;
		}
	}
}
