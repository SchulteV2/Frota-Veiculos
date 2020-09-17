<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\VeiculosDAO;
    use App\utils\FlashMessages;
    
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $id_marca = $_POST['id_marca'];
    $id_usuario = $_POST['id_usuario'];

    VeiculosDAO::create($nome, $ano, $preco, $id_marca, $id_usuario);
    FlashMessages::setMessage("Veículo adicionado com sucesso!");
    header("Location: /veiculos/")

?>