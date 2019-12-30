
`elightwalk/laravel-modules` is a Laravel package which created to manage your large Laravel app using modules. Module is like a Laravel package, it has some views, controllers or models. This package is supported and tested in Laravel 6.

This package is a re-published, re-organised and maintained version of [pingpong/modules](https://github.com/pingpong-labs/modules), which isn't maintained anymore.

With one big added bonus that the original package didn't have: **tests**.

Find out why you should use this package in the article: [Writing modular applications with laravel-modules](https://nicolaswidart.com/blog/writing-modular-applications-with-laravel-modules).

## Install

To install through Composer, by run the following command:

``` bash
composer require elightwalk/laravel-modules
```

The package will automatically register a service provider and alias.

Optionally, publish the package's configuration file by running:

``` bash
php artisan vendor:publish --provider="Elightwalk\Modules\LaravelModulesServiceProvider"
```

### Autoloading

By default the module classes are not loaded automatically. You can autoload your modules using `psr-4`. For example:

``` json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Elightwalk\\": "app/Modules/Elightwalk/"
    }
  }
}
```

**Tip: don't forget to run `composer dump-autoload` afterwards.**

## Credits

- [Elightwalk Technology](https://github.com/nwidart)

## About Elightwalk Technology

Elightwalk Technology is a freelance web developer specialising on the Laravel framework. visit [my website](https://elightwalk.com).


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
