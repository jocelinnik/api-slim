<?php

namespace src;

function basicAuth(){
    return new \Slim\Middleware\HttpBasicAuthentication([
        "users" => [
            "root" => "teste123"
        ]
    ]);
}