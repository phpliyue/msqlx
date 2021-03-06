<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
//            'root' => storage_path('app'),
            'root' => public_path('/images/profile/'),
        ],
        'folderImg'=>[
            'driver' => 'local',
            'root' => public_path('/folder/image'),
        ],
        'folderVideo'=>[
            'driver' => 'local',
            'root' => public_path('/folder/video'),
        ],
        'folderIcon'=>[
            'driver' => 'local',
            'root' => public_path('/folder/icon'),
        ],
        'folderDocument'=>[
            'driver' => 'local',
            'root' => public_path('/folder/document'),
        ],
        'folderMusic'=>[
            'driver' => 'local',
            'root' => public_path('/folder/music'),
        ],
        'cirImg' => [
            'driver' => 'local',
            'root' => public_path('/images/circleImages'),
        ],
        'proImg' => [
            'driver' => 'local',
            'root' => public_path('/images/product'),
        ],
        //导游头像
        'dy_head' => [
            'driver' => 'local',
            'root' => public_path('/images/ciceroni/headImg')
        ],
        //导游证书
        'dy_credentials' => [
            'driver' => 'local',
            'root' => public_path('/images/ciceroni/credentials')
        ],
        //旅行社封面
        'lxs' => [
            'driver' => 'local',
            'root' => public_path('/images/lxs')
        ],
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],

    ],

];
