<?php
if (isset($_POST['uname']) and isset($_POST['passwd'])){
    $json_ou = exec("curl -u " . $_POST['uname'] . ":" . $_POST['passwd'] . " 'https://riidp.cherrycreekschools.org/api/rest/profiles/aggregated/my'");
    $json_out = json_decode($json_ou, true);
    if (isset($json_out['httpStatusCode'])){
        echo "invalid info";
    } else{
        exec("curl -u api:api 'localhost:8081/api/mk_user.php?fname=" . $json_out['aggregatedDelegation']['user']['firstName'] . "&lname=" . $json_out['aggregatedDelegation']['user']['lastName'] . "&email=" . $json_out['aggregatedDelegation']['user']['email'] . "&id=353245234'");
    }
}
?>

<title>Login</title>
<head>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<tr>
    <form method="post">
        <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1">
                <tr>
                    <td colspan="3"><strong>Login
                            <hr />
                        </strong></td>
                </tr>
                <tr>
                    <td class="text" width="78">User name
                        <td width="6">:</td>
                        <td width="294"><input class="box" name="uname" type="text" id="uname" autocomplete="off" required></td>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input class="box" name="passwd" type="password" id="passwd" autocomplete="off" required></td>
                </tr>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="reg" type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>