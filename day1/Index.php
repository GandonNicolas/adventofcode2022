<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

class Index
{

    public function reponse1(): int
    {
        $input = file_get_contents('input.txt');

        $inputClean = explode("\n\n", $input);

        $resultat = 0;
        foreach ($inputClean as $a) {
            $valeurTempo = array_sum(explode("\n", $a));
            if ($valeurTempo > $resultat) {
                $resultat = $valeurTempo;
            }
        }

        return $resultat;
    }

    public function reponse2(): int
    {
        $input = file_get_contents('input.txt');

        $inputClean = explode("\n\n", $input);

        $newArray = [];
        foreach ($inputClean as $a) {
            $newArray[] = array_sum(explode("\n", $a));
        }
        $resultat = 0;
        $i = 0;
        do {
            $resultat += max($newArray);
            unset($newArray[array_search(max($newArray), $newArray, true)]);
            $i++;
        } while ($i < 3);

        return $resultat;
    }
}

$class = new Index();
echo $class->reponse1();
echo "\n";
echo $class->reponse2();