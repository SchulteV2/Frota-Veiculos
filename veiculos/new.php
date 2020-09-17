<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\MarcasDAO;
    use App\dao\UsuarioDAO;
    use App\utils\FlashMessages;
    
    $stmt_use = UsuarioDAO::getByEmail($_SESSION['user']);
    $user = $stmt_use->fetch(PDO::FETCH_OBJ);
    
    $stmt = MarcasDAO::getByUser($user->id);
    
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
    <title>Cadastro de Veículos</title>
    <?php include("./partials/_javascript_import.php") ?>
</head>

<body>
    <?php include("./partials/_header.php") ?>
    <section id="content">
        <div class="container mt-3">
            <div class="row">
                <h1>
                    Cadastro de Veículos
                </h1>
                <div class="col-md-12">
                    <form action="/veiculos/create.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="nome">Nome do Veículo:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>

                        <div class="form-group row">
                            <label for="ano">Ano do Veículo:</label>
                            <input type="text" class="form-control" id="ano" name="ano" required>
                        </div>

                        <div class="form-group row">
                            <label for="preco">Preço do Veículo:</label>
                            <input type="text" class="form-control" id="preco" name="preco" required>
                        </div>
                        <div class="form-group row">
                            <input type="text" class="form-control" hidden id="id_usuario" name="id_usuario" value="<?= $user->id ?>">
                        </div>
                        
                        <div class="form-group row">
                            <label for="nome_marca">Marca do Veículo:</label>
                            <select class="form-control" id="id_marca" name="id_marca">
                                <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                                    <option value="<?= $row->id ?>"><?= $row->nome ?></option>
                                <?php endwhile ?>
                            </div>
                            <p>
                                <input type="submit" value="Cadastrar" class="btn btn-info mt-3">
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>