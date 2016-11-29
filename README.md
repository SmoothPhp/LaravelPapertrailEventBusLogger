# LaravelPapertrailEventBusLogger

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require smoothphp/laravel-papertrail-event-bus-logger
```

## Usage

Add the following to services.php config file
``` php
'papertrail' => [
        'host' => '*.papertrailapp.com',
        'port' => 111111,
        'name' => 'app name',
]
```
add `\SmoothPhp\LaravelPapertrailEventBusLogger\PapertrailEventLogger::class,` to cqrses.php `event_bus_listeners`
e.g.

```php
    'event_bus_listeners'   => [
        \SmoothPhp\LaravelAdapter\EventBus\EventBusLogger::class,
        \SmoothPhp\LaravelAdapter\StrongConsistency\PushEventThroughQueueWithCommandId::class,
        \SmoothPhp\LaravelPapertrailEventBusLogger\PapertrailEventLogger::class,

    ],
```



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email simon@pixelatedcrow.com instead of using the issue tracker.

## Credits

- [Simon Bennett][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/SmoothPhp/LaravelPapertrailEventBusLogger.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/SmoothPhp/LaravelPapertrailEventBusLogger/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/SmoothPhp/LaravelPapertrailEventBusLogger.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/SmoothPhp/LaravelPapertrailEventBusLogger.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/SmoothPhp/LaravelPapertrailEventBusLogger.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/SmoothPhp/LaravelPapertrailEventBusLogger
[link-travis]: https://travis-ci.org/SmoothPhp/LaravelPapertrailEventBusLogger
[link-scrutinizer]: https://scrutinizer-ci.com/g/SmoothPhp/LaravelPapertrailEventBusLogger/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/SmoothPhp/LaravelPapertrailEventBusLogger
[link-downloads]: https://packagist.org/packages/SmoothPhp/LaravelPapertrailEventBusLogger
[link-author]: https://github.com/mrsimonbennett
[link-contributors]: ../../contributors
