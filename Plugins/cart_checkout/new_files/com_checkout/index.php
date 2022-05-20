<?php
if(!isset($_GET['cart'])){
    echo("Your cart variable is not set!");
    exit();
}
$cart = $_GET['cart'];
$index_json = json_decode(file_get_contents("../../com_config/com_index.josn"), true);
if(!isset($index_json['carts'][$cart])){
    echo "Your cart does not exiest! Please contact an administrator to resolve this";
    exit();
}

?>