
$(document).ready(function () {
  // redirigir a diario cuando se de click en un boton
  $(".redirigirDiario").on("click", function () {
    event.preventDefault();
    window.location.href = "../Pages/diario.html";
  });
  // redirigir a iniciar sesion cuando se de click en un boton
  $(".redirigirLogin").on("click", function () {
    event.preventDefault();
    window.location.href = "../Pages/login.html";
  });
  $(".redirigirAgregar").on("click", function () {
    event.preventDefault();
    window.location.href = "../Pages/agregaraAlimento.html";
  });

  $(".redirigirCrearar").on("click", function () {
    event.preventDefault();

    window.location.href = "../Pages/crearAlimento.html";
  });

  $(".redirigirNoticias").on("click", function () {
    event.preventDefault();

    window.location.href = "../Pages/noticias.html";
  });

  $(".info_alimento").on("click", function () {
    event.preventDefault();

    window.location.href = "../Pages/infoalimento.html";
  });




  //enviar info crear alimento
  $('#formularioCrearAlimento').submit(function (event) {
    event.preventDefault(); // Evita que se envíe el formulario automáticamente

    // Verifica que todos los campos tengan un valor
    var camposVacios = false;
    $(this).find('input[type!="submit"],textarea').each(function () {
      if ($(this).val() === '') {
        camposVacios = true;
        return false; // Sale del bucle si encuentra un campo vacío
      }
    });

    // Si hay algún campo vacío, muestra un mensaje de error
    if (camposVacios) {
      alert('Por favor, completa todos los campos antes de enviar el formulario');
      return;
    } else {
      setTimeout(() => {
        window.location.href = "../Pages/crearAlimento.html";
      }
        , 1000)
    }


    // Si llegamos hasta aquí, significa que todos los campos tienen un valor
    // Puedes enviar el formulario usando AJAX, por ejemplo:
    // var formData = $(this).serialize();
    //$.post($(this).attr('action'), formData, function(response) {
    // Procesa la respuesta del servidor aquí
    //});
  });



  


});
