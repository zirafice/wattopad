<?php
/**
 * Created by PhpStorm.
 * User: krystofkosut
 * Date: 30.08.18
 * Time: 15:15
 */

define('APP_DIR', __DIR__);

$config = require (APP_DIR.'/config.php');
databaseModel::$config = $config;
$mode   = $config['mode']();

define('BASEPATH', $config['baseDir'][$mode]);

var_dump($mode);
var_dump(BASEPATH);