<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\UsuarioDAO;

$stmt_id = UsuarioDAO::getAll();

$usuario = $stmt_id->fetch(PDO::FETCH_OBJ);

?>

<link rel="stylesheet" href="/partials/_header.css" />

<header class="cabecalho">
    <nav class="menu">
        <ul>
            <li>
                <a href="/veiculos">Veículos</a>
            </li>
            <li>
                <a href="/marcas">Marca</a>
            </li>
        </ul>
    </nav>
    <aside class="menu float-right">
        <?php if ($_SESSION['logado']) : ?>
            <a href="/usuario/sign_out.php" onclick="return confirm('Você realmente deseja sair')"><?= $usuario->email ?></a>
        <?php else : ?>
            <a href="/usuario/login.php">Logar</a>
        <?php endif ?>
    </aside>
</header>