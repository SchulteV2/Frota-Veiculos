<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\MarcasDAO;
    use App\dao\UsuarioDAO;
    use App\utils\FlashMessages;

    $id = $_GET['id'];
    $stmt = MarcasDAO::getById($id);

    $stmt_use = UsuarioDAO::getByEmail($_SESSION['user']);
    $user = $stmt_use->fetch(PDO::FETCH_OBJ);
    $stmt_marcas = MarcasDAO::getByUser($user->id);

    $marca = $stmt->fetch(PDO::FETCH_OBJ);

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
    <title>Marcas</title>
    <?php include("./partials/_javascript_import.php") ?>
</head>

<body>
    <?php include("./partials/_header.php") ?>
    <section id="content">
        <div class="container mt-3">
            <div class="row">
                <h1>
                    Edição da Marca
                </h1>
                <div class="col-md-12">
                    <form action="/marcas/update.php?id=<?= $marca->id ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $marca->id ?>">
                        <div class="form-group row">
                            <label for="nome">Nome da Marca:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= $marca->nome ?>">
                        </div>
                        <div class="form-group row">
                            <input type="text" class="form-control" hidden id="id_usuario" name="id_usuario" value="<?= $user->id ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>