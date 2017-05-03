<?php
$configs = include_once(dirname(dirname(__FILE__))."/config/database_config.php");
$bd = new mysqli("{$configs['host']}", "{$configs['user']}", "{$configs['password']}", "{$configs['base_name']}");
$bd->query("SET NAMES 'utf8'");
return $bd;