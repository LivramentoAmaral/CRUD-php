<?php
include_once "../controller/conexao.php";

$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);
$produto = filter_input(INPUT_GET, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
$preco_ant = str_replace(',', '.', filter_input(INPUT_GET, 'preco_ant', FILTER_SANITIZE_SPECIAL_CHARS));
$preco_atual = str_replace(',', '.', filter_input(INPUT_GET, 'preco_atual', FILTER_SANITIZE_SPECIAL_CHARS));
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/2b39ec69a0.js" crossorigin="anonymous"></script>
   
</head>

<body>
    <form action="../controller/salvar.php" method="get">
     
        <div class='inputs'>
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" id="codigo" readonly  value="<?php echo $codigo; ?>">

            <label for="nomeProduto">Produto:</label>
            <input type="text" name="nomeProduto" id="nome" value="<?php echo $produto; ?>">

            <label for="precoAnt">Preço Anterior:</label>
            <input type="text" name="precoAnt" id="preco_ant" value="<?php echo $preco_ant; ?>">

            <label for="precoAtual">Preço Atual:</label>
            <input type="text" name="precoAtual" id="preco_atual" value="<?php echo $preco_atual; ?>">
        </div>
        <div class="btn">
            <div>
                <a href="index.php">
                    <button type="button"><b>Novo</b></button>
                </a>
            </div>
            <div>
                <a href="index.php">
                    <button type="submit"><b>salvar</b></button>
                </a>
            </div>
        </div>
    </form>

    <table>
        <tr class='lista'>
            <th>Código</th>
            <th>Produto</th>
            <th>Preço Anterior</th>
            <th>Preço Atual</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    <?php 

    $sql = "SELECT * FROM produtos ORDER BY nome DESC;";
    $pesquisa = mysqli_query($link, $sql);

    if($pesquisa) {
        while ($linha = $pesquisa->fetch_assoc()){
            echo "
                <tr>
                    <td>".$linha['codigo']."</td>
                    <td>".$linha['nome']."</td>
                    <td> R$ ".$linha['preco_ant']."</td>
                    <td> R$ ".$linha['preco_atual']."</td>
                    <td>
                        <a href='?codigo=".$linha['codigo']."&produto= ".$linha['nome']."&preco_ant= ".$linha['preco_ant']."&preco_atual= ".$linha['preco_atual']."'>
                        <i class='fa-solid fa-file-pen'></i>
                        </a>
                    </td>
                    <td>
                        <a href='../controller/excluir.php?codigo=".$linha['codigo']."'>
                        <i class='fa-solid fa-trash-can'></i>
                        </a>
                    </td>
                </tr>
                ";
        }
    }
    else {
        echo "Erro ao realizar pesquisa.";
    }
    mysqli_close($link);
    ?>