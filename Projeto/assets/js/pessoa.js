/**
 * Created by Usuario on 01/11/2016.
 */
$(document).ready(function () {
    $("#form").submit(function (event) {

        var nome = document.getElementById("nome").value;
        var cpf = document.getElementById("cpf").value;
        var rg = document.getElementById("rg").value;
        var cep = document.getElementById("cep").value;
        var endereco = document.getElementById("endereco").value;
        var email  = document.getElementById("email").value;
        var cidade = document.getElementById("cidade").value;
        var telefone = document.getElementById("telefone").value;
        var celular = document.getElementById("celular").value;
        var datanascimento = document.getElementById("datanascimento").value;
        var matricula = document.getElementById("matricula").value;

        var errors = "";
        if(nome == ""){
            errors += "<p>Nome não informado. Campo obrigatório!</p>";
        }
        if(cpf == ""){
            errors += "<p>CPF não informado. Campo obrigatório!</p>";
        }
        if(rg == ""){
            errors += "<p>RG não informado. Campo obrigatório!</p>";
        }
        if(cep == ""){
            errors += "<p>CPF não informado. Campo obrigatório!</p>";
        }
        if(endereco == ""){
            errors += "<p>Endereço não informado. Campo obrigatório!</p>";
        }
        if(email == ""){
            errors += "<p>Email não informado. Campo obrigatório!</p>";
        }
        if(cidade == ""){
            errors += "<p>Cidade não informado. Campo obrigatório!</p>";
        }
        if(telefone == ""){
            errors += "<p>Telefone não informado. Campo obrigatório!</p>";
        }
        if(celular == ""){
            errors += "<p>Celular não informado. Campo obrigatório!</p>";
        }
        if(datanascimento == ""){
            errors += "<p>CPF não informado. Campo obrigatório!</p>";
        }
        if(matricula == ""){
            errors += "<p>Matricula não foi informada. Campo obrigatório!</p>";
        }

        if (errors != "") {
            document.getElementById("erros").innerHTML = "<h2>Erros:</h2>" + errors;
            $("#erros").fadeIn(1000);
            setTimeout(function () {
                $("#erros").fadeOut(1000);
            }, 5000);
            window.location.hash = "#topo";
            limparCampos();
            document.getElementById("nome").focus();
            return false;

        } else {
            $(this).submit();
        }


    });
});

function limparCampos(){
    var nome = document.getElementById("nome").value = "";
    var cpf = document.getElementById("cpf").value = "";
    var rg = document.getElementById("rg").value = "";
    var cep = document.getElementById("cep").value = "";
    var endereco = document.getElementById("endereco").value = "";
    var email  = document.getElementById("email").value = "";
    var cidade = document.getElementById("cidade").value = "";
    var telefone = document.getElementById("telefone").value = "";
    var celular = document.getElementById("celular").value = "";
    var datanascimento = document.getElementById("datanascimento").value = "";
    var matricula = document.getElementById("matricula").value = "";
}



