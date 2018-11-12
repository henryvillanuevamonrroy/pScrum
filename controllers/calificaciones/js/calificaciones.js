var manageProductTable;

//funcion para filtrar los select
function myPillFiltertipo(col, id) {
    var data = document.getElementById(id).value;
    manageProductTable.columns(col).search(data).draw();

}
function myPillFiltercurso(col, id) {
    var data = document.getElementById(id).value;
    manageProductTable.columns(col).search(data).draw();

}

$(document).ready(function () {

    manageProductTable = $('#manageProductTable').DataTable({
        dom: 'Blrtip',
        'ajax': '../../controllers/calificaciones/fetchCalificaciones.php',
        "buttons": [
            {extend: 'excel',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
                filename: 'Pruebas'
            }
        ]

    });

    $("#borrarFiltro").click(function () {
        location.reload();
    });


}); // document.ready fucntion


//funcion editar producto
function editClasificacion(userId = null) {
    if (userId) {
        $("#userId").remove();
        // remove text-error 
        $(".text-danger").remove();
        // remove from-group error
        $(".form-group").removeClass('has-error').removeClass('has-success');
        // modal spinner
        $('.div-loading').removeClass('div-hide');
        // modal div
        $('.div-result').addClass('div-hide');

        $.ajax({
            url: '../../controllers/usuarios/fetchSelectedUser.php',
            type: 'post',
            data: {userId: userId},
            dataType: 'json',
            success: function (response) {
                // modal spinner
                $('.div-loading').addClass('div-hide');
                // modal div
                $('.div-result').removeClass('div-hide');
                // footer
                $(".editUserFooter").append('<input type="hidden" name="userId" id="userId" value="' + response.id + '" />');
                $("#editRol").val(response.rol);
                $("#editCelular").val(response.celular);
                $("#editTelefono").val(response.telefono);
                $("#editDNI").val(response.dni);
                $("#editDireccion").val(response.direccion);
                $("#editName").val(response.nombres);
                $("#editApellido").val(response.apellidos);

                $("#editStatus").val(response.situacion);
                $("#editCorreo").val(response.email);


                $("#editUserForm").on('submit').bind('submit', function () {
                    $('#edit-user-messages').empty();
                    $("#editUserBtn").button('reset');
                    var form = $(this);
                    var formData = new FormData(this);

                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: formData,
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            console.log(response);
                            $("#edit-user-messages").html('<div class="alert alert-success">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                    '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function () {
                                $(this).delay(3000).hide(10, function () {
                                    $(this).remove();
                                });
                            }); // /.alert

                            manageProductTable.ajax.reload(null, true);
                        } // /success function
                    }); // /ajax function

                    return false;
                }); // update the product data functio
            } // /success function
        }); // /ajax to fetch product image


    } else {
        alert('error please refresh the page');
}
} // /edit product function

function preguntarSiNoCurso(id){
	alertify.confirm('Eliminar prueba', '¿Esta seguro de eliminar esta prueba?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}



function eliminarDatos(id){
   
                cadena="id=" + id;
                

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
				location.reload();
                            }else{
				location.reload();}
			}
		}); 

}

