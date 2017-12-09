<?php
require "predis/autoload.php";
Predis\Autoloader::register();

try {
	$redis = new Predis\Client();

}
catch (Exception $e) {
	die($e->getMessage());
}