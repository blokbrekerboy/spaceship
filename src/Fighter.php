<?php
require_once "Spaceship.php";

class Fighter extends Spaceship
{
    public int $canonballs;

    public function __construct(
        $ammo = 100,
        $fuel = 100,
        $hitPoints = 100,
        $canonballs = 10
    ) {
        parent::__construct($ammo, $fuel, $hitPoints);
        $this->canonballs = $canonballs;
    }


    // herdefinieren van de functie shoot
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
        // save the spaceship to the database or session 
        $_SESSION['xSpaceship'] = $this;
        return 1; // 1 means success
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
}
