<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Nuevo pedido</title>
<style>
	body{
		margin:0;
		padding:0;
		border:none;
		}
	@media only screen and (max-width: 800px){
		.container{
			width:100% !important;
			}
	}
</style>
</head>

<body >
  <div class="container" style="width:800px; font-family:Georgia, 'Times New Roman', Times, serif; text-align:center; margin:auto;">
	<div style="width:100%; background:#fff; text-align:center; padding:10px; border-bottom:solid 5px #fcc92e;">
    	
    	<img src="http://netweb.com.mx/angelica/olkisa/touch-tres-en-uno/img/pizarrones-inteligentes-logo.png" width="100px">
        
   </div>
   <div style="width:100%; background:#fff; text-align:center; padding:10px;">    
    	<h2 style="text-align:center;padding-bottom:20px; font-weight:200; border-bottom:solid 1px #fcc92e;">¡Un nuevo pedido!</h2>
        
        <h3 style="padding:20px; font-weight:200;">Buen día Administrador<br>
		Un cliente ha generado un nuevo pedido. ¡Compruébelo!<br><br>
        Detalles del pedido:
        </h3>

		<table align="center" cellpadding="5px" width="800" style="text-align:center;">
        	<!--<tr style="background:#797878; color:#fcc92e;">-->
            <tr style="background:#F5F5F5">
            	<th width="150">Orden</th>
            	<th width="150">Fecha</th>
                <th width="150">Usuario</th>
                <th width="150">Método de pago</th>
                <th width="150">Monto</th>
            </tr>
            <tr style="background:#797878; color:#fff; border-top:dashed 1px #fcc92e;">
            	<!--<td style="border-bottom:solid 5px #797878; background:#fcc92e; color:#797878;">:email:</td>
            	<td style="border-bottom:solid 5px #797878; background:#fcc92e; color:#797878;">:password:</td>-->
                <td>:orden:</td>
                <td>:fecha:</td>
                <td>:nombre:</td>
                <td>OpenPay</td>
                <td>$ :total:</td>
            </tr>
            
        </table>
        
       
        <br><br>
    
    </div>
    <div style="width:100%; background:#797878; text-align:center; padding:10px; border-top:solid 5px #fcc92e; color:#fff; font-size:12px">
    	<p>Copyright © 2017 Pizarrones Táctiles S.A de C.V. Todos los derechos reservados.<br />
        Este correo electrónico se genera automáticamente, por favor no responda.</p>
	</div>
    
    
  </div>
</body>
</html>
