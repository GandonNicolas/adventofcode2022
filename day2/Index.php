<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

class Index
{
    public const DEFAITE = 0;
    public const NULL = 3;
    public const VICTOIRE = 6;

    public const LOSE ="X";
    public const DRAW= "Y";
    public const WIN = "Z";

    public const X_PIERRE = 1;
    public const Y_PAPIER = 2;
    public const Z_CISEAUX = 3;

    public const AX = "AX";
    public const AY = "AY";
    public const AZ = "AZ";

    public const BX = "BX";
    public const BY = "BY";
    public const BZ = "BZ";

    public const CX = "CX";
    public const CY = "CY";
    public const CZ = "CZ";

    public function reponse1(): int
    {
        $input = file_get_contents('input.txt');
        $input = explode("\n", $input);
        $newArray = [];

        foreach ($input as $a) {
            $newArray[] = str_replace(" ", "", $a);
        }

        $score = 0;
        foreach ($newArray as $a) {
            if ($a === self::AX) {
                $score += self::NULL + self::X_PIERRE;
            } elseif ($a === self::AY) {
                $score += self::VICTOIRE + self::Y_PAPIER;
            } elseif ($a === self::AZ) {
                $score += self::DEFAITE + self::Z_CISEAUX;
            } elseif ($a === self::BX) {
                $score += self::DEFAITE + self::X_PIERRE;
            } elseif ($a === self::BY) {
                $score += self::NULL + self::Y_PAPIER;
            } elseif ($a === self::BZ) {
                $score += self::VICTOIRE + self::Z_CISEAUX;
            } elseif ($a === self::CX) {
                $score += self::VICTOIRE + self::X_PIERRE;
            } elseif ($a === self::CY) {
                $score += self::DEFAITE + self::Y_PAPIER;
            } elseif ($a === self::CZ) {
                $score += self::NULL + self::Z_CISEAUX;
            }
        }

        return $score;
    }

    public function reponse2(): int
    {
        $input = file_get_contents('input.txt');
        $input = explode("\n", $input);
        $newArray = [];

        foreach ($input as $a) {
            $newArray[] = str_replace(" ", "", $a);
        }

        $score = 0;

        // A = PIERRE --- B = PAPIER --- C = CISEAUX --- X = PIERRE --- Y = PAPIER --- Z = CISEAUX
        foreach ($newArray as $a) {

            $result = $a[1];
            $playerChoice = $a[0];

            if ($result === self::LOSE) {
                if ($playerChoice === "A") {
                    $score += self::Z_CISEAUX;
                } elseif ($playerChoice === "B") {
                    $score += self::X_PIERRE;
                } elseif ($playerChoice === "C") {
                    $score += self::Y_PAPIER;
                }
            } elseif ($result === self::DRAW) {
                if ($playerChoice === "A") {
                    $score += self::NULL + self::X_PIERRE;
                } elseif ($playerChoice === "B") {
                    $score += self::NULL + self::Y_PAPIER;
                } elseif ($playerChoice === "C") {
                    $score += self::NULL + self::Z_CISEAUX;
                }
            } elseif ($result === self::WIN) {
                if ($playerChoice === "A") {
                    $score += self::VICTOIRE + self::Y_PAPIER;
                } elseif ($playerChoice === "B") {
                    $score += self::VICTOIRE + self::Z_CISEAUX;
                } elseif ($playerChoice === "C") {
                    $score += self::VICTOIRE + self::X_PIERRE;
                }
            }
        }

        return $score;
    }
}

$class = new Index();
echo $class->reponse1();
echo $class->reponse2();








