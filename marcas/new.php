<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\FlashMessages;
    use App\dao\UsuarioDAO;

    $stmt_use = UsuarioDAO::getByEmail($_SESSION['user']);
    $user = $stmt_use->fetch(PDO::FETCH_OBJ);

    if(! $_SESSION['logado']) {
        FlashMessages::setMessage("Você precisa estar logado para executar essa ação.", "error");
        header("Location: /usuario/login.php");
        exit(0);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./partials/_head.php") ?>
    <title>Cadastro de Marcas</title>
    <?php include("./partials/_javascript_import.php") ?>
</head>

<body>
    <?php include("./partials/_header.php") ?>
    <section id="content">
        <div class="container mt-3">
            <h1>
                Cadastro de Marcas
            </h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="/marcas/create.php" method="POST">
                        <div class="form-group">
                            <label for="nome">Nome da Marca:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" hidden id="id_usuario" name="id_usuario" value="<?= $user->id ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>