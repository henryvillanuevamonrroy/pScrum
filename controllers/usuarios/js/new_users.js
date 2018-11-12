$(document).ready(function () {

    $.datepicker.setDefaults($.datepicker.regional['es']);
       $("#datepicker").datepicker({
        dateFormat: 'dd/mm/yy',
        firstDay: 1
    }).datepicker("setDate", new Date());

  
    $("#datepicker1").datepicker({
        dateFormat: 'dd/mm/yy',
        firstDay: 1
    }).datepicker("setDate", new Date());
    });