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
        $result=1;
        for ($i=0; $i<$this->b; $i++)
        {
            $result=2*$this->b;
        }
        return $result;
    }

    public function calc()
    {
        switch ($this->operator) {
            case "+":
                echo $this->addition();
                break;
            case "/":
                echo $this->division();
                break;
            case "*":
                echo $this->multiplication();
                break;
            case "-":
                echo $this->subtraction();
                break;
            case "^":
                echo $this->involution();
                break;
            default:
                echo "Вы ввели неверный оператор. Выберите один из следующих операторов: '+', '-', '*', '/'.";
        }
    }
}