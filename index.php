<?php
/**
 * Created by PhpStorm.
 * User: lyudmila
 * Date: 04.07.16
 * Time: 20:57
 */
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

try
{
    $calculation=new Calculate(2,4,"^");
    echo $calculation->calc();
}
catch (TypeError $ex)
{
    echo $ex->getMessage();
}