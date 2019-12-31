
`helloelightwalk/laravel-modules` is a Laravel package which created to manage your large Laravel app using modules. Module is like a Laravel package, it has some views, controllers or models. This package is supported and tested in Laravel 6.

## Install

To install through Composer, by run the following command:

``` bash
composer require helloelightwalk/laravel-modules
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

- [Elightwalk Technology](https://github.com/helloelightwalk)

## About Elightwalk Technology

Elightwalk is leading in web development. We provide complete solutions that never compromise on functionality and design, Elightwalk leaders have great Experience over the web technologies, Our target to make customer and employees everyday happy.
Our Regular to do 
``` bash
Magento development.
Web app development.
WordPress development.
WooCommerce development.
Laravel development.
SaaS development.
PWA development.
Full Stack Development
```
visit [my website](https://elightwalk.com).


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
