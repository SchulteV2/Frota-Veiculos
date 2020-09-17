<?php
    namespace App\dao;
    use App\utils\ConnectionFactory;
    use \PDO;

    class MarcasDAO {

        public static function getAll() {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM marcas ORDER BY nome ASC");
            $stmt->execute();

            return $stmt;
        }
        public static function getByUser($userId) {
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT m.* FROM marcas m " . 
                                "JOIN usuario u " .
                                "ON (m.id_usuario = u.id )" .
                                "WHERE m.id_usuario = ${userId}");
            $stmt->execute();

            return $stmt;
        }

        public static function getById($id) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM marcas WHERE id = :id LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        }

        public static function create($nome_marca, $id_usuario) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO marcas (nome, id_usuario) VALUES (:nome, :id_usuario)");
            $stmt->bindParam(':nome', $nome_marca, PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt; 
        }

        public static function update($id, $nome_marca, $id_usuario) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("UPDATE marcas SET nome=:nome, id_usuario=:id_usuario WHERE id=:id");
            $stmt->bindParam(':nome', $nome_marca, PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        }

        public static function delete($id) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM marcas WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        }
    }
