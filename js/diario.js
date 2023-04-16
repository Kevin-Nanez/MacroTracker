
$(document).ready(function () {

    $('#abrirCalendario').on('click', function (event) {
        event.preventDefault();
        $('#calendarioModal').modal('show');   
        
    });

    $('#cerrarCalendario').on('click', function (event) {
        event.preventDefault();
        $('#calendarioModal').modal('hide');   
    });

    $('#calendarioModal').on('click', function(event) {
        event.stopPropagation();
      });

});




