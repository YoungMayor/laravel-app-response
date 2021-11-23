# Laravel App Response

[![Latest Version on Packagist](https://img.shields.io/packagist/v/youngmayor/app-response.svg?style=flat-square)](https://packagist.org/packages/youngmayor/app-response)
[![Total Downloads](https://img.shields.io/packagist/dt/youngmayor/app-response.svg?style=flat-square)](https://packagist.org/packages/youngmayor/app-response)
![GitHub Actions](https://github.com/youngmayor/app-response/actions/workflows/main.yml/badge.svg)

This is a simple laravel package for providing a unified response for our application.

## Installation

You can install the package via composer:

```bash
composer require youngmayor/app-response
```

## Usage
The package uses auto discovery hence if you use Laravel 5.5 or above, installing the package automatically registers it in your application. 

However, if you use Laravel 5.4 or below you will need to add the below snipet to your `config/app.php` to register the Service Provider and alias
```php
'providers' => [
    // ...
    YoungMayor\AppResponse\AppResponseServiceProvider,
    // ...
],

'aliases' => [
    // ...
    "AppResponse": "YoungMayor\AppResponse\Facade\AppResponse"
    // ...
],
```

The package can now be added to our controller actions using one of the methdos below 

1. Injecting the API response helper
```php 
// ...
use YoungMayor\AppResponse\API; 
// ...

class SampleController extends Controller
{
    public function sampleMethod(API $api)
    {
        // ...
        return $api->success("Action was successful");
    }
}
```

2. Injecting the Web response helper
```php 
// ...
use YoungMayor\AppResponse\Web; 
// ...

class SampleController extends Controller
{
    public function sampleMethod(Web $web)
    {
        // ...
        return $web->success("Action was successful");
    }
}
```

3. Injecting the automatic response helper
```php 
// ...
use YoungMayor\AppResponse\Auto; 
// ...

class SampleController extends Controller
{
    public function sampleMethod(Auto $auto)
    {
        // ...
        return $auto->success("Action was successful");
    }
}
```

4. Using the package facade
```php 
// ...
use YoungMayor\AppResponse\Facade\AppResponse; 
// or 
use AppReponse; // this utilises the Facade aliase
// ...

class SampleController extends Controller
{
    public function sampleMethod()
    {
        // ... 
        return AppResponse::success("Action was successful"); 
    }
}
```

5. Using the helper function 
```php 
class SampleController extends Controller
{
    public function sampleMethod()
    {
        // ...
        return appResponse()->success("Action was successful"); // for automatic response
        // or 
        return appResponse()->api->success("Action was successful"); // for API only resppnse
        // or 
        return appResponse()->web->success("Action was successful"); // for Web only resppnse
    }
}
```

## Response Types
The package provides two forms of responses, Web and API. It also provides an Auto responder which essentially responds as API if `Accept: application/json` header exists and responds as Web if the header is missing.

### API Response
This returns a JSON response

**Example**
```json
{
    "status": "success", 
    "statusCode": 200, 
    "message": "Action was successful", 
    "data": {
        "name": "Foo Bar", 
        "email": "foobar@example.com"
    }
}
```

### Web Response
This renders a web page as the response. An example is attached below
![Screenshot](/resources/screenshots/web-response.png)
> Web response can be completed turned off by making setting the `app-response.render-web-as-view` configuration to false. The configuration file can be published using the below command 
> ```sh
> php artisan vendor:publish --provider="YoungMayor\AppResponse\AppResponseServiceProvider" --tag="config"
> ```

The web response can also be customised. To publish the views run the below code on the root of your application terminal 
```sh
php artisan vendor:publish --provider="YoungMayor\AppResponse\AppResponseServiceProvider" 
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email youngmayor.dev@gmail.com instead of using the issue tracker.

## Credits

-   [Meyoron Aghogho](https://github.com/youngmayor)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
