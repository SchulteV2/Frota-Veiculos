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

        public static function getById($id) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM marcas WHERE id = :id LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        }

        public static function create($nome_marca) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO marcas (nome) VALUES (:nome)");
            $stmt->bindParam(':nome', $nome_marca, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt; 
        }

        public static function update($id, $nome_marca) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("UPDATE marcas SET nome=:nome WHERE id=:id");
            $stmt->bindParam(':nome', $nome_marca, PDO::PARAM_STR);
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
