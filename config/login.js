$("#login_php").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#login_php")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"config/PHP_login.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_login').html("Enviando datos del login");
        },
        success:function(datos){
            $('#div_login').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_login').html(datos);
                setTimeout("jQuery('#div_login').hide();",4000); 
            }else{
                $('#div_login').html(datos);
                setTimeout("jQuery('#div_login').hide();",6000); 
            }
        }
    });
})

$("#login_admin").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#login_admin")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"config/PHP_login_admin.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_login_admin').html("Enviando datos del login");
        },
        success:function(datos){
            $('#div_login_admin').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_login_admin').html(datos);
                setTimeout("jQuery('#div_login_admin').hide();",4000); 
            }else{
                $('#div_login_admin').html(datos);
                setTimeout("jQuery('#div_login_admin').hide();",6000); 
            }
        }
    });
})

$("#register").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#register")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"config/register.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_register').html("Enviando datos del login");
        },
        success:function(datos){
            $('#div_register').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_register').html(datos);
                setTimeout("jQuery('#div_register').hide();",4000); 
            }else{
                $('#div_register').html(datos);
                setTimeout("jQuery('#div_register').hide();",6000); 
            }
        }
    });
})