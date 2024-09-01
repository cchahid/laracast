<?php


const BASE_PATH = __DIR__ . "/../";


require BASE_PATH . 'core/functions.php';

spl_autoload_register(function ($class){

    require base_path("core/{$class}.php");
});


require base_path('router.php');




   /* require 'functions.php';
 
    $uri = $_SERVER['REQUEST_URI'];

    dd(parse_url($uri));


    if ( $uri === '/'){
        require 'controllers/index.php';
    }else  if($uri === '/about'){
        require 'controllers/about.php';
    }

    
    dd($_SERVER);*/