<?php
    include_once "conexao.php";
    $codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);
    $produto = filter_input(INPUT_GET,'nomeProduto',FILTER_SANITIZE_SPECIAL_CHARS);
    $preco_ant = str_replace(',','.', filter_input(INPUT_GET,'precoAnt',FILTER_SANITIZE_SPECIAL_CHARS));
    $preco_atual = str_replace(',','.', filter_input(INPUT_GET,'precoAtual',FILTER_SANITIZE_SPECIAL_CHARS ) );

    
    if ($codigo > 0){
       $sql = "UPDATE produtos SET nome='$produto', preco_ant='$preco_ant', preco_atual='$preco_atual' WHERE codigo='$codigo'";    } 
       else {
        $sql = "INSERT INTO produtos VALUES (null, '$produto', '$preco_ant', '$preco_atual')";
    }
    
    
    $inserir = mysqli_query($link, $sql);
    echo $inserir;

    if(!$inserir){
        echo "
        <script>
            alert('Erro ao cadastrar produto!');
            window.location.href = '../views/index.php';
        </script>";
    }
    else {
        echo "
        <script>
            alert('Produto cadastrado com sucesso!');
            window.location.href = '../views/index.php';
        </script>";
        
    }




?>  