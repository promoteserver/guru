<?php
      session_start();
	  
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else{
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel Login</title>
<link rel="stylesheet" href="css/admin.css" type="text/css" />
</head>

<body>
<div id="header">
 <div class="header-txt">
 Dekora Administrador de Contenido
 <span>Admin Pro Control Panel</span>
 </div>
</div>
<div class="logout">
<a href="login.php">Inicio</a>&nbsp;|&nbsp;
<a href="logout.php">Cerrar sesi&oacute;n</a>
</div>
<div id="interface">
  <div class="dashBoard-admin">
  <?php
       if(isset($_GET['albid']) and !empty($_GET['albid'])){
   ?>
    <form action="save_title.php" method="post" enctype="multipart/form-data">
      <table border="0">
       <tr>
       <td>T&iacute;tulo <em>(español)</em></td>
       <td><input type="file" id="pho_img_es" name="pho_img_es" /></td>
       </tr>
       <tr>
       <td>T&iacute;tulo <em>(ingles)</em></td>
       <td><input type="file" id="pho_img_en" name="pho_img_en" /></td>
       </tr>
       <tr>
       <td>&nbsp;</td>
       <td>
       <input type="hidden" name="idalb" value="<?=intval($_GET['albid'])?>" />
       <input type="submit" value="Guardar" name="save" />
       </td>
       </tr>
      </table>
    </form>
    <?php } ?>
  </div>
</div>
</body>
</html>
<?php } ?>