<?php

namespace src;

function configurar(){
    $configuracao = [
        "settings" => [
            "displayErrorDetails" => getenv("DISPLAY_ERRORS_DETAILS"),
        ],
    ];
    
    return new \Slim\Container($configuracao);
}