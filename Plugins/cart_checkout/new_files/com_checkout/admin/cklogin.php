<?php
$ini = parse_ini_file('../../../config/config.ini');
if ($ini['overide_automatic_domain_name'] == "1"){
  $domain = $ini['domain_name'];
}
if ($ini['overide_automatic_domain_name'] != "1"){
  $domain = $_SERVER['SERVER_NAME'];
}
if (isset($_POST['uname']) and isset($_POST['passwd'])){
    
    $auth_arr = json_decode(file_get_contents("../../../com_config/auth.json"), true);
    if ($_POST['uname'] == $auth_arr['uname'] and $_POST['passwd'] == $auth_arr['passwd']){
        $ran = rand();
        setcookie("com", $ran, time() - (1200), "/", $domain, TRUE, TRUE);
        setcookie("com", $ran, time() + (1200), "/", $domain, TRUE, TRUE);
        file_put_contents("./cookie/" . $ran, $ran);
        header("Location: /com_checkout/admin/menu.php");
        exit();
    }
}


?>