<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'es',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
         'i18n'=>[                
             'translations' => [
            'app*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@vendor/yiisoft/yii2/messages",
                    'sourceLanguage' => 'es',
                    'fileMap' => [
                        'yii'=>'yii.php',
                ],
            ],
             ],
            ],
    ],
   
];
