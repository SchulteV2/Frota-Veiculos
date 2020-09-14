<?php 

    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\MarcasDAO;
    use App\dao\VeiculosDAO;

    $id = $_GET['id'];

    $stmt_marcas = MarcasDAO::getAll();

    $stmt_veiculo = VeiculosDAO::getById($id);
    $veiculos = $stmt_veiculo->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./partials/_head.php") ?>
    <title>Edição de Veículos</title>
    <?php include("./partials/_javascript_import.php") ?>
</head>

<body>
    <?php include("./partials/_header.php") ?>
    <section id="content">
        <div class="container mt-3">
            <div class="row">
                <h1>
                    Edição de Veículos
                </h1>
                <div class="col-md-12">
                    <form action="/veiculos/update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $veiculos->id ?>">

                        <div class="form-group row">
                            <label for="nome_veiculo">Nome do Veículo:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= $veiculos->nome ?>">
                        </div>

                        <div class="form-group row">
                            <label for="ano">Ano do Veículo:</label>
                            <input type="text" class="form-control" id="ano" name="ano" value="<?= $veiculos->ano ?>">
                        </div>

                        <div class="form-group row">
                            <label for="preco">Preço do Veículo:</label>
                            <input type="text" class="form-control" id="preco" name="preco" value="<?= $veiculos->preco ?>">
                        </div>
                        
                        <div class="form-group row">
                            <label for="nome_marca">Marca do Veículo:</label>
                            <select class="form-control" id="id_marca" name="id_marca">
                                <?php while($marca = $stmt_marcas->fetch(PDO::FETCH_OBJ)) : ?>
                                    <option <?= ($veiculos->id_marca == $marca->id) ? "selected" : "" ?> value="<?= $marca->id ?>"><?= $marca->nome ?></option>
                                <?php endwhile ?>
                            </div>
                            <p>
                                <input type="submit" value="Salvar" class="btn btn-info mt-3">
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>