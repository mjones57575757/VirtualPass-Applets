<?php
//this is to remove a user from a [] thing in json
$main_json['user'] = \array_diff($main_json['user'], [$_GET['user']]);
?>