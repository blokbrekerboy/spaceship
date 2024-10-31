<?php
include_once 'Spaceship.php';
include_once 'Fighter.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p style="font-family: Cambria; font-size: 40px;">
        <?php
        // Create an instance of Spaceship with default values
        $ship1 = new Spaceship();

        // Display the ammo property of Spaceship
        echo "Ship1 ammo: " . $ship1->ammo . "<br>";

        // Create an instance of Fighter with custom values
        $ship2 = new Fighter(50, 50, 50);

        // Display the ammo property of Fighter
        echo "Ship2 ammo: " . $ship2->ammo . "<br>";

        // Ship1 shoots and returns damage
        $dmg = $ship1->shoot();

        // Ship2 gets hit with the damage from Ship1
        $ship2->hit($dmg);

        // Display the updated ammo of Ship1 and hitPoints of Ship2
        echo "Ship1 ammo after shooting: " . $ship1->ammo . "<br>";
        echo "Ship2 hitPoints after getting hit: " . $ship2->hitPoints . "<br>";

        echo "The end of the code has been reached.<br>";
        ?>
    </p>
</body>

</html>