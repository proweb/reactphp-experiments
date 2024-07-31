# Асинхронный PHP с ReactPHP

playground


## Основные изменения в новых версиях

Eventloop запущен по умолчанию.

Это не требуется:
```php
...
$loop = Factory::create();
...
$loop->run();
```
Получить текущий EventLoop:
```php
$loop = React\EventLoop\Loop::get();
```
Запуск таймеров через статические методы
```php
use React\EventLoop\Loop;

Loop::addTimer(1.0, function () {
    echo 'Hello' . PHP_EOL;
});

Loop::addPeriodicTimer(0.1, function () {
    echo 'Tick' . PHP_EOL;
});
```

---

`React\Http\Server` стал `React\Http\HttpServer`

`React\Socket\Server` стал `React\Socket\SocketServer`


## Получение ошибок в консоль

```php
$http->on('error', function (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
});
```


