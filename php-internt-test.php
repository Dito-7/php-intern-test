<?php

function generatePattern($size)
{
    if ($size % 2 === 0) {
        echo "Size must be an odd number.\n";
        return;
    }

    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            // Main diagonals
            if ($i === $j || $i + $j === $size - 1) {
                echo "X";
            } else {
                echo "O";
            }
        }
        echo "\n";
    }
}

generatePattern(7);

?>