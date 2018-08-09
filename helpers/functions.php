<?php
/**
 * Created by PhpStorm.
 * User: zharikov
 * Date: 08.08.2018
 * Time: 18:54
 */

namespace helpers\functions;

/**
 * @return bool
 */
function inDevLocation()
{
    return in_array(php_uname('n'), ['vps7032.mtu.immo']);
}

/**
 * @return bool
 */
function isImmoIp()
{
    $immoIpList = [
        '109.238.244.74',
        '109.238.244.64',
        '109.238.244.65',
        '109.238.244.66',
        '109.238.244.67',
        '109.238.244.68',
        '109.238.244.69',
        '109.238.244.70',
        '109.238.244.71',
        '109.238.244.72',
        '109.238.244.73',
        '109.238.244.74',
        '109.238.244.75',
        '109.238.244.76',
        '109.238.244.77',
        '109.238.244.78',
        '109.238.244.79',
        '109.238.244.80',
        '109.238.244.81',
        '109.238.244.82',
        '109.238.244.83',
        '109.238.244.84',
        '109.238.244.85',
        '109.238.244.86',
        '109.238.244.87',
        '109.238.244.88',
        '109.238.244.89',
        '109.238.244.90',
        '109.238.244.91',
        '109.238.244.92',
        '109.238.244.93',
        '109.238.244.94',
        '109.238.244.95'
    ];

    if (inDevLocation()) {
        return true;
    }

    // Если наша ip запрашивает
    if (isset($_SERVER['REMOTE_ADDR']) && strpos($_SERVER["REMOTE_ADDR"], '10.192.') === 0) {
        return true;

    }

    // Если наша ip но через прокси
    if (isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER["REMOTE_ADDR"], $immoIpList)) {
        return true;

    }

    if (isset($_SERVER['REMOTE_ADDR']) && strpos($_SERVER["REMOTE_ADDR"],
            '192.168.') === 0 && isset($_SERVER['HTTP_X_REAL_IP']) && in_array($_SERVER["HTTP_X_REAL_IP"],
            $immoIpList)) {
        return true;
    }

    return false;
}