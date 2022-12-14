<?php
include_once '../config/conexao-vitrine.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="produtos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/painel.css" />
    <title>Painel - DropNinja</title>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">DropNinja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <form class="d-flex ms-auto my-3 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Search" />
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Suporte</a>
                            </li>
                            <li><a class="dropdown-item" href="../config/logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            CORE
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3 active">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Painel</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Configura????o
                        </div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
                            <span class="me-2"><i class="bi bi-layout-split"></i></span>
                            <span>Configura????es</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layouts">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="./produtos-admin.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Lista de produtos</span>

                                <li>
                                    <a href="./clientes.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Clientes</span>
                                    </a>
                                </li>

                                </a>
                    </li>
                </ul>
        </div>
        </li>
        <li>
            <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pagina1</span>
            </a>
        </li>
        <li class="my-4">
            <hr class="dropdown-divider bg-light" />
        </li>
        <li>
            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Extra
            </div>
        </li>
        <li>
            <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Extra 1</span>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Extra 2</span>
            </a>
        </li>
        </ul>
        </nav>
    </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
                <h1>Produtos</h1>

                <!-- Button trigger modal -->
                <div>
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#cadProdutoModal">
                        Cadastrar Novo Produto
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="cadProdutoModal" tabindex="-1" aria-labelledby="cadProdutoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cadProdutoModalLabel">Cadastrar Produto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span id="msgAlertErroCad"></span>
                            <form method="POST" enctype="multipart/form-data" action="processar-produto.php">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="nome">Nome do produto</label>
                                        <input for="nome" type="text" name="nome" id="nome" class="form-control" placeholder="Nome do produto">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="categoria">Selecione a categoria</label>
                                        <select for="categoria" name="categoria" id="categoria" class="form-control">
                                            <option value="">Selecione a categoria</option>
                                            <option value="iPhone">iPhone</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="vip">Apenas VIP</label>
                                        <select for="vip" name="vip" id="vip" class="form-control">
                                            <option value="">Selecione a op????o</option>
                                            <option value="N??o">N??o</option>
                                            <option value="Sim">Sim</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="descricao">Descri????o do produto</label>
                                        <textarea for="descricao" id="descricao" data-field="descricao" rows="10" style="min-height: 300px; height: 300px" class="form-control inputproduto" name="descricao"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label for="preco">Valor de venda</label>
                                            <input for="preco" type="text" id="preco" class="form-control ex-currency" name="preco" placeholder="Valor de venda" value>
                                        </div>

                                        <div class="col-sm-3 form-group">
                                            <label for="precovip">Valor de venda VIP</label>
                                            <input for="precovip" id="precovip" type="text" class="form-control ex-currency" id="precovip" name="precovip" placeholder="Valor de venda VIP" value>
                                        </div>

                                        <div class="col-sm-3 form-group">
                                            <label for="custo">Custo do produto</label>
                                            <input for="custo_produto" type="text" id="custo" class="form-control ex-currency" id="custo_produto" name="custo_produto" placeholder="Custo do produto" value>
                                        </div>

                                        <div class="col-sm-2 form-group">
                                            <label for="lucro">Potencial lucro</label>
                                            <input for="potencial_lucro" type="text" id="lucro" class="form-control ex-currency" id="potencial_lucro" name="lucro" placeholder="Potencial lucro" value>
                                        </div>

                                        <div class="col-sm-2 form-group">
                                            <label for="estoque">Estoque</label>
                                            <input for="estoque" type="text" id="estoque" class="form-control ex-currency" id="estoque" name="estoque" placeholder="Estoque" value>
                                        </div>

                                        <hr>
                                        <div class="container">
                                            <label for="img-produto" class="input-group-text">Esolha a imagem do produto</label>
                                            <div class="input-group mb3">
                                                <input type="file" class="form-control" id="imagem" name="imagem" id="imagem" onchange="previewImagem()" /><br><br>
                                            </div>
                                            <img style="width: 250px; height: 250px;" src="../images/sem_imagem.png" class="rounded mx-auto d-block">
                                            <script src="./js/img.js"></script>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5 form-group">
                                    <input type="hidden" id="criado" name="criado" /><br><br>
                                </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fechar</button>
                            <button type="submit" class="btn btn-outline-success" value="Enviar" name="enviar">Cadastrar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="upimg" tabindex="-1" aria-labelledby="upimgLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="upimgLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="./processar-produto.php" enctype="multipart/form-data">
                                <input type="file" name="imagem" id="imagem">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
<span id="msgAlerta"></span>
<table id="2" class="table table-striped table-hover" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Pre??o</th>
            <th>Pre??o VIP</th>
            <th>Estoque</th>
            <th>Categoria</th>
            <th>VIP</th>
            <th>Adicionado</th>

        </tr>
    </thead>
</table>
</main>

<footer style="text-align:center; background:#343A40;">
    <a href="#" target="_blank">2022 ?? <b>DROPNINJA</b> - Todos os direitos reservados.</a><br>
    <span style="color: #fff">Desenvolvido por <a style="color: #fff" href="#" target="_blank">Drop Ninja</a></span>
    <div class="to-top" style="display: block;"><i class="fa fa-angle-double-up"></i></div>
</footer>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="./js/jquery-3.5.1.js"></script>
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
<script src="./js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="./js/custom-produtos.js"></script>
</body>

</html>