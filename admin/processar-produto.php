<?php
    include_once("../config/conexao-cadastrar-produto.php");
    $nomeproduto=$_POST['nome'];
    $descricaoproduto=$_POST['descricao'];
    $precoproduto=$_POST['preco'];
    $precovipproduto=$_POST['precovip'];
    $estoqueproduto=$_POST['estoque'];
    $somentevip=$_POST['vip'];
    $categoriaproduto=$_POST['selectID'];
    $custoproutos=$_POST['custo_produto'];
    $nome_image=$_FILES['imagem']['name'];

    echo "Nome do produto: $nomeproduto <br>";
    echo "Descrição do produto: $descricaoproduto <br>";
    echo "Preço do produto: $precoproduto <br>";
    echo "Preço VIP do produto: $precovipproduto <br>";
    echo "Estoque do produto: $estoqueproduto <br>";
    echo "Categoria do produto: $categoriaproduto <br>";

    echo "Nome da imagem do produto: $nome_image <br>";

    //$resulta_produto = "INSERT INTO produtos (nome, descricao, preco, precovip, estoque, vip, images, categoria, criado) VALUES ('$nomeproduto', '$descricaoproduto', '$precoproduto', '$precovipproduto', '$estoqueproduto', '$somentevip' '$nome_image', '$categoriaproduto', NOW())";


    //salvar no banco de dados
    $resulta_produto = "INSERT INTO produtos (nome, descricao, preco, precovip, estoque, vip, images, categoria, custo, criado) VALUES ('$nomeproduto', '$descricaoproduto', '$precoproduto', '$precovipproduto', '$estoqueproduto', '$somentevip', '$nome_image', '$categoriaproduto', '$custoproduto', NOW())";
    $resultadoproduto = mysqli_query($conn, $resulta_produto);
    $ultimo_id = mysqli_insert_id($conn);
    echo "Ultimo ID inserido: $ultimo_id <br>";

    //Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = '../images/produtos/' .$ultimo_id.'/';

    //Cria a pasta de fotos do produto
    mkdir($_UP['pasta'], 0777);

    //Verificar se é possivel mover o arquivo para a pasta a escolhida
    if(move_uploaded_file($_FILES['img-produto']['tmp_name'],$_UP['pasta'].$nome_image));

    if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: ../admin/produtos-admin.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar usuario</p>";
	header("Location: ../admin/produtos-admin.php");
}

    
?>
