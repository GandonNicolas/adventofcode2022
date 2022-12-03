<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

class Index
{

    public function transformInput(): int
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
}

$class = new Index();
echo $class->transformInput();