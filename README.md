# Laravel meta

[![Latest Version on Packagist](https://img.shields.io/packagist/v/appstract/laravel-meta.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-meta)
[![Total Downloads](https://img.shields.io/packagist/dt/appstract/laravel-meta.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-meta)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/appstract/laravel-meta/master.svg?style=flat-square)](https://travis-ci.org/appstract/laravel-meta)

Global key-value store in the database

## Installation

You can install the package via composer:

```bash
composer require appstract/laravel-meta
```

### Provider

Then add the ServiceProvider to your `config/app.php` file:

```php
'providers' => [
    ...

    Appstract\Meta\MetaServiceProvider::class

    ...
]
```

### Publish, migrate

By running `php artisan vendor:publish --provider="Appstract\Meta\MetaServiceProvider"` in your project all files for this package will be published. For this package, it's only a migration. Run `php artisan migrate` to migrate the table. There will now be an `meta` table in your database.

## Usage

//

## Testing

```bash
$ composer test
```

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/appstract/laravel-meta/graphs/contributors) :)

## About Appstract

Appstract is a small team from The Netherlands. <3 Laravel, Vue and other awesome tools.

## Buy Us A Beer

Would be awesome if you would [buy us a beer](https://www.paypal.me/teamappstract/10)! Or [a lot of beer](https://www.patreon.com/appstract) :)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
