<?php
if (file_exists("../../../mass.json")){
    echo "building room DB please wait...";
    $mass = json_decode(file_get_contents("../../../mass.json"), true);
    $com_index = json_decode(file_get_contents("https://raw.githubusercontent.com/mjones57575757/VirtualPass-Applets/master/Plugins/cart_checkout/new_files/com_config/base_cart.json"), true);
    foreach ($mass['room'] as $room_id){
        $real_room = file_get_contents("../../../src/registerd_qrids/" . $room_id);
        $com_index['rooms'][$room_id] = array(
            "carts"=>array(),
            "real_room"=>$real_room
        );
    }
    file_put_contents("../../../com_config/com_index.json", json_encode($com_index));
}
echo '
<head>
    <link href="/style.css" rel="stylesheet" type="text/css" />
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
Room DB reloaded
<input class="reg" type="button" value="Main menu" onclick="location=\'menu.php\'" />';
?>