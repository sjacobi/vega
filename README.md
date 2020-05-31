# Sergeyjacobi - Vega
Пакет создан в рамках тестового задания

## Установка

##### Установить пакет через composer

```bash
$ composer require sjacobi/vega
```

##### После установки нужно зарегистрировать сервис провайдер пакета

в app/config/app.php

```php
<?php
return [
    'providers' => [
        \SergeyJacobi\Vega\Providers\VegaServiceProvider::class    
    ]
];
```

##### После регистрации провайдера - применить миграции
```bash
$ php artisan migrate
```
##### Выполнить команду публикации конфига
```bash
$ php artisan vendor:publish --provider="SergeyJacobi\Vega\Providers\VegaServiceProvider"
```
##### После пройденых шагов - нужно включить пакет в файле конфигурации:

app/config/vega.php

```php
<?php
return [
    'enable' => env('VEGA_ENABLE', true),
];
```
##### Команда для проверки удаления старых сообщений

```bash
$ php artisan support_messages:delete_old
```

##### Команда так же будет срабатывать автоматически при запуске планировшика через cron

Пакет готов к работе

## Пакет обрабатывает запросы по маршрутам (CRUD):

1. post http://your-site-name/vega/message
2. get http://your-site-name/vega/message/1
3. put http://your-site-name/vega/message/1
4. delete http://your-site-name/vega/message/1