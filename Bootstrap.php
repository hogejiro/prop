<?php
require_once 'util/ClassLoader.php';

$loader = new ClassLoader();
$loader->registerDir(dirname(__FILE__) . '/util');
$loader->register();
