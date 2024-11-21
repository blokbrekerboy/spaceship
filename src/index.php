<?php
// Define the Spaceship class
class Spaceship
{
    public bool $isAlive;
    public int $fuel;
    public int $hitPoints;
    public int $ammo;

    public function __construct($ammo = 100, $fuel = 100, $hitPoints = 100)
    {
        $this->ammo = $ammo;
        $this->fuel = $fuel;
        $this->hitPoints = $hitPoints;
        $this->isAlive = true;
    }

    public function shoot(): int
    {
        $shot = 5;
        $damage = 10;
        if ($this->ammo - $shot >= 0) {
            $this->ammo -= $shot;
            return ($shot * $damage);
        } else {
            return 0;
        }
    }

    public function refuel($amount)
    {
        $this->fuel += $amount;
    }

    public function hit($damage)
    {
        if ($this->hitPoints - $damage > 0) {
            $this->hitPoints -= $damage;
        } else {
            $this->isAlive = false;
        }
    }

    public function move()
    {
        $fuelUsage = 2;
        if ($this->fuel - $fuelUsage > 0) {
            $this->fuel -= $fuelUsage;
        } else {
            $this->fuel = 0;
        }
    }

    public function getAmmo(): int
    {
        return $this->ammo;
    }

    public function setAmmo(int $ammo)
    {
        $this->ammo = $ammo;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function setFuel(int $fuel)
    {
        $this->fuel = $fuel;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function setHitPoints(int $hitPoints)
    {
        $this->hitPoints = $hitPoints;
    }
}

// Define the Fighter class
class Fighter extends Spaceship
{
    public int $canonballs;

    public function __construct($ammo = 100, $fuel = 100, $hitPoints = 100, $canonballs = 10)
    {
        parent::__construct($ammo, $fuel, $hitPoints);
        $this->canonballs = $canonballs;
    }

    public function shoot(): int
    {
        $shot = 10;
        $damage = 10;
        if ($this->ammo - $shot >= 0) {
            $this->ammo -= $shot;
            return ($shot * $damage);
        } else {
            return 0;
        }
    }

    public function save(): int
    {
        $_SESSION['xSpaceship'] = $this;
        return 1;
    }

    public function blast(): int
    {
        $shot = 1;
        $damage = 100;
        if ($this->canonballs > 0) {
            $this->canonballs--;
            return ($shot * $damage);
        } else {
            return 0;
        }
    }

    public function getCanonballs(): int
    {
        return $this->canonballs;
    }

    public function setCanonballs(int $canonballs)
    {
        $this->canonballs = $canonballs;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spaceship Control</title>
</head>

<body>
    <p style="font-family: Cambria; font-size: 40px;">
        <?php
        // Create an instance of Spaceship with default values
        $ship1 = new Spaceship();

        // Create an instance of Fighter with custom values
        $ship2 = new Fighter(50, 50, 50);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Set properties for ship1
            $ship1->setAmmo((int)$_POST['ship1_ammo']);
            $ship1->setFuel((int)$_POST['ship1_fuel']);
            $ship1->setHitPoints((int)$_POST['ship1_hitPoints']);

            // Set properties for ship2
            $ship2->setCanonballs((int)$_POST['ship2_canonballs']);
        }
        ?>

        <form method="post">
            <h2>Ship1 (Spaceship)</h2>
            <label for="ship1_ammo">Ammo:</label>
            <input type="number" id="ship1_ammo" name="ship1_ammo" value="<?php echo $ship1->getAmmo(); ?>"><br>
            <label for="ship1_fuel">Fuel:</label>
            <input type="number" id="ship1_fuel" name="ship1_fuel" value="<?php echo $ship1->getFuel(); ?>"><br>
            <label for="ship1_hitPoints">Hit Points:</label>
            <input type="number" id="ship1_hitPoints" name="ship1_hitPoints" value="<?php echo $ship1->getHitPoints(); ?>"><br>

            <h2>Ship2 (Fighter)</h2>
            <label for="ship2_canonballs">Canonballs:</label>
            <input type="number" id="ship2_canonballs" name="ship2_canonballs" value="<?php echo $ship2->getCanonballs(); ?>"><br>

            <input type="submit" value="Update">
        </form>

        <?php
        // Display the updated properties
        echo "<h2>Updated Properties</h2>";
        echo "Ship1 ammo: " . $ship1->getAmmo() . "<br>";
        echo "Ship1 fuel: " . $ship1->getFuel() . "<br>";
        echo "Ship1 hitPoints: " . $ship1->getHitPoints() . "<br>";
        echo "Ship2 canonballs: " . $ship2->getCanonballs() . "<br>";
        ?>
    </p>
</body>

</html>