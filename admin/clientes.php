<?php
include_once './conexao-clientes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="produtos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="../css/painel.css" />
  <title>Clientes - DropNinja</title>
</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="./painel-admin.php">DropNinja</a>
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
            <a href="./painel-admin.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-speedometer2"></i></span>
              <span>Painel</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
              Configuração
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
              <span class="me-2"><i class="bi bi-layout-split"></i></span>
              <span>Configurações</span>
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
        <h1>Clientes</h1>

        <!-- Button trigger modal -->
        <div>
          <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#cadClienteModal">
            Cadastrar Novo Cliente
          </button>
        </div>

      </div>

      <span id="msgAlerta"></span>

      <table id="1" class="table table-striped table-hover table-responsive" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Data do cadastro</th>
            <th>Ações</th>
          </tr>
        </thead>
      </table>
    </div>

<!-- Visualizar Modal -->
    <div class="modal fade" id="visClienteModal" tabindex="-1" aria-labelledby="visClienteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="visClienteModalLabel">Detalhes do Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <dl class="row">
              <dt class="col-sm-3">ID:</dt>
              <dd class="col-sm-9"><span id="idCliente"></span></dd>
              
              <dt class="col-sm-3">Nome:</dt>
              <dd class="col-sm-9"><span id="nomeCliente"></span></dd>

              <dt class="col-sm-3">CPF:</dt>
              <dd class="col-sm-9"><span id="cpfCliente"></span></dd>

              <dt class="col-sm-3">Celular:</dt>
              <dd class="col-sm-9"><span id="celularCliente"></span></dd>

              <dt class="col-sm-3">Email:</dt>
              <dd class="col-sm-9"><span id="emailCliente"></span></dd>

              <dt class="col-sm-3">Senha:</dt>
              <dd class="col-sm-9"><span id="senhaCliente"></span></dd>

            </dl>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fechar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

<!-- Cadastrar Modal -->
    <div class="modal fade" id="cadClienteModal" tabindex="-1" aria-labelledby="cadClienteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cadClienteModalLabel">Cadastrar Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span id="msgAlertErroCad"></span>
            <form method="POST" id="form-cad-usuario">
              <div class="container-fluid">
                <div class="row">

                  <div class="col-sm-6 form-group">
                    <input type="text" name="nome" class="form-control" id="cadInputNome" aria-describedby="nomedocliente" placeholder="Nome do Cliente">
                  </div>

                  <div class="col-sm-6 form-group">
                    <input type="text" name="cpf" class="form-control" id="cadInputCPF" aria-describedby="cpfdocliente" placeholder="cpf do cliente">
                  </div>

                  <div class="col-sm-6 form-group">
                    <input type="text" name="celular" class="form-control" id="cadInputCelular" aria-describedby="celulardocliente" placeholder="Celular do cliente">
                  </div>

                  <div class="col-sm-6 form-group">
                    <input type="email" name="email" class="form-control" id="cadInputEmail" aria-describedby="emaildocliente" placeholder="Email do Cliente">
                  </div>

                  <div class="form-group">
                    <input type="text" name="senha" class="form-control" id="cadInputSenha" aria-describedby="senhadocliente" placeholder="Senha para o Cliente">
                  </div>

                  <div class="form-group">
                    <label>Este Cliente é VIP?</label>
                    <select for="selectVIP" name="selectVIP" class="form-control">
                      <option value="">Selecione a opção</option>
                      <option value="Não">Não</option>
                      <option value="Sim">Sim</option>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fechar</button>
            <button type="submit" class="btn btn-outline-success" value="Cadastrar">Cadastrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Editar Cliente Modal -->
    <div class="modal fade" id="editClienteModal" tabindex="-1" aria-labelledby="editClienteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editClienteModalLabel">Editar Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span id="msgAlertErroEdit"></span>
            <form method="POST" id="form-edit-usuario">
              <input type="hidden" name="id" id="editid">
              <div class="container-fluid">
                <div class="row">

                  <div class="col-sm-6 form-group">
                    <input type="text" name="nome" class="form-control" id="editNome" aria-describedby="nomedocliente" placeholder="Nome do Cliente">
                  </div>

                  <div class="col-sm-6 form-group">
                    <input type="text" name="cpf" class="form-control" id="editCPF" aria-describedby="cpfdocliente" placeholder="cpf do cliente">
                  </div>

                  <div class="col-sm-6 form-group">
                    <input type="text" name="celular" class="form-control" id="editCelular" aria-describedby="celulardocliente" placeholder="Celular do cliente">
                  </div>

                  <div class="col-sm-6 form-group">
                    <input type="email" name="email" class="form-control" id="editEmail" aria-describedby="emaildocliente" placeholder="Email do Cliente">
                  </div>

                  <div class="form-group">
                    <input type="text" name="senha" class="form-control" id="editSenha" aria-describedby="senhadocliente" placeholder="Senha para o Cliente">
                  </div>

                  <div class="form-group">
                    <label>Este Cliente é VIP?</label>
                    <select for="selectVIP" name="vip" class="form-control">
                      <option value="">Selecione a opção</option>
                      <option value="Não">Não</option>
                      <option value="Sim">Sim</option>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fechar</button>
            <button type="submit" class="btn btn-outline-warning" value="Cadastrar">Salvar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  </main>
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
  <script src="./js/custom.js"></script>
</body>

</html>