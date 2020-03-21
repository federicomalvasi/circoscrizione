<?php

use kartik\mpdf\Pdf;
use kartik\datecontrol\Module;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'it-IT',
    'bootstrap' => ['log'],
	'name' => 'Circuit EU Rom. 11',	
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'tPwmcAazIxsJImCSegnB3muVVdtyuWPB',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Account',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    	'pdf' => [
    		'class' => Pdf::classname(),
    		'format' => Pdf::FORMAT_A4,
    		'orientation' => Pdf::ORIENT_PORTRAIT,
    		'destination' => Pdf::DEST_BROWSER,
    		// refer settings section for all configuration options
    	],
        'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@app/view'
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-black',
                ],
            ],
        ],
    ],
	'modules' => [
		'gridview' =>  [
			'class' => '\kartik\grid\Module'
					// enter optional module parameters below - only if you need to
					// use your own export download action or custom translation
					// message source
					// 'downloadAction' => 'gridview/export/download',
					// 'i18n' => []
		],
		'attachments' => [
				'class' => nemmo\attachments\Module::className(),
				'tempPath' => '@app/uploads/temp',
				'storePath' => '@app/uploads/store',
				'rules' => [ // Rules according to the FileValidator
						'maxFiles' => 10, // Allow to upload maximum 3 files, default to 3
				    //'mimeTypes' => ['image/png','application/pdf', 'application/msword', 'audio/mpeg3', 'audio/x-mpeg-3', 'video/mpeg', 'video/x-mpeg' ,'application/zip'], 
						'maxSize' => 1024 * 80680 //80 MB 
				],
				'tableName' => '{{%attachments}}' // Optional, default to 'attach_file'
		],
			'controllerMap' => [
			
					'migrate' => [
							'class' => 'yii\console\controllers\MigrateController',
							'migrationNamespaces' => [
									'nemmo\attachments\migrations',
							],
					],
						
			],
	    
	    'datecontrol' =>  [
	        'class' => '\kartik\datecontrol\Module',
	        'displaySettings' => [
	            Module::FORMAT_DATE => 'dd/MM/yyyy',
	            Module::FORMAT_TIME => 'hh:mm:ss a',
	            Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
	        ],
	        
	        // format settings for saving each date attribute (PHP format example)
	        'saveSettings' => [
	            Module::FORMAT_DATE => 'php:Y-m-d', // saves as unix timestamp
	            Module::FORMAT_TIME => 'php:H:i:s',
	            Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
	        ],
	    
	        'widgetSettings' => [
	            Module::FORMAT_DATE => [
	                'class' => 'yii\jui\DatePicker', // example
	                'options' => [
	                    'dateFormat' => 'php:d/M/Y',
	                    'options' => ['class'=>'form-control'],
	                ]
	            ]
	        ]
	        
	       ]
	],
		
		
				
				
				
	
		
    'params' => $params,
		
		
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
