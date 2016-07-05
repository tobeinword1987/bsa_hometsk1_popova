<?php
/**
 * Created by PhpStorm.
 * User: lyudmila
 * Date: 04.07.16
 * Time: 20:57
 */
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$a=3;$b=4;$operator="+";

try
{
    $calculation=new Calculate($a,$b,$operator);
    echo $calculation->calc();
}
catch (TypeError $ex)
{
    echo $ex->getMessage();
    $text = "%".date('l jS \of F Y h:i:s A')."% %".$operator."% %".$a."% %".$b."% %Исключение TypeError! Вы должны работать только с целыми числами%";
    file_put_contents("logfile.txt", $text."\n",FILE_APPEND);
}