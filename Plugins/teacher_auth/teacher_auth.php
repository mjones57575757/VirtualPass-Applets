<?php
function auth($uname, $passwd){
    $json_ou = file_get_contents("https://" . $uname . ":" . $passwd . "@my.cherrycreekschools.org/api/rest/profiles/aggregated/my");
    $json_out = json_decode($json_ou, true);
    if (isset($json_out['httpStatusCode'])){
        return "Invalid username or password.";
    } else{
        $ou_list = explode(",", $json_out['aggregatedDelegation']['user']['dn']);
        $status = explode("=", $ou_list[1]);
        if ($status[1] == "Staff"){
            return 1;
        } else{
            return "you are not authorized to access this resource";
        }
    }

}
?>
