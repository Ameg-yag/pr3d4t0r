<?php
require 'MercadoLivre/meli.php';

$meli = new Meli('2276532673852144', 'C0s9iR8rHo1ej5867rImNHHPdRzyrudz');

$params = array();

$result = $meli->get('/sites/MLB', $params);

echo '<pre>';
print_r($result);
echo '</pre>';
