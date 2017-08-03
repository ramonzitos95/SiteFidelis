/**
 * Created by Usuario on 01/11/2016.
 */
$(document).ready(function () {
    $("#form").submit(function (event) {
        //console.log(event.preventDefault());
        var turmanome = document.getElementById("turmanome").value;
        var errors = "";
        if(turmanome == ""){
            errors += "<p>Favor informar uma turma. Campo Obrigatório!</p>"
        }
        if (errors != "") {
            document.getElementById("erros").innerHTML = "<h2>Erros:</h2>" + errors;
            $("#erros").fadeIn(1000);
            setTimeout(function () {
                $("#erros").fadeOut(1000);
            }, 5000);
            window.location.hash = "#topo";
            limparCampos();
            document.getElementById("turmanome").focus();
            return false;
        } else {
            $(this).submit();
        }


    });
});

function limparCampos(){
    document.getElementById("turmanome").value = "";
}



