<?php

if (!function_exists('converter_monetario_db')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array $array
     * @return array
     */
    function converter_monetario_db($money)
    {
        $money = str_replace('.', '', $money);
        $money = str_replace(',', '.', $money);

        return $money;
    }
}

if (!function_exists('converter_monetario_vw')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array $array
     * @return array
     */
    function converter_monetario_vw($money)
    {
        return number_format($money, 2, ',', '.');
    }
}

?>