<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

class Index
{

    public function reponse1()
    {
        $input = file_get_contents('input.txt');
        $input = explode("\n", $input);
        $newArray = [];

        foreach ($input as $string) {
            $newArray[] = explode(",", $string);
        }

        $result = 0;
        foreach ($newArray as $array) {
            $value = explode('-', $array[0]);
            $valueToCompare = explode('-', $array[1]);

            if ($valueToCompare[0] >= $value[0] && $valueToCompare[1] <= $value[1]) {
                $result++;
            } elseif ($value[0] >= $valueToCompare[0] && $value[1] <= $valueToCompare[1]) {
                $result++;
            }
        }

        return $result;
    }

    public function reponse2()
    {
        $input = file_get_contents('input.txt');
        $input = explode("\n", $input);
        $newArray = [];

        foreach ($input as $string) {
            $newArray[] = explode(",", $string);
        }

        $result = 0;
        foreach ($newArray as $array) {
            $value = explode('-', $array[0]);
            $valueToCompare = explode('-', $array[1]);

            if ($valueToCompare[0] >= $value[0] && $valueToCompare[1] <= $value[1]) {
                $result++;
            } elseif ($value[0] >= $valueToCompare[0] && $value[1] <= $valueToCompare[1]) {
                $result++;
            } elseif (($valueToCompare[0] >= $value[0] && $valueToCompare[0] <= $value[1]) || ($valueToCompare[1] >= $value[0] && $valueToCompare[1] <= $value[1])) {
                $result++;
            } elseif (($value[0] >= $valueToCompare[0] && $value[0] <= $valueToCompare[1]) || ($value[1] >= $valueToCompare[0] && $value[1] <= $valueToCompare[1])) {
                $result++;
            }
        }

        return $result;
    }
}



$class = new Index();
echo ("Réponse 1 :");
echo ("\n");
echo $class->reponse1();
echo ("\n");
echo ("Réponse 2 :");
echo ("\n");
echo $class->reponse2();