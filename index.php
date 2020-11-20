<?php
require 'vendor/autoload.php';
$app = new \Slim\App;

$app->get('/postagens',function(){
    echo 'Postagens';
});

$app->get('/usuarios/',function(){
    echo "Listagem de usuários";
});

$app->run();