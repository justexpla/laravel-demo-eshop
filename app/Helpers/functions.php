<?php

if (! function_exists('generateNDigitsNumber')) {
    /**
     * Function return random number with N digits
     *
     * @param int $digits
     * @return int
     */
    function generateNDigitsNumber(int $digits): int
    {
        // from 10^(N-1), to 10^N - 1
        return random_int(pow(10, $digits - 1), pow(10, $digits) - 1);
    }
}
