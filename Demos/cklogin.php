<?php
$uname = $_POST['uname'];
$passwd = $_POST['passwd'];
$hostname = $_POST['hostname'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERPWD, $uname . ":" . $passwd);  
curl_setopt($ch, CURLOPT_URL, "http://" . $hostname . "/api/validate.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 3. Execute and save response
$response = curl_exec($ch);

// 4. Close cURL session
curl_close($ch);
if ($response == 1){
    echo ("authentication succeded");
    header("Location: /Demos/req/index.php?uname" . $uname . "&passwd" . $passwd . "&hostname=" . $hostname);
} else{
    echo ("Authentication failed ");
}
?>