<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Confirmación de pago</title>
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
    	<h2 style="text-align:center;padding-bottom:20px; font-weight:200; border-bottom:solid 1px #fcc92e;">¡Confirmación de tu pago!</h2>
        
        <h3 style="padding:20px; font-weight:200;">Good day :nombre:<br>
		Again we appreciate your purchase and we confirm that your payment has been made successfully. Soon we will send you an email so you can follow up on your order.<br><br>
        Details of the payment:
        </h3>

		<table align="center" cellpadding="5px" width="800" style="text-align:center;border-top:dashed 1px #fcc92e; border-bottom:dashed 1px #fcc92e;">
        	<!--<tr style="background:#797878; color:#fcc92e;">-->
            <tr style="background:#F5F5F5">
            	<th width="150">Order</th>
                <!--<TH>Producto</TH>-->
                <th width="150">Amount</th>
                <th width="150">Payment method</th>
                <th width="150">Date</th>
            </tr>
            <tr style="color:#797878;">
            	<!--<td style="border-bottom:solid 5px #797878; background:#fcc92e; color:#797878;">:email:</td>
            	<td style="border-bottom:solid 5px #797878; background:#fcc92e; color:#797878;">:password:</td>-->
                <td>:orden:</td>
                <!--<td>:producto:</td>-->
                <td>$ :total:</td>
                <td>OpenPay</td>
                <td>:fecha:</td>
            </tr>
            
        </table>
        
       
        <br><br>
    
    </div>
    <div style="width:100%; background:#797878; text-align:center; padding:10px; border-top:solid 5px #fcc92e; color:#fff; font-size:12px">
    	<p>Copyright © 2017 Touchboards S.A de C.V. All rights reserved. <br />
        This email is generated automatically, please do not respond.</p>
	</div>
    
    
  </div>
</body>
</html>
