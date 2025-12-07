<?php
class Campanha
{
    private $id;
    private $titulo;
    private $descricao;
    private $categoria;
    private $tipo;
    private $cidade;
    private $usuario_id;
    private $imagem;
    private $created_at;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getImagem()
    {
        return $this->imagem;
    }
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
