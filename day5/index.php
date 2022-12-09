<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

class Index
{
    private $stacks = [
        1 => [
            "H", "T", "Z", "D",
        ],
        2 => [
            "Q", "R", "W", "T", "G", "C", "S",
        ],
        3 => [
            "P", "B", "F", "Q", "N", "R", "C", "H",
        ],
        4 => [
            "L", "C", "N", "F", "H", "Z",
        ],
        5 => [
            "G", "L", "F", "Q", "S",
        ],
        6 => [
            "V", "P", "W", "Z", "B", "R", "C", "S",
        ],
        7 => [
            "Z", "F", "J",
        ],
        8 => [
            "D", "L", "V", "Z", "R", "H", "Q",
        ],
        9 => [
            "B", "H", "G", "N", "F", "Z", "L", "D",
        ],
    ];

    public function reponse1(): string
    {
        $input = explode("\n", file_get_contents('input.txt'));

        foreach ($input as $ligne) {
            $instruction = explode(' ', $ligne);
            $nbIterafion = $instruction[1];
            $from = $instruction[3];
            $to = $instruction[5];

            for ($i = 1; $i <= $nbIterafion; $i++) {
                $test = array_pop($this->stacks[$from]);
                $this->stacks[$to][] = $test;
            }
        }

        // Ne sert que pour extraire le résultat
        $result = '';
        foreach ($this->stacks as $firstValueOfStack) {
            $result .= end($firstValueOfStack);
        }

        return $result;
    }

    public function reponse2(): string
    {
        $input = explode("\n", file_get_contents('input.txt'));

        foreach ($input as $ligne) {
            $instruction = explode(' ', $ligne);
            $nbCrateToTake = (int) $instruction[1];
            $from = $instruction[3];
            $to = $instruction[5];

            $test = array_splice($this->stacks[$from], -$nbCrateToTake, $nbCrateToTake);
            // je récupère les 2 dernier élément maintenant il fzut que j'ai les push a la fin sans perdre l'orde
            foreach ($test as $iValue) {
                $this->stacks[$to][] = $iValue;
            }
        }

        // Ne sert que pour extraire le résultat
        $result = '';
        foreach ($this->stacks as $firstValueOfStack) {
            $result .= end($firstValueOfStack);
        }

        return $result;
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
