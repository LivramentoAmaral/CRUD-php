<?php
    include_once "config.php";
    $link = mysqli_connect($servidor,$usuario,$senha,$banco);

    

    if(!$link){
        echo "Falha ao conectar-se com o banco de dados";
        
    }


?>