<?php
include_once '../config/conexao-vitrine.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
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
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="../painel.php">DropNinja</a>
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
            <a href="../painel.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-speedometer2"></i></span>
              <span>Painel</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
              Compras
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
              <span class="me-2"><i class="bi bi-layout-split"></i></span>
              <span>Produtos</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="./todos.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Todos</span>

                <li>
                  <a href="#" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Produto 2</span>
                  </a>
                </li>

                </a>
          </li>
        </ul>
    </div>
    </li>
    <li>
      <a href="" class="nav-link px-3">
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
    <div class="container">


      <h1 class="display-4 mt-5 mv-5">Produtos</h1>

      <?php

      $query_produtos = "SELECT id, nome, descricao, preco, precovip, estoque, estoque, vip, images, categoria FROM produtos ORDER BY id DESC";
      $resultado_produtos = $conn->prepare($query_produtos);
      $resultado_produtos->execute();

      ?>

      <div class="row row-cols-1 row-cols-md-3">
        <?php
        while ($row_product = $resultado_produtos->fetch(PDO::FETCH_ASSOC)) {
          extract($row_product);
          //echo "<img src='./images/products/$image'><br>";
          //echo "ID: $id<br>";
          //echo "Nome do produto: $name<br>";
          //echo "Preço: ". number_format($price, 2, ",", ".");"<br>";
          //echo "<hr>";

        ?>
          <div class="col">
            <div class="card">
              <img src='<?php echo "../images/produtos/$id/$images"; ?>' class="card-img-top" alt="..." style="width: 300px; height: 300px;">
              <div class="card-body">
                <hr>
                </hr>
                <div class="card-body">
                  <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $nome; ?><a class="text-info verproduto" href="<button type=" button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $id; ?>"><i class="fa  fa-eye" aria-hidden="true"></i></a> </h5>
                    <div class="btn" style="margin-left: 30px">
                      <div class="input-group input-group-sm text-center">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="input-group-addon text-center"><i class="fa fa-dropbox" style="height: 38px; width: 30px;"></i></div>
                          <input type="number" class="form-control" placeholder="10" id="prod_253" value="1" min="1" style="width:100%;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-around align-items-center">

                  <a href="../checkout.php?id=<?php echo $id; ?>" type="button" class="btn btn-primary" style="!important;width:45% !important;">
                  Comprar<br>
                  R$ <?php echo number_format($preco, 2, ",", "."); ?></a>

                  <button type=" button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="!important;width:45% !important; <?php echo $id; ?> ">
                    Comprar VIP<br>
                    R$ <?php echo number_format($precovip, 2, ",", "."); ?></button>
                </div>
                <div>

                  <!-- DetalhesModalInicio -->
                  <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header ibox ibox-primary bg-primary text-white">
                          <h5 class="modal-title" id="modalVerProdutosTitle">
                            <b>Dados do Produto</b><br>
                            <span>Visualização Detalhada do Produto</span>
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="/meus-pedidos" method="post">
                            <div class="ibox ibox-info">
                              <div class="ibox-head">
                                <div class="ibox-title bg-primary text-white">Detalhes do Pedido do pedido</div>
                              </div>
                              <div class="ibox-body">
                                <div class="row">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <center><a href="<?php echo "../images/produtos/$id/$images"; ?>" download="" target="_blank"><img style="width: 300px; height: 300px;" class="card-img-top img-responsive" src="<?php echo "../images/produtos/$id/$images"; ?>"></a></center>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="col-sm-12 form-group">
                                        <label><b>Produto</b></label>
                                        <p class="form-control-static"><?php echo $nome; ?></p>
                                      </div>
                                      <div class="col-sm-12 form-group">
                                        <label><b>Valor Únitário</b></label>
                                        <p class="form-control-static">R$ <?php echo number_format($preco, 2, ",", "."); ?></p>
                                      </div>
                                      <div class="col-sm-12 form-group">
                                        <label><b>Valor Únitário VIP</b></label>
                                        <p class="form-control-static">R$ <?php echo number_format($precovip, 2, ",", "."); ?></p>
                                      </div>
                                      <div class="col-sm-12 form-group">
                                        <label><b>Estoque</b></label>
                                        <p class="form-control-static"><?php echo $estoque; ?></p>
                                      </div>
                                      <div class="col-sm-12 form-group">
                                        <label><b>Categoria</b></label>
                                        <p class="form-control-static"><?php echo $categoria; ?></p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <!-- Scrollable modal -->
                                    <div class="modal-dialog modal-dialog-scrollable">
                                      <div class="modal-content">
                                        <div class="col-sm-12 form-group">
                                          <label><b>Descrição do produto</b></label>
                                          <p class="form-control-static"><?php echo $descricao ?></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                          <!-- <button type="button" class="btn btn-primary">Fazer Pedido</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- DetalhesModalFim -->
              </div>
            </div>
          </div>
      </div <?php
          }
            ?> </div>
  </main>
  <script src="../config/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="../config/js/jquery-3.5.1.js"></script>
  <script src="../config/js/jquery.dataTables.min.js"></script>
  <script src="../config/js/dataTables.bootstrap5.min.js"></script>
  <script src="../config/js/script.js"></script>
  <script src="https://kit.fontawesome.com/7ef811f810.js" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>