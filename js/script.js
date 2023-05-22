
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

$(".updateAlimentoBD").on("click", function() {
  var idalimento = $(this).closest("tr").find("td[data-title='iDAlimento:']").text().trim();
  window.location.href = "../includes/update_alimento.php?id=" + idalimento;
});

$(".addUserAdmin").on("click",function(){
  window.location.href = "../Pages/addUserAdmin.php";
});

$(".addFoodAdmin").on("click",function(){
  window.location.href = "../Pages/addFoodAdmin.php";
});


  $(".info_alimento").on("click", function () {
    event.preventDefault();

    window.location.href = "../Pages/infoalimento.html";
  });

  $(".preventD").on("click", function(){
    event.preventDefault();

  })








  


});
