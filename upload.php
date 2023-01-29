<?php
require('conexao.php');
// var_dump($_FILES['file']);
if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {

    $file = $_FILES['file'];
    $pasta = 'arquivos/';
    $nome_file = uniqid();
    $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($extensao != 'png' && $extensao != 'jpeg') {
        header('Location: ./');
        exit;
    }

    $point_end = move_uploaded_file($file['tmp_name'], $pasta . $nome_file . '.' . $extensao);
    $point_url = $pasta . $nome_file . '.' . $extensao;
    if ($point_end) {
        $conexao->query("INSERT INTO arquivos (path , data_upload, usuario) VALUES ('$point_url','" . date('d/m/y') . "','Geremias')");
        header('Location: ./index.php?upload=ok');
        exit;
    } else {
        header('Location: ./');
        exit;
    }
} else {
    header('Location: ./');
    exit;
}


        // 1024 bytes = 1 kb
        // 1024 kb = 1 mb
