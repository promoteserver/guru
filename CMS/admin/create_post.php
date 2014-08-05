<?php
      session_start();
     $username= $_SESSION['username'];
    if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
      header('Location: index.php');
    }else{
    include('cargador.php');
    
    $objDb  = new connectionDb();
    $objLog = new Login();
    $objGal = new Gallery();
    //we connected
    $objDb->create_Connection();
    $sql = mysql_query("SELECT * FROM users where username LIKE '%$username%' ");   
      $row=mysql_fetch_array($sql);

      $cUserId=$row['id']; //ACTUAL USER ID
      $cUserRole=$row['admin']; // USER ROLE
      $cUserName=$row['username'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel Login</title>
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/admin.css" type="text/css" />
<script type="text/javascript">

  tinyMCE.init({
    // General options
    mode : "exact",
    elements : "content",
    theme : "advanced",
    skin : "default",
    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

    // Theme options
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,undo,redo,link,unlink,anchor,",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    theme_advanced_buttons4 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "none",
    theme_advanced_resizing : false,

    // Example content CSS (should be your site CSS)
    content_css : "/css/editor_styles.css",

    // Drop lists for link/image/media/template dialogs, You shouldn't need to touch this
    template_external_list_url : "/lists/template_list.js",
    external_link_list_url : "/lists/link_list.js",
    external_image_list_url : "/lists/image_list.js",
    media_external_list_url : "/lists/media_list.js",

    // Style formats: You must add here all the inline styles and css classes exposed to the end user in the styles menus
    style_formats : [
      {title : 'Bold text', inline : 'b'},
      {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
      {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
      {title : 'Example 1', inline : 'span', classes : 'example1'},
      {title : 'Example 2', inline : 'span', classes : 'example2'},
      {title : 'Table styles'},
      {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
    ]
  });
  
  tinyMCE.init({
    // General options
    mode : "exact",
    elements : "desc_en",
    theme : "advanced",
    skin : "default",
    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

    // Theme options
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,undo,redo,link,unlink,anchor,",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    theme_advanced_buttons4 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "none",
    theme_advanced_resizing : false,

    // Example content CSS (should be your site CSS)
    content_css : "/css/editor_styles.css",

    // Drop lists for link/image/media/template dialogs, You shouldn't need to touch this
    template_external_list_url : "/lists/template_list.js",
    external_link_list_url : "/lists/link_list.js",
    external_image_list_url : "/lists/image_list.js",
    media_external_list_url : "/lists/media_list.js",

    // Style formats: You must add here all the inline styles and css classes exposed to the end user in the styles menus
    style_formats : [
      {title : 'Bold text', inline : 'b'},
      {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
      {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
      {title : 'Example 1', inline : 'span', classes : 'example1'},
      {title : 'Example 2', inline : 'span', classes : 'example2'},
      {title : 'Table styles'},
      {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
    ]
  });
</script>
</head>

<body>
<?php include "header_html.php" ;?>
<div id="interface">
  <div class="dashBoard-admin">
<form action="save_post.php" method="post" enctype="multipart/form-data">
      <table border="0">
       <tr>
        
        <td>
          <h1>Title</h1>
          <input type="text" style="width:410px;" name="title" id="title"  />
        </td>
        <?php
        echo '<td><input type="hidden" name="user_name" value="'.$cUserName.'"  /></td>' ; 

        ?>    
       </tr>
       <tr>       
       <td>
        <h1>Introduction</h1>
        <textarea type="text" cols="50" rows="5" id="introduction" name="introduction"/></textarea>
       </td>
       </tr>
       <tr>   
       <td>
        <h1>Content</h1>
        <textarea type="text" cols="70" rows="20" id="content" name="content"/></textarea>
      </td>
       </tr>          
       <tr>
       
       <td><input type="submit" value="Save" name="save" /></td>
       </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
<?php } ?>