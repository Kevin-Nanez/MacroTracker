
$(document).ready(function () {

    $('#abrirCalendario').on('click', function (event) {
        event.preventDefault();
        $('#calendarioModal').modal('show');   
        $('#calendarioModal').modal({backdrop: 'static', keyboard: false});

    });

    $('#cerrarCalendario').on('click', function (event) {
        event.preventDefault();
        $('#calendarioModal').modal('hide');   
    });

    $('#calendarioModal').on('click', function(event) {
        event.stopPropagation();
      });

});




