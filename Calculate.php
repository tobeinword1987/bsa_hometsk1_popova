<?php

/**
 * Created by PhpStorm.
 * User: lyudmila
 * Date: 04.07.16
 * Time: 20:53
 */

class Calculate
{

    public $a;
    public $b;
    public $operator;
    public $logger;
    public $result;

    public function __construct(int $a, int $b ,string $operator)
    {
        $this->a=$a;
        $this->b=$b;
        $this->operator=$operator;
    }

    public function addition() :int
    {
        return $this->a+$this->b;
    }

    public function subtraction() : int
    {
        return $this->a-$this->b;
    }

    public function multiplication() : int
    {
        return $this->a*$this->b;
    }

    public function division() : float
    {
        return $this->a/$this->b;
    }

    public function involution() :int
    {
        $res=1;
        for ($i=0; $i<$this->b; $i++)
        {
            $res=2*$this->b;
        }
        return $res;
    }

    public function setLogger($logger)
    {
        $this->logger=$logger;
    }

    public function calc($logger)
    {
        switch ($this->operator) {
            case "+":
                $result= $this->addition();
                break;
            case "/":
                $result=  $this->division();
                break;
            case "*":
                $result=  $this->multiplication();
                break;
            case "-":
                $result=  $this->subtraction();
                break;
            case "^":
                $result=  $this->involution();
                break;
            default:
                $result=  "Вы ввели неверный оператор. Выберите один из следующих операторов: '+', '-', '*', '/'.";
        }

        $this->setLogger(new class ($result){
            public function __construct($msg){
                // строка, которую будем записывать
                $text = $msg;

// открываем файл, если файл не существует,
//делается попытка создать его
                $fp = fopen("file.txt", "w");

// записываем в файл текст
                fwrite($fp, $text);

// закрываем
                fclose($fp);
            }
        });
        echo $result;
    }
}