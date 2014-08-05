<?php





$nombre = $_POST['nameInput'];



$email = $_POST['emailInput'];



$telefono = $_POST['phoneInput'];



$detalle = $_POST['contentInput'];







$headers[]= 'From: '.$nombre.' <'.$email.'>' . "\r\n";



$headers[]= 'MIME-Version: 1.0' . "\r\n";



$headers[]= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";







$mensaje  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<title>Documento sin título</title>



</head>







<body>



<table width="821" border="0">



  <tr>



    <td colspan="2">You have received a request from the Website www.gurutattoo.com</td>



  </tr><br >



   <tr>



    <td colspan="2">The details are as follow:</td>



  </tr><br >



  <tr>



    <td colspan="2">---</td>



  </tr>



  <tr>



    <td width="89">Name: </td>



    <td width="722">'.$nombre.'</td>



  </tr>



  <tr>



    <td>Email: </td>



    <td>'.$email.'</td>



  </tr>



  <tr>



    <td>Phone Number: </td>



    <td>'.$telefono.'</td>



  </tr>



  <tr>



    <td>Description: </td>



    <td>'.$detalle.'</td>



  </tr>



  <tr>



    <td colspan="2">---</td>



  </tr><br >



  <tr>



    <td colspan="2">Details received successfully.</td>



  </tr> 



     <tr>



    <td colspan="2">If you wish to extend or modify the functionality of this form, do not hesitate to contact us at +1 408 213 5656, info@promotestudios.com or by visiting our website www.promotestudios.com</td>



  </tr>



   <tr>



    <td colspan="2">Custom Web Development by Promote Studios Studios.</td>



  </tr>



</table>



</body>



</html>';  











$para = "dhole59@gmail.com,fsg@promoteinbox";





$asunto = 'Request from gurutattoo.com';









  if(mail($para, $asunto, $mensaje, implode($headers)))
  {
    echo "
  <script language='javascript'>

  alert('Your message has been received and will be reviewed by our staff. Thanks.');

  window.location.href = 'index.php';

  </script>";
  }

  else{

    echo "<script language='javascript'>

  alert('Message not sent try again.');

  window.location.href = 'index.php';

  </script>";

  }




?> 