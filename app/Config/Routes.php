<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/admin', 'C_Barang::index'); 
$routes->get('/', 'C_Barang::home');
$routes->post('/barang/addToCart', 'C_Barang::addToCart');
$routes->get('/cart', 'C_Barang::viewCart');
$routes->get('/cart/checkout', 'C_Barang::checkout');
$routes->post('/cart/complete_checkout', 'C_Barang::complete_checkout');
$routes->get('/success', 'C_Barang::success');