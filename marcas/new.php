<?php 

    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

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
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>