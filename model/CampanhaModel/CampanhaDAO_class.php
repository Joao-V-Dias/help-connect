<?php
require_once ROOT_PATH . '/model/ConnectionFactory_class.php';
require_once 'Campanha_class.php';

class CampanhaDAO
{
    private $conn;

    public function __construct()
    {
        $factory = new ConnectionFactory();
        $this->conn = $factory->getConnection();
    }

    public function create($campanha)
    {
        try {
            $sql = "INSERT INTO posts (titulo, descricao, categoria, tipo, cidade, usuario_id, imagem, created_at)
                VALUES (:titulo, :descricao, :categoria, :tipo, :cidade, :usuario_id, :imagem, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':titulo', $campanha->getTitulo());
            $stmt->bindValue(':descricao', $campanha->getDescricao());
            $stmt->bindValue(':categoria', $campanha->getCategoria());
            $stmt->bindValue(':tipo', $campanha->getTipo());
            $stmt->bindValue(':cidade', $campanha->getCidade());
            $stmt->bindValue(':usuario_id', $campanha->getUsuarioId());
            $stmt->bindValue(':imagem', $campanha->getImagem());
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $ex) {
            echo "Erro ao salvar no banco de dados";
        }
    }

    public function update(Campanha $campanha)
    {
        $sql = "UPDATE posts SET titulo=:titulo, descricao=:descricao, categoria=:categoria, tipo=:tipo, cidade=:cidade, imagem=:imagem WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':titulo', $campanha->getTitulo());
        $stmt->bindValue(':descricao', $campanha->getDescricao());
        $stmt->bindValue(':categoria', $campanha->getCategoria());
        $stmt->bindValue(':tipo', $campanha->getTipo());
        $stmt->bindValue(':cidade', $campanha->getCidade());
        $stmt->bindValue(':imagem', $campanha->getImagem());
        $stmt->bindValue(':id', $campanha->getId());
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
        $campanha = new Campanha();
        $campanha->setId($row['id']);
        $campanha->setTitulo($row['titulo']);
        $campanha->setDescricao($row['descricao']);
        $campanha->setCategoria($row['categoria']);
        $campanha->setTipo($row['tipo']);
        $campanha->setCidade($row['cidade']);
        $campanha->setUsuarioId($row['usuario_id']);
        $campanha->setImagem($row['imagem']);
        $campanha->setCreatedAt($row['created_at']);
        return $campanha;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
