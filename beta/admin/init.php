<?php
/**
 * Created by PhpStorm.
 * User: krystofkosut
 * Date: 30.08.18
 * Time: 15:15
 */

define('APP_DIR', __DIR__);

$config = require (APP_DIR.'/config.php');
$mode   = $config['mode']();
databaseModel::$config = $config;
// databaseModel::$mode = $mode;

define('BASEPATH', $config['baseDir'][$mode]);