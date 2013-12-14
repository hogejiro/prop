<?php
require_once dirname(dirname(dirname(__FILE__))) . '/Bootstrap.php';

$pf = new PrimeFactory();
$num = 10001;
print $pf->getPrime($num);
