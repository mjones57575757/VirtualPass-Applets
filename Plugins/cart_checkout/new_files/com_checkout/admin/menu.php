<?php
function check_phid($pid){
    if (is_numeric($pid)){
    }
    else{
        echo("Invalid! not numeric");
      
      exit();
    }
  }
if (!isset($_COOKIE['com'])){
    exec("rm cookie/*");
    header("Location: /com_checkout/admin/index.html");
    exit();
}
else{
    if (!file_exists("cookie/" . $_COOKIE['admin'])){
        header("Location: /com_checkout/admin/index.html");
        exit();
    }
}
check_phid($_COOKIE['com']);
?>
<head>
    <link href="/style.css" rel="stylesheet" type="text/css" />
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Portal</title>



<input class="reg" type="button" value="Reload room DB" onclick="location='reload.php'" />