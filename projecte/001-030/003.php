<?php
require_once dirname(dirname(dirname(__FILE__))) . '/Bootstrap.php';

$pf = new PrimeFactory();
$upper_limit = 600851475143;
$factors = $pf->getPrimeFactorsByUpperLimit($upper_limit);
$max_prime_factor = 0;
foreach ($factors as $prime_factor => $weight) {
    $max_prime_factor = max($max_prime_factor, $prime_factor);
}
print $max_prime_factor;
