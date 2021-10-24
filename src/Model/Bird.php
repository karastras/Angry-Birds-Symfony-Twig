<?php

namespace App\Model;

class Bird {
    private $birds = [
        [
            'name' => 'White bird',
            'description' => 'The chubby white bird drops an egg bomb when players tap the screen after launching the creature from the slingshot.',
            'image' => 'white.png',
        ],
        [
            'name' => 'Black bird',
            'description' => 'Black birds act as bombs, which explode once they\'ve landed on a target, obliterating pigs and buildings around them.',
            'image' => 'black.png',
        ],
        [
            'name' => 'Red bird',
            'description' => 'The first avian missile players encounter when they start the game, the red bird follows a simple trajectory when launched.',
            'image' => 'red.png',
        ],
        [
            'name' => 'Blue bird',
            'description' => 'The blue bird splits into three smaller versions in mid-air when the screen is tapped.',
            'image' => 'blue.png',
        ],
        [
            'name' => 'Yellow bird',
            'description' => 'Tapping the screen after launching the yellow bird gives the critter a speed boost that makes it more deadly.',
            'image' => 'yellow.png',
        ],
        [
            'name' => 'Green bird',
            'description' => 'The green bird turns into a boomerang that doubles back to strike targets in otherwise protected locations.',
            'image' => 'green.png',
        ],
        [
            'name' => 'Big red bird',
            'description' => 'The big red bird is a flying wrecking bail that causes more damage than his smaller red cousin.',
            'image' => 'red-big.png',
        ],
    ];

    /**
     * retour la liste des oiseaux récupéres dans la abse de données
     *
     * @return void
     */
    public function getBirds() {
        return $this->birds;
    }

    /**
     * Retourne les informations en fonction de son identifiant
     *
     * @param [type] $id
     * @return void
     */
    public function getBirdById($id)
    {
        // S'il n'existe aucun oiseau avec l'id donné en paramètre, on renvoie null
        if (!isset($this->birds[$id])) {
            return;
        }
        //sinon on retourne les données associées à l'oiseau
        return $this->birds[$id];
    }
}