<?php
define('BASEPATH', dirname(__DIR__));
chdir(BASEPATH);

require_once( "bootstrap.php" );


global $app;

$app->mount('/admin', function ($admin) {
    // recursively mount
    $admin->mount('/blog', function ($user) {
        $user->get('/', function () {
            return 'Admin Blog home page';
        });
    });
});
