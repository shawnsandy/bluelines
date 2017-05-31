# bluelines

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


A content design and management system for apps


## Install

Via Composer - dev-master branch ( is probably the most stable)

``` bash
$ composer require shawnsandy/bluelines dev-master
```
## Setup

Add Bluelines provider to your `/config/app.php` 

```php

 'providers' => [     
     Illuminate\Validation\ValidationServiceProvider::class,
     Illuminate\View\ViewServiceProvider::class,
    // .....
    
     /*
      * Package Service Providers...
      */
     ShawnSandy\Bluelines\BluelinesServicesProvider::class,
 ];
 
```

Next add the Bluelines Facade (Blue) to your aliases 

```php

'providers' = [
    
]

'aliases' => [
        'Blue' => ShawnSandy\Bluelines\BluelinesFacade::class,    
    ]
    
```

You will also need to ensure that required packages are in your app config, if they are not you can add them yourself or use the `PackageProvider.php

__Add yourself__
```php

'providers' => [
    ShawnSandy\Dash\DashServicesProvider::class,
    ShawnSandy\Extras\ExtrasServicesProvider::class,
]

'aliases' => [  
    "DashForms" => ShawnSandy\Dash\Builder\GenerateFormFieldsFacade::class,
    'Extras' => ShawnSandy\Extras\ExtrasFacade::class,  
]

```

__Add the `PackagesProvider.php` to the `config\app.php`

```php
'providers = [
    ShawnSandy\Dash\PackagesProvider::class,
    ]
```

## Usage

See the docs [docs](/docs)

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email shawnsandy04@gmail.com instead of using the issue tracker.

## Credits

- [Shawn Sandy][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/shawnsandy/bluelines.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/shawnsandy/bluelines/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/shawnsandy/bluelines.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/shawnsandy/bluelines.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/shawnsandy/bluelines.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/shawnsandy/bluelines
[link-travis]: https://travis-ci.org/shawnsandy/bluelines
[link-scrutinizer]: https://scrutinizer-ci.com/g/shawnsandy/bluelines/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/shawnsandy/bluelines
[link-downloads]: https://packagist.org/packages/shawnsandy/bluelines
[link-author]: https://github.com/shawnsandy
[link-contributors]: ../../contributors
