
$(document).ready(function () {

$(".borrarUsuario").on("click",function(){
  var idusuario = $(this).closest("tr").find("td[data-title='ID:']").text().trim();
  window.location.href = "../includes/delete_user.php?id=" + idusuario;
});

$(".updateUsuario").on("click", function() {
  var idusuario = $(this).closest("tr").find("td[data-title='ID:']").text().trim();
  window.location.href = "../includes/update_user.php?id=" + idusuario;
});

$(".borrarAlimentoBD").on("click",function(){
  var idalimento = $(this).closest("tr").find("td[data-title='iDAlimento:']").text().trim();
  window.location.href = "../includes/delete_alimento.php?id=" + idalimento;
});

$(".borrarsolicitud").on("click",function(){
  var idalimento = $(this).closest("tr").find("td[data-title='Alimento:']").text().trim();
  window.location.href = "../includes/delete_solicitud.php?id=" + idalimento;
});

$(".aceptarsolicitud").on("click",function(){
  var idalimento = $(this).closest("tr").find("td[data-title='Alimento:']").text().trim();
  window.location.href = "../includes/aceptar_solicitud.php?id=" + idalimento;
});


$(".nuevaComida").on("click",function(){
  window.location.href = "../pages/nuevaComida.php";
});

$(".updateAlimentoBD").on("click", function() {
  var idalimento = $(this).closest("tr").find("td[data-title='iDAlimento:']").text().trim();
  window.location.href = "../pages/update_alimento.php?id=" + idalimento;
});

$(".addUserAdmin").on("click",function(){
  window.location.href = "../Pages/addUserAdmin.php";
});

$(".addFoodAdmin").on("click",function(){
  window.location.href = "../Pages/addFoodAdmin.php";
});


  $(".info_alimento").on("click", function () {
    var idalimento = $(this).closest("tr").find(".d-none").text();
    var calorias = $(this).closest("tr").find("td[data-title='Información:']").find("p:contains('kcal')").text().trim();
    calorias = calorias.replace(/[^\d.]/g, "");

    var proteinas = $(this).closest("tr").find("td[data-title='Información:']").find("p:contains('P:')").text().trim();
    proteinas = proteinas.replace(/[^\d.]/g, "");

    var grasas = $(this).closest("tr").find("td[data-title='Información:']").find("p:contains('G:')").text().trim();
    grasas = grasas.replace(/[^\d.]/g, "");

    var carbohidratos = $(this).closest("tr").find("td[data-title='Información:']").find("p:contains('C:')").text().trim();
    carbohidratos = carbohidratos.replace(/[^\d.]/g, "");

    var cantidad = $(this).closest("tr").find("td[data-title='Cantidad:']").text().trim();
    // Elimina el texto no deseado y deja solo el valor numérico
    cantidad = cantidad.replace(/[^\d.]/, " ");
    window.location.href = "../Pages/infoalimento.php?id=" + idalimento + "&cantidad=" + cantidad + "&calorias=" + calorias + "&proteinas=" + proteinas + "&grasas=" + grasas + "&carbihidratos=" + carbohidratos ;
  });

  $(".preventD").on("click", function(){
    event.preventDefault();

  });

  $(".aprobar").on("click",function(){
    window.location.href= "../pages/aprobarAlimentos.php";
  });

  $(".diaanterior").on("click", function() {

    window.location.href = "../pages/diaanterior.php";
  });

  $(".diasiguiente").on("click", function() {

    window.location.href = "../pages/diasiguiente.php";
  });

  $(".cambiarfecha").on("click", function() {
    var dia = $("#selectDia").val();
    var mes = $("#selectMes").val();
    var year = $("#selectAnio").val();
  
    window.location.href = "../pages/cambiarfecha.php?dia=" + dia + "&mes=" + mes + "&year=" + year;
  });


  $(".addAlimentoComida").on("click", function() {
    var numcomida = $(this).data("numcomida");
    window.location.href = "../pages/agregarAlimento.php?numcomida=" + numcomida;
  });

  $(".crearAlimento").on("click",function(){
    window.location.href = "../Pages/crearAlimento.php";
  });


});
