<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

class Index
{
    public function reponse1()
    {
        $input = str_split(file_get_contents('input.txt'));

        $offset = 0;
        $lenght = 4;

        foreach ($input as $char) {
            $group = array_slice($input, $offset, $lenght, true);
            if (count(array_unique($group)) === 4) {
                return array_key_last($group) + 1;
            }
            $offset++;
        }

        return false;
    }

    public function reponse2()
    {
        $input = str_split(file_get_contents('input.txt'));

        $offset = 0;
        $lenght = 14;

        foreach ($input as $char) {
            $group = array_slice($input, $offset, $lenght, true);
            if (count(array_unique($group)) === $lenght) {
                return array_key_last($group) + 1;
            }
            $offset++;
        }

        return false;
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