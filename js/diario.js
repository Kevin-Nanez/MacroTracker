
$(document).ready(function () {

   $("#openModal").on("click", function (){
    event.preventDefault();
    modal.style.display = "block";
   });

   $(".cerrarModal").on("click",function(){
    event.preventDefault();
    modal.style.display = "none";
   });

   $("#buscarFecha").on("click",function(){
    event.preventDefault();
    modal.style.display = "none";
    var day = $('#selectDia').val();
    var month = $('#selectMes').val();
    var year = $('#selectAnio').val();
   });

  // Function to check if year is leap year
  function isLeapYear(year) {
    return year % 4 == 0 && year % 100 != 0 || year % 400 == 0;
  }

  // Function to generate options for days based on month and year
  function generateDays(month, year) {
    var daysInMonth = new Date(year, month, 0).getDate();
    var options = '';
    for (var i = 1; i <= daysInMonth; i++) {
      options += '<option value="' + i + '">' + i + '</option>';
    }
    $('#selectDia').html(options);
  }

  function generateDays() {
    var month = $('#selectMes').val();
    var year = $('#selectAnio').val();
    var days = new Date(year, month, 0).getDate();

    if (month == '02' && isLeapYear(year)) {
      days = 29;
    }


    $('#selectDia').empty().append($('<option>', {
      value: '',
      text: 'Día'
    }));

    
    for (var i = 1; i <= days; i++) {
      $('#selectDia').append($('<option>', {
        value: i,
        text: i
      }));
    }

    // Reset day select value if 29th of Feb in a leap year was selected
    if (month == '02' && $('#selectDia').val() == '29' && !isLeapYear(year)) {
      $('#selectDia').val('');
    }
  }

  // Function to check if a year is a leap year
  function isLeapYear(year) {
    return (year % 4 == 0 && year % 100 != 0) || (year % 400 == 0);
  }

  // Generate initial days based on default month and year values
  generateDays();

  // Add event listeners to month and year selects to generate days on change
  $('#selectMes, #selectAnio').on('change', function() {
    generateDays();
  });
  
  // Add event listener to day select to check if 29th of Feb was selected and reset if necessary
  $('#selectDia').on('change', function() {
    var month = $('#selectMes').val();
    var year = $('#selectAnio').val();

    if (month == '02' && $('#selectDia').val() == '29' && !isLeapYear(year)) {
      alert('El año seleccionado no es bisiesto. Por favor seleccione otro día.');
      $('#selectDia').val('');
    }
  });




});




