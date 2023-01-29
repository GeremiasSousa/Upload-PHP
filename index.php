<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de arquivos PHP</title>
    <script>
        history.pushState("Object", document.title, './');
    </script>
</head>
<body>
    <form action="./upload.php" enctype="multipart/form-data" method="post">
        <label for="file">Selecione arquivo</label>
        <input type="file" name="file" id="file"><br>
        <button type="submit">Enviar arquivo</button>
    </form>
    <?php 
        if(isset($_GET['upload'])){
            if($_GET['upload'] === 'ok'){
                echo 'Upload feito com sucessso';
            }
        }
    ?>
</body>
</html>