function usr_login(){
		  var formData = new FormData($("#frm_login")[0]);    
		  $.ajax({
		    url: 'functions/user.login.php',  
		    type: 'POST',
		    data: formData,
		    cache: false,
		    contentType: false,
		    processData: false,
		    beforeSend: function(){
		      $("#msgBoxLogin").html( msgLoad( 'Iniciando Sesion ...' ) );
		    },
		    success: function( data ){        
		      var array = eval("(" + data + ")");
		      if(array.success == true)
		      {
		        $("#msgBoxLogin").html( msgInfo( array.msg ) );
		        setTimeout(function(){ location.href = "inicio.php" }, 1000);
		      }
		      else
		      {
		        $("#msgBoxLogin").html( msgError( array.msg ) );
		      }
		    },
		    error: function(){
		      $("#msgBoxLogin").html( msgError( 'Hubo un error en la base de datos', '<i class="fa fa-code"></i> Ups! ' ) );
		    }
		  }); 
		}

		function recovery_pass(){
	      var formData = new FormData($("#frm-pass")[0]);   
	      $.ajax({
	        url: 'functions/user.pass.php',  
	        type: 'POST',
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        beforeSend: function(){
	          $("#msgBox").html( msgLoad( 'Recuperando Contraseña ...' ) );
	          $("#btn-recover").hide();
	        },
	        success: function( data ){        
	          var array = eval("(" + data + ")");
	          if(array.success == true)
	          {
	            $("#msgBox").html( msgInfo( array.msg ) );        
	            
		            $.ajax({
		              url: 'mail/recuperar-admin.php',  
		              type: 'GET',
		              data: 'cliente=' + array.id,
		              success: function( data ){
		                console.log('Se envio correo electronico al cliente');
		                setTimeout(function(){ location.href = "index.php" }, 2000);
		              }
		            });

	                //console.log('Se envio correo electronico al cliente');
	                //$("#msgBox").html( msgInfo( 'Se envio correo electronico al cliente') );
	                
	          }
	          else
	          {
	            $("#msgBox").html( msgError( array.msg ) );
	          }
	        },
	        error: function(){
	          $("#msgBox").html( msgError( 'Error inesperado en la base de datos', '<i class="fa fa-code"></i> Ups! ' ) );
	        }
	      }); 
	    }

		function msgError(msg, titulo) {
		  var tit = ( titulo == '' )? '' : ' ';
		    return '<div class="alert alert-danger alert-dismissable">'+
		          '<i class="fa fa-exclamation-triangle"></i>'+
		          '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+
		          '<b>' + tit + '</b> '+ 
		          msg + 
		        '</div>';
		}

		function msgInfo(msg, titulo) {
		  var tit = ( titulo == '' )? '' : ' ';
		    return '<div class="alert alert-info alert-dismissable">'+
		          '<i class="fa fa-info"></i>'+
		          '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+
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
		    return '<center>'+text+'<img src="http://vellvesystems.com/zergaB/nw-admin/sources/img/loaders/17.gif" id="msgLoad" /></center>';
		}