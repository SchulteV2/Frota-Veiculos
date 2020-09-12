<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\VeiculosDAO;

    $stmt = VeiculosDAO::getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("./partials/_head.php") ?>
    <title>Veiculos</title>
    <?php include("./partials/_javascript_import.php") ?>
</head>
<body>
    <?php include("partials/_header.php") ?>
    <div class="cardbox">
        <div class="Card">
            <div class="Title">Lista da Frota</div>
            <div class="Content">
                <a href="/veiculos/new.php" class="btn btn-success mr-1 mb-2 float-right">Cadastrar Novo Veículo</a>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Veículo</th>
                        <th>Ano</th>
                        <th>Preço</th>
                        <th>Marca</th>
                        <th>Ações</th>
                    </tr>

                    <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                        <tr>
                            <td><?= $row->id ?></td>
                            <td><?= $row->nome ?></td>
                            <td><?= $row->ano ?></td>
                            <td><?= $row->preco ?></td>
                            <td><?= $row->nome_marca ?></td>
                            <td>
                                <a href="/veiculos/edit.php?id=<?= $row->id ?>" class="btn btn-sm btn-warning mr-1">Editar</a>
                                <a href="/veiculos/destroy.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente deseja excluir o veículo:')">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile ?>

                </table>
            </div>
        </div>

    </div>
</body>
</html>