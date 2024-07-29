<?php declare(strict_types=1);





use React\EventLoop\Loop;
use React\Http\HttpServer;
use React\Socket\SocketServer;
use React\Stream\ThroughStream;
use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;

require __DIR__ . '/vendor/autoload.php';

$http = new HttpServer(function (ServerRequestInterface $request) {
    if ($request->getMethod() !== 'GET') {
        return new Response(Response::STATUS_NOT_FOUND);
    }

    $method = $request->getMethod();
    $urlQueryParams = $request->getQueryParams();
    $url = $urlQueryParams['url'];
    if($urlQueryParams['url']):
    return Response::plaintext($url);
    else:
    return Response::plaintext("Неверный формат запроса")->withStatus(403);
    endif;
});

$socket = new SocketServer($argv[1] ?? '0.0.0.0:8000');
$http->listen($socket);