$('#cep').change(function (e) {
    e.preventDefault();

    $('#endereco').val('');
    //$('#bairro').val(data.bairro);
    $('#cidade').val('');
    $('#estado').val('');

    var cep = $('#cep').val();


    $.getJSON('http://viacep.com.br/ws/' + cep + '/json/', {}, function (data) {

        if (data.erro == true)
        {
            alert('CEP não encontrado...');
            $('#cep').focus();
            $('#cep').val("");
        } else
        {
            $('#cep').val(data.cep);
            $('#endereco').val(data.logradouro);
            //$('#bairro').val(data.bairro);
            $('#cidade').val(data.localidade);
            $('#estado').val(data.uf);
            //$('#ds_complemento').val(data.complemento);
            //console.log(data);
        }
    });
});