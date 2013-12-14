<?php
require_once dirname(dirname(dirname(__FILE__))) . '/Bootstrap.php';

$pf = new PrimeFactory();
$upper_limit = 20;
$factors = $pf->getPrimesByUpperLimit($upper_limit);
$multiple_by_upper_limit = function ($num) use ($upper_limit) {
                               $ret = $num;
                               do {
                                   $ret *= $num;
                               } while ($ret < $upper_limit);
                               return $ret / $num;
                           };
print array_product(array_map($multiple_by_upper_limit, $factors));
