function pendientes(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/pendientes_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".pendientes").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}
function proyectos(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/proyectos_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".viewproyect").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}
function autores(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/autores_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".viewautores").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}

function asesores(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/asesor_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".viewasesor").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}

function user(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/user_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".viewuser").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}

$('#modal-editaut').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    var ape=button.data('ape')
    var ema=button.data('ema')
    var cod=button.data('cod')
    var modal= $(this)
    
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #nomAutor').val(nom)
    modal.find('.modal-body #apeAutor').val(ape)
    modal.find('.modal-body #emaAutor').val(ema)
    modal.find('.modal-body #codAutor').val(cod)
})

$('#modal-editas').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    var ape=button.data('ape')
    var ema=button.data('ema')
    var cod=button.data('cod')
    var modal= $(this)
    
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #nomAutor').val(nom)
    modal.find('.modal-body #apeAutor').val(ape)
    modal.find('.modal-body #emaAutor').val(ema)
    modal.find('.modal-body #codAutor').val(cod)
})

$('#modal-editar-proyecto').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var title=button.data('title')
    var descripcion=button.data('descripcion')
    var link=button.data('link')
    var categoria=button.data('categoria')
    var fecha=button.data('fecha')
    var autor=button.data('autor')
    var dniautor=button.data('dniautor')
    var modal= $(this)
    
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #title').val(title)
    modal.find('.modal-body #descripcion').val(descripcion)
    modal.find('.modal-body #link').val(link)
    modal.find('.modal-body #categoria').val(categoria)
    modal.find('.modal-body #fecha').val(fecha)
    modal.find('.modal-body #autor').val(autor)
    modal.find('.modal-body #dniautor').val(dniautor)
})


$('#modal-activar').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    var modal= $(this)
    
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #nom').val(nom)
})

$('#modal-rechazar').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var id=button.data('id')
    var nom=button.data('nom')
    var modal= $(this)
    
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #nom').val(nom)
})

$("#form_edit_asesor").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_edit_autor")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/edit_asesor.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_autor').html("Enviando datos");
        },
        success:function(datos){
            $('#div_autor').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_autor').html(datos);
                setTimeout("jQuery('#div_autor').hide();",4000); 
            }else{
                $('#"div_autor').html(datos);
                setTimeout("jQuery('#div_autor').hide();",6000); 
            }
        }
    });
})


$("#form_edit_autor").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_edit_autor")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/edit_autor.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_autor').html("Enviando datos");
        },
        success:function(datos){
            $('#div_autor').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_autor').html(datos);
                setTimeout("jQuery('#div_autor').hide();",4000); 
            }else{
                $('#"div_autor').html(datos);
                setTimeout("jQuery('#div_autor').hide();",6000); 
            }
        }
    });
})

$("#form_editar_proyecto").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_editar_proyecto")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/edit_proyect.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_editar_proyecto').html("Enviando datos");
        },
        success:function(datos){
            $('#div_editar_proyecto').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_editar_proyecto').html(datos);
                setTimeout("jQuery('#div_editar_proyecto').hide();",4000); 
            }else{
                $('#div_editar_proyecto').html(datos);
                setTimeout("jQuery('#div_editar_proyecto').hide();",6000); 
            }
        }
    });
})

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

$("#ProyectosUpload").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#ProyectosUpload")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/proyectosUpload.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_proyecto').html("Enviando datos");
        },
        success:function(datos){
            $('#div_proyecto').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_proyecto').html(datos);
                setTimeout("jQuery('#div_proyecto').hide();",4000); 
            }else{
                $('#div_proyecto').html(datos);
                setTimeout("jQuery('#div_proyecto').hide();",6000); 
            }
        }
    });
})

$("#usuariosUpload").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#usuariosUpload")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/usuariosUpload.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_usuarios').html("Enviando datos");
        },
        success:function(datos){
            $('#div_usuarios').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_usuarios').html(datos);
                setTimeout("jQuery('#div_usuarios').hide();",4000); 
            }else{
                $('#div_usuarios').html(datos);
                setTimeout("jQuery('#div_usuarios').hide();",6000); 
            }
        }
    });
})

$("#autoresUpload").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#autoresUpload")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/autoresUpload.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_autor').html("Enviando datos");
        },
        success:function(datos){
            $('#div_autor').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_autor').html(datos);
                setTimeout("jQuery('#div_autor').hide();",4000); 
            }else{
                $('#div_autor').html(datos);
                setTimeout("jQuery('#div_autor').hide();",6000); 
            }
        }
    });
})

$("#asesorUpload").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#asesorUpload")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/asesorUpload.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_asesor').html("Enviando datos");
        },
        success:function(datos){
            $('#div_asesor').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_asesor').html(datos);
                setTimeout("jQuery('#div_asesor').hide();",4000); 
            }else{
                $('#div_asesor').html(datos);
                setTimeout("jQuery('#div_asesor').hide();",6000); 
            }
        }
    });
})

$("#form_categoria").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_categoria")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/categoria.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_categoria').html("Enviando datos");
        },
        success:function(datos){
            $('#div_categoria').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_categoria').html(datos);
                setTimeout("jQuery('#div_categoria').hide();",4000); 
            }else{
                $('#div_categoria').html(datos);
                setTimeout("jQuery('#div_categoria').hide();",6000); 
            }
        }
    });
})

$("#form_calificacion").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_calificacion")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/calificacion.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_calificacion').html("Enviando datos");
        },
        success:function(datos){
            $('#div_calificacion').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_calificacion').html(datos);
                setTimeout("jQuery('#div_calificacion').hide();",4000); 
            }else{
                $('#div_calificacion').html(datos);
                setTimeout("jQuery('#div_calificacion').hide();",6000); 
            }
        }
    });
})

$("#form_activar_cuenta").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_activar_cuenta")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/activar_cuenta.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_activar_cuenta').html("Enviando datos");
        },
        success:function(datos){
            $('#div_activar_cuenta').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_activar_cuenta').html(datos);
                setTimeout("jQuery('#div_activar_cuenta').hide();",4000); 
            }else{
                $('#div_activar_cuenta').html(datos);
                setTimeout("jQuery('#div_activar_cuenta').hide();",6000); 
            }
        }
    });
})