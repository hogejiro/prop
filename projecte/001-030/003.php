<?php
require_once dirname(dirname(dirname(__FILE__))) . '/Bootstrap.php';

$pf = new PrimeFactory();
$num = 600851475143;
$factors = $pf->getPrimeFactors($num);
$max_prime_factor = 0;
foreach ($factors as $prime_factor => $weight) {
    $max_prime_factor = max($max_prime_factor, $prime_factor);
}
echo $max_prime_factor;
