<?php

function calculateFinalSpeed(float $initialSpeed, array $inclinations): float
{
    $speed = $initialSpeed;

    foreach ($inclinations as $inclination) {
        $speed -= $inclination;

        if ($speed <= 0) {
            return 0;
        }
    }

    return $speed;
}

echo calculateFinalSpeed(60, [0, 30, 0, -45, 0]);