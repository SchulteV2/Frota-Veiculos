<?php
    namespace App\dao;
    use App\utils\ConnectionFactory;
    use \PDO;

    class UsuarioDAO {


        public static function create($email, $senha) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO usuario (email, senha) VALUES (:email, :senha)");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt; 
        }

        public static function logar($email) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM usuario WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt;
        }
    }
