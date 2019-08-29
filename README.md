Test 
=====
Test module

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