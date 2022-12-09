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
                str_split(substr($string, strlen($string) / 2, strlen($string))),
            ];
            $appearsInBoth = array_unique(array_intersect($newArray[0], $newArray[1]));
            $resultat += strpos(self::ALPHABET, reset($appearsInBoth)) + 1;
        }

        return $resultat;
    }

    public function reponse2(): int
    {
        $input = file_get_contents('input.txt');
        $input = explode("\n", $input);
        $resultat = 0;

        do {
            $group = array_splice($input, 0, 3);

            foreach ($group as $key => $row) {
                $group[$key] = str_split($row);
            }

            $appearsInBoth = array_unique(array_intersect(...$group));
            $resultat += strpos(self::ALPHABET, reset($appearsInBoth)) + 1;
        } while (!empty($input));

       return $resultat;
    }
}

$class = new Index();
echo("Réponse 1 :");
echo("\n");
echo $class->reponse1();
echo("\n");
echo("Réponse 2 :");
echo("\n");
echo $class->reponse2();
echo("\n");