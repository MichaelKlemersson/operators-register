;$(function () {
    var $operatorsTable = $('#operators-table');
    var $operatorForm = $('#operator-form');
    var operators = [];

    var fetchOperators = function(response) {
        if (response.operators !== undefined && response.operators.length) {
            $operatorsTable.find('tbody').html('');
            operators = response.operators;
            var rows = [];
            operators.forEach(function (item) {
                rows.push(
                    $('<tr/>', { 'id': 'operator-row-' + item.codigo }).append(
                        $('<td/>', { 'text': item.codigo, 'class': 'text-center' })
                    ).append(
                        $('<td/>', { 'text': item.nome })
                    ).append(
                        $('<td/>', { 'text': item.email })
                    )
                );
            });
            $operatorsTable.find('tbody').append(rows);
        }
    };    

    $('#save-form').on('click', function () {
        var $button = $(this);
        $operatorForm.find('.alert').addClass('hidden');
        $button.prop('disabled', true);
        $.post('/operador', $operatorForm.serialize(), function (response) {
            $button.prop('disabled', false);
            $('#register-operator').modal('hide');
            $.get('/operador', fetchOperators);
        }).fail(function (err) {
            if (err.responseJSON.error !== undefined) {
                $operatorForm.find('.alert').addClass('alert-danger').removeClass('hidden');
                $operatorForm.find('.alert').text(err.responseJSON.error);
            }
            $button.prop('disabled', false);
        });
    });

    $('#register-operator').on('hidden.bs.modal', function () {
        $operatorForm.find('.alert').addClass('hidden');
        $operatorForm.trigger('reset');
    });

    $.get('/operador', fetchOperators);
});