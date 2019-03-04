LaravelScaffoldingInfyOmSample
---

1. Laravelプロジェクトの作成

```powershell
$ laravel new LaravelScaffoldingInfyOmSample
$ cd LaravelScaffoldingInfyOmSample
```

2. InfyOm Laravel Generatorのインストール

composer.json に以下を追加する

```json
"require": {
    "infyomlabs/laravel-generator": "5.8.x-dev",
    "laravelcollective/html": "^5.8.0",
    "infyomlabs/adminlte-templates": "5.8.x-dev",
    "infyomlabs/swagger-generator": "dev-master",
    "appointer/swaggervel": "dev-master",
    "doctrine/dbal": "~2.3"
}

```

以下のコマンドを実行する

```powershell
$ composer update
```

config/app.phpに以下のサービスプロバイダ(Service Providers)を追加する

```php
Collective\Html\HtmlServiceProvider::class,
Laracasts\Flash\FlashServiceProvider::class,
Prettus\Repository\Providers\RepositoryServiceProvider::class,
\InfyOm\Generator\InfyOmGeneratorServiceProvider::class,
\InfyOm\AdminLTETemplates\AdminLTETemplatesServiceProvider::class,

```

config/app.phpに以下のエイリアス(Aliases)を追加する

```php
'Form'      => Collective\Html\FormFacade::class,
'Html'      => Collective\Html\HtmlFacade::class,
'Flash'     => Laracasts\Flash\Flash::class,

```

以下のコマンドを実行する

```powershell
$ php artisan vendor:publish
```

app\Providers\RouteServiceProvider.phpのmapApiRoutes関数の中身を以下に変更する

```php
Route::prefix('api')
    ->middleware('api')
    ->as('api.')
    ->namespace($this->namespace."\\API")
    ->group(base_path('routes/api.php'));

```

以下のコマンドを実行する

```powershell
$ php artisan infyom:publish
```
