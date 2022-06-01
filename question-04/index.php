<?php
// Autoload our App files using PSR
require __DIR__  . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use App\MaintenceHelper;
use App\MaintenceMode;

$helper = new MaintenceHelper( $_SERVER['ENV_IS_UP'], $_SERVER['ENV_DOWN_REASON'] );

if ( !( $mode = new MaintenceMode( $helper ) )->isUp() ) {
    die( $mode->getReason() );
}

echo file_get_contents( __DIR__ . '/website.html');
