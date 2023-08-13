$("#form_perfil").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_perfil")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/perfil_update.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_perfil').html("Enviando datos");
        },
        success:function(datos){
            $('#div_perfil').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_perfil').html(datos);
                setTimeout("jQuery('#div_perfil').hide();",4000); 
            }else{
                $('#div_perfil').html(datos);
                setTimeout("jQuery('#div_perfil').hide();",6000); 
            }
        }
    });
})

$("#upload-photo").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#upload-photo")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/avatar_update.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_avatar').html("Enviando datos");
        },
        success:function(datos){
            $('#div_avatar').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_avatar').html(datos);
                setTimeout("jQuery('#div_avatar').hide();",4000); 
            }else{
                $('#div_avatar').html(datos);
                setTimeout("jQuery('#div_avatar').hide();",6000); 
            }
        }
    });
})

$(document).ready(function() {
    // Escuchamos el evento 'input' del campo de búsqueda
    $('#buscarCategoria').on('input', function() {
      var categoria = $(this).val(); // Obtenemos el valor del campo de búsqueda

      // Realizamos la petición AJAX al archivo buscar_proyectos.php
      $.ajax({
        url: 'query/search_proyectos.php',
        method: 'POST',
        data: { categoria: categoria }, // Enviamos el valor del campo de búsqueda
        success: function(data) {
          // Actualizamos la sección de contenido con los resultados recibidos
          $('.proyectos-container').html(data);
        }
      });
    });
  });