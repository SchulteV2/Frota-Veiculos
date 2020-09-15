<?php
    namespace App\dao;
    use App\utils\ConnectionFactory;
    use \PDO;

    class VeiculosDAO {

        public static function getAll() {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT v.id as id, v.nome as nome, v.ano, v.preco, v.id_marca, m.nome as nome_marca FROM veiculos v " .
                                    "JOIN marcas m "  .
                                    "ON (v.id_marca = m.id)");
            $stmt->execute();

            return $stmt;
        }

        public static function getById($id) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT v.id as id, v.nome as nome, v.ano, v.preco, v.id_marca, m.nome as nome_marca FROM veiculos v " .
                                "JOIN marcas m "  .
                                "ON (v.id_marca = m.id) WHERE v.id = :id LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        }

        public static function getByMarcaId($id_marca) {
            $con = ConnectionFactory::getConnection();
    
            $stmt = $con->prepare("SELECT * FROM veiculos WHERE id_marca = :id_marca");
            $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt;
        }

        public static function create($nome, $ano, $preco, $id_marca) {
            $con = ConnectionFactory::getConnection();
    
            $stmt = $con->prepare("INSERT INTO veiculos (nome, ano, preco, id_marca) VALUES (:nome, :ano, :preco, :id_marca)");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':ano', $ano, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt; 
        }

        public static function update($id, $nome, $ano, $preco, $id_marca) {
            $con = ConnectionFactory::getConnection();
    
            $stmt = $con->prepare("UPDATE veiculos SET nome=:nome, ano=:ano, 
                                    preco=:preco, id_marca=:id_marca WHERE id=:id");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':ano', $ano, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt;
        }

        public static function delete($id) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM veiculos WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        }
    }
