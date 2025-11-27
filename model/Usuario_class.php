<?php
class Usuario
{
	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $cidade;
	private $senha;
	private $foto;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;

		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;

		return $this;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function setCidade($cidade)
	{
		$this->cidade = $cidade;

		return $this;
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function setSenha($senha)
	{
		$this->senha = $senha;

		return $this;
	}

	public function getFoto()
	{
		return $this->foto;
	}

	public function setFoto($foto)
	{
		$this->foto = $foto;

		return $this;
	}
}
