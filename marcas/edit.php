<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\MarcasDAO;

    $id = $_GET['id'];
    $stmt = MarcasDAO::getById($id);

    $marca = $stmt->fetch(PDO::FETCH_OBJ);

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
                <div class="col-md-12">
                    <h1>
                        Edição da Marca
                    </h1>
                    <form action="/marcas/update.php?id=<?= $marca->id ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $marca->id ?>">
                        <div class="form-group row">
                            <label for="nome">Nome da Marca:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= $marca->nome ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>