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
    <br>
    <?php
    if (isset($_GET['upload'])) {
        if ($_GET['upload'] === 'ok') {
            echo 'Upload feito com sucessso <br>';
        }
    }
    ?>
    <br>
    <table  style="text-align: center;width:100%;background:#3434;border-radius:10px;padding:1rem;">
        <thead>
            <tr">
                <th>Id</th>
                <th>Path</th>
                <th>Data Cadastro</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require('conexao.php');
            $res = $conexao->query("SELECT * FROM arquivos");
            while ($row = $res->fetch_assoc()) {
                // echo "<img src='" . $row['path'] . "'>";
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td><a href='" . $row['path'] . "' target='_blank'>  <img src='" . $row['path'] . "'style='width:50px; heith:5opx;'/> </a></td>";
                echo "<td>" . $row['data_upload'] . "</td>";
                echo "<td>" . $row['usuario'] . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>



</body>

</html>