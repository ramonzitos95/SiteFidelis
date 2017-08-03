/**
 * Created by Usuario on 01/11/2016.
 */
$(document).ready(function () {
    $("#form").submit(function (event) {

        var disciplinanome = document.getElementById("nome").value;
        var professor = document.getElementById("professor").value;
        var cargahoraria = document.getElementById("cargahoraria").value;
        var datacadastro = document.getElementById("datacadastro").value;
        //var conceito = document.getElementsByName("conceito").value;
        //var ementa = document.getElementsByName("ementa").value;
        var datainicio = document.getElementsByName("datainicio").value;
        //var universidade = document.getElementsByName("universidade").value;
        //var modalidade = document.getElementsByName("modalidade").value;
        var errors = "";
        if(disciplinanome == ""){
            errors += "<p>Nome da Disciplina não informado. Campo obrigatório!</p>";
        }
        if(professor == ""){
            errors += "<p>Professor não informado. Campo obrigatório!</p>";
        }
        if(cargahoraria == ""){
            errors += "<p>Carga Horária não informada. Campo obrigatório!</p>";
        }
            else if(cargahoraria != parseInt(cargahoraria)){
                errors += "<p>Carga Horária deve ser um valor inteiro.</p>";
            }
        if(datacadastro == ""){
            errors += "<p>Data de Cadastro não pode ser vazia.</p>";
        }
        if(datainicio == ""){
            errors += "<p>Data Inicial não pode ser vazia.</p>";
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
    document.getElementById("nome").value = "";
    document.getElementById("professor").value = "";
    document.getElementById("cargahoraria").value = "";
    document.getElementById("datacadastro").value = "";
    document.getElementsByName("conceito").value = "";
    document.getElementsByName("ementa").value = "";
    document.getElementsByName("datainicio").value = "";
    document.getElementsByName("universidade").value = "";
    document.getElementsByName("modalidade").value = "";
}



