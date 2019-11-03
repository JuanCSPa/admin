   function saveRegistro(){
      var formData = new FormData($("#contactoForm")[0]);
     if(formData.get('nombre') == ""){
       $("#msgBox").html( msgError( 'Ingrese Nombre', '<i class="fa fa-code"></i> Ups! ' ) );
       $("#nombre").focus();
     }else if(formData.get('email') == ""){
       $("#msgBox").html( msgError( 'Ingrese Correo Electronico', '<i class="fa fa-code"></i> Ups! ' ) );
       $("#email").focus();
     }else if(!validar_email(formData.get('email'))){
        $("#msgBox").html( msgError( 'Ingrese Correo Electronico Valido', '<i class="fa fa-code"></i> Ups! ' ) );
        $("#email").focus();
     }else if(formData.get('direccion') == ""){
       $("#msgBox").html( msgError( 'Ingrese Direccion', '<i class="fa fa-code"></i> Ups! ' ) );
       $("#direccion").focus();
     }else if(formData.get('telefono') == ""){
       $("#msgBox").html( msgError( 'Ingrese Telefono', '<i class="fa fa-code"></i> Ups! ' ) );
       $("#telefono").focus();
     }else if(formData.get('mensaje') == ""){
       $("#msgBox").html( msgError( 'Ingrese un Mensaje', '<i class="fa fa-code"></i> Ups! ' ) );
       $("#mensaje").focus();
     }else{
        $.ajax({
          url: 'verificar.php',  
          type: 'POST',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function(){
            $("#msgBox").html( msgLoad( 'Guardando Informacion ...' ) );
          },
          success: function( data ){        
            var array = eval("(" + data + ")");
            if(array.success == true){
      			  $("#msgBox").html( msgInfo( array.msg ) );
      			  setTimeout(function(){
          				$("#contactoForm")[0].reset();
          				grecaptcha.reset();
  			     }, 2000);
            }else{
              $("#msgBox").html( msgError( array.msg ) );
            }
        },
        error: function(){
            $("#msgBox").html( msgError( 'Error inesperado en la base de datos', '<i class="fa fa-code"></i> Ups! ' ) );
        }
      });
    }
}

function msgError(msg, titulo) {
  var tit = ( titulo == '' )? '' : ' ';
    return '<div class="alert alert-danger alert-dismissable">'+
          '<i class="fa fa-exclamation-triangle"></i>'+
          '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
          '<b>' + tit + '</b> '+ 
          msg + 
        '</div>';
}
function msgInfo(msg, titulo) {
  var tit = ( titulo == '' )? '' : ' ';
    return '<div class="alert alert-info alert-dismissable">'+
          '<i class="fa fa-info"></i>'+
          '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
          '<b>' + tit + '</b> '+ 
          msg + 
        '</div>';
}

function msgLoad(leyenda) {
  var text = '';
  if(leyenda!=''){
    text = '<p style="font-size:10px; color:#545454";>'+leyenda+'</p>';
  }
  else {
    text = '';
  }
    return '<center>'+text+'<img src="../admin-olkisa/img/cargando.gif" id="msgLoad" /></center>';
}

function numerosyletras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz 1234567890-";
    especiales = [8,37,39,46];
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false; 
    }
}
function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ";
    especiales = [8,37,39,46];
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false; 
    }
}

function solonumeros(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = "1234567890-";
      especiales = [8,37,39,46];
      tecla_especial = false;
      for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          } 
      }
      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false; 
    }
}


function validar_email( email ) 
{
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}