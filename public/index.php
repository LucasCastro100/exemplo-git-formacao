<?php

require __DIR__.'/../ideias_dev/vendor/autoload.php'; // Altere o caminho para a pasta "site"
$app = require_once __DIR__.'/../ideias_dev/bootstrap/app.php'; // Altere o caminho para a pasta "site"

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);