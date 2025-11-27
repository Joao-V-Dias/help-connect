<?php
require_once 'ConnectionFactory_class.php';
require_once 'Usuario_class.php';

class UsuarioDAO
{
	public $conn = null;

	public function __construct()
	{
		$factory = new ConnectionFactory();
		$this->conn = $factory->getConnection();
	}

	public function create($usuario)
	{
		try {
			$stmt = $this->conn->prepare(
				"INSERT INTO usuario (nome, email, telefone, cidade, senha, foto)
				VALUES (:nome, :email, :telefone, :cidade, :senha, :foto)"
			);
			$stmt->bindValue(":nome", $usuario->getNome());
			$stmt->bindValue(":email", $usuario->getEmail());
			$stmt->bindValue(":telefone", $usuario->getTelefone());
			$stmt->bindValue(":cidade", $usuario->getCidade());
			$stmt->bindValue(":senha", $usuario->getSenha());
			$stmt->bindValue(":foto", $usuario->getFoto());
			$stmt->execute();
			return $this->conn->lastInsertId();
		} catch (PDOException $ex) {
			echo "Erro ao salvar usuario: " . $ex->getMessage();
		}
	}

	public function login($email, $senha)
	{
		try {
			$stmt = $this->conn->prepare(
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
			echo "Erro ao fazer login: " . $ex->getMessage();
		}
	}

	public function buscar($id)
	{
		try {
			$stmt = $this->conn->prepare(
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
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	public function atualizar($usuario, $atualizarSenha = false)
	{
		try {
			if ($atualizarSenha) {
				$stmt = $this->conn->prepare(
					"UPDATE usuario SET nome = :nome, email = :email, telefone = :telefone, cidade = :cidade, foto = :foto, senha = :senha WHERE id = :id"
				);
				$stmt->bindValue(":senha", $usuario->getSenha());
			} else {
				$stmt = $this->conn->prepare(
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
