<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="$_POST" action="processar-produto.php" enctype="multipart/form-data">
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Nome"><br><br>

        <label for="">Imagem</label>
        <input type="file" name="imagem"><br><br>

        <input name="SendCadImg" type="submit" value="Cadastrar">
    </form>
</body>
</html>