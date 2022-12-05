<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

class Index
{
    private const ALPHABET = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public function reponse1(): int
    {
        $input = file_get_contents('input.txt');
        $input = explode("\n", $input);

        $resultat = 0;
        foreach ($input as $string) {
            $newArray = [
                str_split(substr($string, 0, strlen($string) / 2)),
                str_split(substr($string, strlen($string) / 2, strlen($string)))
            ];
            $appearsInBoth = array_unique(array_intersect($newArray[0], $newArray[1]));
            $resultat += strpos(self::ALPHABET, reset($appearsInBoth)) + 1;
        }

        return $resultat;
    }

    public function reponse2()
    {
        $input = file_get_contents('input.txt');
        $input = explode("\n", $input);

        $resultat = 0;
        $newArray = [];
        $i = 0;
        $y = 0;
        foreach ($input as $string) {
            if ($y < 3) {
                $newArray[$i][] = str_split($string);
                $y++;
            } else {
                $appearsInBoth = array_unique(array_intersect($newArray[$i][0], $newArray[$i][1], $newArray[$i][2]));
                $resultat += strpos(self::ALPHABET, reset($appearsInBoth)) + 1;
                $i++;
                $y = 0;
            }
        }

        return $resultat;
    }
}



$class = new Index();
// echo $class->reponse1();
echo $class->reponse2();