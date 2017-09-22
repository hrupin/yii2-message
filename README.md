Yii2 Module Message
===================
Yii2 Module Message

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist hrupin/yii2-message "*"
```

or add

```
"hrupin/yii2-message": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \hrupin\message\widgets\SendMessage::widget([
    'idRecipient' => 12,
    'idSender' => Yii::$app->user->id,
    'theme' => 'Супер товар'
]); ?>
```