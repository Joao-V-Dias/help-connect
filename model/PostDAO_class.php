<?php
require_once 'Post_class.php';
require_once 'ConnectionFactory_class.php';

class PostDAO
{
    private $conn;

    public function __construct()
    {
        $factory = new ConnectionFactory();
        $this->conn = $factory->getConnection();
    }

    public function create(Post $post)
    {
        $sql = "INSERT INTO posts (titulo, descricao, categoria, tipo, cidade, usuario_id, imagem, created_at)
                VALUES (:titulo, :descricao, :categoria, :tipo, :cidade, :usuario_id, :imagem, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':titulo', $post->getTitulo());
        $stmt->bindValue(':descricao', $post->getDescricao());
        $stmt->bindValue(':categoria', $post->getCategoria());
        $stmt->bindValue(':tipo', $post->getTipo());
        $stmt->bindValue(':cidade', $post->getCidade());
        $stmt->bindValue(':usuario_id', $post->getUsuarioId());
        $stmt->bindValue(':imagem', $post->getImagem());
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function update(Post $post)
    {
        $sql = "UPDATE posts SET titulo=:titulo, descricao=:descricao, categoria=:categoria, tipo=:tipo, cidade=:cidade, imagem=:imagem WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':titulo', $post->getTitulo());
        $stmt->bindValue(':descricao', $post->getDescricao());
        $stmt->bindValue(':categoria', $post->getCategoria());
        $stmt->bindValue(':tipo', $post->getTipo());
        $stmt->bindValue(':cidade', $post->getCidade());
        $stmt->bindValue(':imagem', $post->getImagem());
        $stmt->bindValue(':id', $post->getId());
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;
        $post = new Post();
        $post->setId($row['id']);
        $post->setTitulo($row['titulo']);
        $post->setDescricao($row['descricao']);
        $post->setCategoria($row['categoria']);
        $post->setTipo($row['tipo']);
        $post->setCidade($row['cidade']);
        $post->setUsuarioId($row['usuario_id']);
        $post->setImagem($row['imagem']);
        $post->setCreatedAt($row['created_at']);
        return $post;
    }

    public function findAllByTipo($tipo)
    {
        $sql = "SELECT * FROM posts WHERE tipo = :tipo ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':tipo', $tipo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
