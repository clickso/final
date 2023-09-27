<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'siparisler';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["ayar/cozunurluk/ekle"] = "ayar/cozunurluk_ekle";

$route["password"] = "password";

$route["login"] = "userop/login";
$route["logout"] = "userop/logout";

