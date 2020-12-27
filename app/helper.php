<?php

function isActiveRoute($route,$output='active')
 {      
    $resorce = [$route.'.index',$route.'.create',$route.'.edit',$route.'.show'];

    if (($pos = strpos($route, ".")) !== FALSE) { 
        $resorce = [$route];
    }
    $current = Route::currentRouteName();

    if (in_array($current,$resorce)) {
         return $output;
    }
 }