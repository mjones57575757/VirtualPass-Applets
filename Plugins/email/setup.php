<?php
function config_set($config_file, $section, $key, $value) {
    $config_data = parse_ini_file($config_file, true);
    $config_data[$section][$key] = $value;
    $new_content = '';
    foreach ($config_data as $section => $section_content) {
        $section_content = array_map(function($value, $key) {
            return "$key=$value";
        }, array_values($section_content), array_keys($section_content));
        $section_content = implode("\n", $section_content);
        $new_content .= "[$section]\n$section_content\n";
    }
    file_put_contents($config_file, $new_content);
}
if (!isset($_GET['step'])){
    header("Location: /administrator/plugin_manager/setup.php?plugin=" . $_GET['plugin'] . "&step=0");
}
if ($_GET['step'] == 0){
    if (!isset($_POST['email']) and !isset($_POST['passwd']) and !isset($_POST['t_email'])){
        echo '
        <title>Setup emails</title>
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
                            <td colspan="3"><strong>Please input your specified details to test if the email function works.
                                    <hr />
                                </strong></td>
                        </tr>
                        <tr>
                            <td class="text" width="78">Sender email address
                                <td width="6">:</td>
                                <td width="294"><input class="box" autocomplete="off" name="email" id="email"
                                    required></td>
                            </td>
                        </tr>
                        <tr>
                            <td>Sender password</td>
                            <td>:</td>
                            <td><input class="box" name="passwd" autocomplete="off" type="text" id="passwd"></td>
                        </tr>
                        <tr>
                            <td>Test reciver email</td>
                            <td>:</td>
                            <td><input class="box" name="t_email" autocomplete="off"  id="t_email"></td>
                        </tr>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input class="reg" type="submit" name="Submit" value="Register"></td>
        </tr>
        </table>
        </td>
        </form>
        </tr>
        </table>
        ';
    } else{
        $exception_file = fopen("./tmp/Exception.php", "w");
        $oauth_file = fopen("./tmp/OAuth.php", "w");
        $mailer_file = fopen("./tmp/PHPMailer.php", "w");
        $stmp_file = fopen("./tmp/SMTP.php", "w");
        $email_file = fopen("./tmp/email.php", "w");
        fwrite($exception_file, file_get_contents("https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/Exception.php"));
        fwrite($oauth_file, file_get_contents("https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/OAuth.php"));
        fwrite($mailer_file, file_get_contents("https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/PHPMailer.php"));
        fwrite($stmp_file, file_get_contents("https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/SMTP.php"));
        fwrite($email_file, file_get_contents("https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/SMTP.php"));
        fclose($exception_file);
        fclose($oauth_file);
        fclose($mailer_file);
        fclose($stmp_file);


    }
}