<?php 

    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\UsuarioDAO;

    $id =  $_GET['id'];

    $stmt_id = UsuarioDAO::getById($id);

    $user_email = $stmt_id->fetch(PDO::FETCH_OBJ);

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
            <?php if($_SESSION['logado']) : ?>
                <a><?= $usuario->id ?></a>
                <a href="/usuario/sign_out.php">Sair</a>
            <?php else : ?>
                <a href="/usuario/login.php">Logar</a>
            <?php endif ?>   
        </aside>
</header>