LaravelScaffoldingInfyOmSample
---

1. Laravelプロジェクトの作成

```powershell
$ laravel new LaravelScaffoldingInfyOmSample
$ cd LaravelScaffoldingInfyOmSample

```

Laravel5.4以上、MySQL5.7.7未満の場合はapp\Providers\AppServiceProvider.phpを以下のように変更する

```php
use Illuminate\Support\Facades\Schema;
```

```php
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
```

認証を有効化する

```powershell
$ php artisan make:auth
$ php artisan migrate

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

```powershell
$ php artisan infyom.publish:layout
```

3. InfyOm Laravel Generatorコマンドの実行

※Soft Delete(論理削除)について

デフォルトで論理削除が有効化されているので、必要に応じてconfig/infyom/laravel_generator.phpの以下の項目を編集して無効化する。論理削除を使用する場合はテーブルにdeletd_atカラムが存在することを確認しておく

```php
'options' => 'softDelete' => true
```

スキャフォールディングを実行する

```powershell
# $ php artisan infyom:scaffold $MODEL_NAME --fromTable --tableName=$TABLE_NAME

$ php artisan infyom:scaffold ItemType --fromTable --tableName=itemtype
$ php artisan infyom:scaffold Item --fromTable --tableName=item
```

Item、ItemTypeモデルのそれぞれについて、idカラムのバリデーションを解除する
(AUTO INCREMENTを設定しているため)

```php
    public static $rules = [
        'id' => 'required', // ←この行を削除
        ...
    ];
```

---

Copyright (c) 2019 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
