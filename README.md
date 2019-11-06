Seo module
=====


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist valearkot/yii2-module "*"
```

or add

```
"valearkot/yii2-module": "*"
```

to the require section of your `composer.json` file.

* Migrate to create the desired table in the database (console):
```
yii migrate --migrationPath=@valearkot/yii2module/migrations --interactive=0
```
* Migrate i18n datebase:
```
./yii migrate --migrationPath='@yii/i18n/migrations'
```
* In config.php :
```
<?php 
$config = [
    'id' => 'basic',
    'language' => 'en',
    'sourceLanguage' => 'en',

```
And then add this to your application configuration:

```php
<?php
return [

    // ...

    'components' => [
        // ...

        // Override the urlManager component
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',

            // List all supported languages here
            // Make sure, you include your app's default language.
            'languages' => $params['language'],
        ]

        // ...
    ]
];
```
Add in params.php:

```php
<?php
return [


    'language' =>
            [
                'ru',
                'de',
                'en'
                //For example
            ],
];
```
