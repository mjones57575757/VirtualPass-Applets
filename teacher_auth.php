<?php
function auth($uname, $passwd){
    $json_ou = exec("curl -u " . $_POST['uname'] . ":" . $_POST['passwd'] . " 'https://riidp.cherrycreekschools.org/api/rest/profiles/aggregated/my'");
    $json_out = json_decode($json_ou, true);
    print_r($status[1] . "\n");
    if (isset($json_out['httpStatusCode'])){
        return "Invalid username or password.";
    } else{
        $ou_list = explode(",", $json_out['aggregatedDelegation']['user']['dn']);
        $status = explode("=", $ou_list[1]);
        if ($status[1] == "Staff"){
            return true;
        } else{
            return "You are not autherized to access this application";
        }
    }

}