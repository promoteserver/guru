<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel Login</title>
<link rel="stylesheet" href="css/admin.css" />
</head>

<body>
<div id="header">
 <div class="header-txt">
 Guru Dashboard
 <span>Admin Pro Control Panel</span>
 </div>
</div>
<div id="main">
  <div class="login-form">
    <div class="error-txt">
    &nbsp;
    </div>
    <div class="form-box-head">Admin Control Panel Login</div>
    <div class="form-box">
     <form action="verification.php" method="post">
       <table border="0" align="right">
         <tr>
           <td>
           <label><? //md5('dekoramang11')?>Username</label>
           <input type="text" name="username" id="username" value="" class="formInput" />
           </td>
         </tr>
         <tr>
           <td>
           <label>Password</label>
           <input type="password" name="password" id="password" value="" class="formInput" maxlength="15" />
           </td>
         </tr>
         <tr>
           <td align="right">
           <input type="submit" value="LOGIN" class="formsubmit" />
           </td>
         </tr>
       </table>
     </form>
    </div>
    <div style="clear:both"></div>
    <div class="form-foot">Forget Password</div>
  </div>
</div>
</body>
</html>