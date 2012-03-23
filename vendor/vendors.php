#!/usr/bin/env php
<?php

/*
* This file is part of the EguliasQuizBundle package.
*
* (c) Eduardo Gulias Davis
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

set_time_limit(0);

$vendorDir = __DIR__;
$deps = array(
    array('doctrine-common', 'git://github.com/doctrine/common.git', 'origin/master'),
    array('doctrine-dbal', 'git://github.com/doctrine/dbal.git', 'origin/master'),
    array('doctrine', 'git://github.com/doctrine/doctrine2.git', 'origin/master'),
    array('symfony-form', 'https://github.com/symfony/Form.git', 'origin/master'),
);

foreach ($deps as $dep) {
    list($name, $url, $rev) = $dep;

    echo "> Installing/Updating $name\n";

    $installDir = $vendorDir.'/'.$name;
    if ($name == 'symfony-form') {
        $installDir = $vendorDir . '/symfony/Symfony/Component/Form';
    }
    if (!is_dir($installDir)) {
        $return = null;
        system(sprintf('git clone -q %s %s', escapeshellarg($url), escapeshellarg($installDir)), $return);
        if ($return > 0) {
            exit($return);
        }
    }

    $return = null;
    system(sprintf('cd %s && git fetch -q origin && git reset --hard %s', escapeshellarg($installDir), escapeshellarg($rev)), $return);
    if ($return > 0) {
        exit($return);
    }
}
