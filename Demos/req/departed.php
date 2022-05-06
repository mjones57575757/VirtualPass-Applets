<?php
$uname = $_GET['uname'];
$passwd = $_GET['passwd'];
$hostname = $_GET['hostname'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERPWD, $uname . ":" . $passwd);  
curl_setopt($ch, CURLOPT_URL, "http://" . $hostname . "/api/get_departed.php?who=all");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 3. Execute and save response
$response = curl_exec($ch);

// 4. Close cURL session
curl_close($ch);
$departed_users = json_decode($response);
foreach ($departed_users as $user_id){
    print_r($user_id);
}
?>