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
            $res=$res*2;
        }
        return $res;
    }

    public function setLogger($logger)
    {
        $this->logger=$logger;
    }

    public function calc($logger)
    {
        $operator_local=$this->operator;
        $first_operand=$this->a;
        $second_operand=$this->b;
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

        $this->setLogger(new class ($result,$operator_local,$first_operand,$second_operand){
            public function __construct($result,$operator_local,$first_operand,$second_operand){
                // строка, которую будем записывать
                $text = "%".date('l jS \of F Y h:i:s A')."% %$operator_local% %$first_operand% %$second_operand% %$result%";
/*
                // открываем файл, если файл не существует,
                //делается попытка создать его
                $fp = fopen("logfile.txt", "w");

                // записываем в файл текст
                fwrite($fp, $text);

                // закрываем
                fclose($fp);*/

                $bom = "\n";
                file_put_contents("logfile.txt", $text.$bom,FILE_APPEND);
            }
        });
        echo $result;
    }
}