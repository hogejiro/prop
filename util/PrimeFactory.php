<?php
class PrimeFactory
{
    /**
     * get primes below $num 
     * (ex) getprimes(10) = [2, 3, 5, 7]
     * 
     * @param  $num    object number (>= 2)
     * @return $primes array of prime numbers / false
     */
    public function getPrimes($num)
    {
        if (! (isset($num) && is_numeric($num))) {
            return false;
        }
        if ($num < 2) {
            return [];
        }
        $primes = [2];
        for ($idx = 3; $idx <= $num; $idx++) {
            $is_prime = true;
            foreach ($primes as $prime) {
                if ($idx < $prime * $prime) {
                    break;
                }
                if ($idx % $prime == 0) {
                    $is_prime = false;
                    break;
                }
            }
            if ($is_prime) {
                array_push($primes, $idx);
            }
        }
        return $primes;
    }

    /**
     * get prime factors
     * (ex) getprimefactors(63) = array(3 => 2, 7 => 1)
     * array(3 => 2, 7 => 1) means 3 * 3 * 7
     * 
     * @param $num object number
     * @return $prime_factors array of prime factors / false
     */
    public function getPrimeFactors($num)
    {
        if (! (isset($num) && is_numeric($num))) {
            return false;
        }
        if ($num < 2) {
            return [];
        }
        $prime_factors = [];
        $primes = $this->getPrimes(sqrt($num));
        foreach ($primes as $prime) {
            if ($num == 1) {
                break;
            }
            while ($num % $prime == 0) {
                $num /= $prime;
                if (isset($prime_factors[$prime])) {
                    $prime_factors[$prime]++;
                } else {
                    $prime_factors[$prime] = 1;
                }
            }
        }
        if ($num != 1) {
            $prime_factors[$num] = 1;
        }
        return $prime_factors;
    }
}
