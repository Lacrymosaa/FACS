<?php

    include("conexao.php");

    if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if($arquivo['error'])
            die("Falha ao envivar arquivo");

        // Define um tamanho máximo para a imagem 
        if($arquivo['size'] > 2097152) 
            die("Arquivo muito grande, máximo: 2MB");

        // Local onde os arquivos serão salvos
        $pasta = "arquivos/";

        // Renomeia o arquivo para garantir que o nome do arquivo não se repita
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        // Verifica se o arquivo tem a extensão permitida
        if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
            die("Tipo de arquivo não aceito");

        // Caminho de acesso
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

        // Verifica se o upload foi realizado com sucesso, e salva a imagem
        // Não tem necessidade de salvar o nome nomeDoArquivo, apenas o path 
        if($deu_certo) {
            $mysqli->query("INSERT INTO arquivos (nome, path) VALUES ('$nomeDoArquivo', '$path')") or die($mysqli->error);
            echo "<p>Arquivo enviado com sucesso! Para acessá-lo, clique aqui: <a target=\"_blank\" href=\"arquivos/$novoNomeDoArquivo.$extensao\">Clique aqui</a></p>";
        } else 
            echo "<p>Falha ao enviar arquivo</p>";

    }

    $sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);

?>

<!-- Esse html é para exemplo e teste, não precisa ser mantido -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="">
        <p><label for="">Selecione o arquivo</label>
        <input name="arquivo" type="file"></p>
        <button name="upload" type="submit">Enviar arquivo</button>
    </form>

    <h1>Lista de Arquivo</h1>
    <table border="1" cellpadding="10">
        <thead>
            <th>Preview</th>
            <th>Arquivo</th>
            <th>Data de Envio</th>
        </thead>
        <tbody>
            <?php
                while($arquivo = $sql_query->fetch_assoc()) {

            ?>
            <tr>
                <td><img height="50" src="<?php echo $arquivo['path']; ?>" alt=""></td>
                <td><a target="_blank" href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['nome']; ?></a></td>
                <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload'])); ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

</body>
</html>