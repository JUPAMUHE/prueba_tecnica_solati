<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $route['default_controller'] = 'api/items';
    $route['api/items'] = 'api/items';
    $route['api/item/(:num)'] = 'api/item/$1';
    $route['api/item/create'] = 'api/create';
    $route['api/item/update/(:num)'] = 'api/update/$1';
    $route['api/item/delete/(:num)'] = 'api/delete/$1';
?>