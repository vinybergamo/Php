$(document).ready(function () {
  $('#2').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "./listar-produtos.php",
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
    }
  });
});

/*const formNewUser = document.getElementById("form-cad-produto");
const fecharModalCad = new bootstrap.Modal(document.getElementById("cadProdutoModal"));
if (formNewUser) {
  formNewUser.addEventListener("submit", async (e) => {
    e.preventDefault();
    const dadosForm = new FormData(formNewUser)
    console.log(dadosForm);

    const dados = await fetch("cadastrar-produto.php", {
      method: "POST",
      body: dadosForm
    });
    //console.log(dados);

    const resposta = await dados.json();

    //console.log(resposta);

    if (resposta['status']) {
      document.getElementById("msgAlertErroCad").innerHTML = "";
      document.getElementById('msgAlerta').innerHTML = resposta['msg'];
      formNewUser.reset();
      fecharModalCad.hide();
      listarDataTables = $('#2').DataTable();
      listarDataTables.draw();
    } else {
      document.getElementById("msgAlertErroCad").innerHTML = resposta['msg'];
    }
  });
}*/
