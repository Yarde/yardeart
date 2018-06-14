<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Shirt';
$route['404_override'] = 'Main/error404';
$route['Shirt'] = 'Shirt/shirtIndex';
$route['Gallery'] = 'Shirt/galleryIndex';
$route['translate_uri_dashes'] = FALSE;