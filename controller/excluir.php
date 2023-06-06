<?php
    include_once "conexao.php";
    $codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "DELETE FROM produtos WHERE codigo = $codigo";
    $inserir = mysqli_query($link, $sql);

if ($inserir) {
    echo "
    <script>
        alert('Produto excluído com sucesso!');
        window.location.href = '../views/index.php';
    </script>";
} else {
    echo "
    <script>
        alert('Erro ao excluir produto!');
        window.location.href = '../views/index.php';
    </script>";
}

mysqli_close($link);
?>

