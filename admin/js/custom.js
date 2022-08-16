$(document).ready(function () {
  $('#1').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "./listar-clientes.php",
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
    }
  });
});

const formNewUser = document.getElementById("form-cad-usuario");
const fecharModalCad = new bootstrap.Modal(document.getElementById("cadClienteModal"));
if (formNewUser) {
  formNewUser.addEventListener("submit", async (e) => {
    e.preventDefault();
    const dadosForm = new FormData(formNewUser);
    //console.log(dadosForm);

    const dados = await fetch("./cadastrar-cliente-admin.php", {
      method: "POST",
      body: dadosForm
    })

    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['status']) {
      document.getElementById("msgAlertErroCad").innerHTML = "";
      document.getElementById("msgAlerta").innerHTML = resposta['msg']
      formNewUser.reset();
      fecharModalCad.hide();
      listarDataTables = $('#1').DataTable();
      listarDataTables.draw();
    } else {
      document.getElementById("msgAlertErroCad").innerHTML = resposta['msg'];
    }

  });
};

async function visCliente(id) {
  //console.log("Acessou: " + id);
  const dados = await fetch("visualizar-cliente.php?id=" + id);
  const resposta = await dados.json();
  //console.log(resposta);

  if (resposta['status']) {
    const visModal = new bootstrap.Modal(document.getElementById("visClienteModal"));
    visModal.show();

    document.getElementById("idCliente").innerHTML = resposta['dados'].id;
    document.getElementById("nomeCliente").innerHTML = resposta['dados'].nome;
    document.getElementById("cpfCliente").innerHTML = resposta['dados'].cpf;
    document.getElementById("celularCliente").innerHTML = resposta['dados'].celular;
    document.getElementById("emailCliente").innerHTML = resposta['dados'].email;
    document.getElementById("senhaCliente").innerHTML = resposta['dados'].senha;


    document.getElementById("msgAlerta").innerHTML = "";

  } else {
    document.getElementById("msgAlerta").innerHTML = resposta['msg'];
  }

}

const editModal = new bootstrap.Modal(document.getElementById("editClienteModal"))

async function editCliente(id) {
  //console.log("Editar: " + id);

  const dados = await fetch('visualizar-cliente.php?id=' + id);
  const resposta = await dados.json();
  //console.log(resposta);
  if (resposta['status']) {
    document.getElementById("msgAlertErroEdit").innerHTML = "";

    document.getElementById("msgAlerta").innerHTML = "";
    editModal.show();

    document.getElementById("editid").value = resposta['dados'].id;
    document.getElementById("editNome").value = resposta['dados'].nome;
    document.getElementById("editCPF").value = resposta['dados'].cpf;
    document.getElementById("editCelular").value = resposta['dados'].celular;
    document.getElementById("editEmail").value = resposta['dados'].email;
    document.getElementById("editSenha").value = resposta['dados'].senha;
  } else {
    document.getElementById("msgAlerta").innerHTML = resposta['msg'];
  }
}
const formEditCliente = document.getElementById("form-edit-usuario");
if (formEditCliente) {
  formEditCliente.addEventListener("submit", async (e) => {
    e.preventDefault();
    const dadosForm = new FormData(formEditCliente);

    const dados = await fetch("editar-cliente.php", {
      method: "POST",
      body: dadosForm

    });

    const resposta = await dados.json();

    if (resposta['status']) {
      // Manter a janela modal aberta
      //document.getElementById("msgAlertErroEdit").innerHTML = resposta['msg'];

      //Fechar a janela modal
      document.getElementById("msgAlerta").innerHTML = resposta['msg'];
      document.getElementById("msgAlertErroEdit").innerHTML = "";
      // Limpar o formulario
      formEditCliente.reset();
      editModal.hide();

      listarDataTables = $('#1').DataTable();
      listarDataTables.draw();

    } else {
      document.getElementById("msgAlertErroEdit").innerHTML = resposta['msg'];
    }
  });
}

async function apagarCliente(id) {
  //console.log("Acessou: " + id);

  var confirmar = confirm("Tem certeza que deseja excluir os dados do cliente?");

  if (confirmar) {


    const dados = await fetch('apagar-cliente.php?id=' + id);
    const resposta = await dados.json();

    //console.log(resposta);

    if (resposta['status']) {
      document.getElementById("msgAlerta").innerHTML = resposta['msg'];

      listarDataTables = $('#1').DataTable();
      listarDataTables.draw();

    } else {
      document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
  }
}