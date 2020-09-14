<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\dao\MarcasDAO;

    $stmt = MarcasDAO::getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("partials/_head.php") ?>
    <title>Marcas</title>
    <?php include("partials/_javascript_import.php") ?>
</head>

<body>
    <?php include("partials/_header.php") ?>
    <div class="cardbox">
        <div class="Card">
            <div class="Title">Lista de Marcas</div>
            <div class="Content">
                <?php include("partials/_flash_messages.php") ?>
                <a href="/marcas/new.php" class="btn btn-success mr-1 mb-2 float-right">Cadastrar Nova Marca</a>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Ações</th>
                    </tr>

                    <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                        <tr>
                            <td><?= $row->id ?></td>
                            <td><?= $row->nome ?></td>
                            <td>
                                <a href="/marcas/edit.php?id=<?= $row->id ?>" class="btn btn-sm btn-warning mr-1">Editar</a>
                                <a href="/marcas/destroy.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente deseja excluir a categoria:')">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile ?>

                </table>
            </div>
        </div>

    </div>
</body>

</html>