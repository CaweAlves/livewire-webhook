<?php

namespace App;

final class Characters
{

    private array $characters = [];

    public function __construct()
    {
        $this->characters = [
            "Frodo Baggins",
            "Samwise Gamgee",
            "Gandalf",
            "Aragorn",
            "Legolas",
            "Gimli",
            "Boromir",
            "Pippin",
            "Merry",
            "Éowyn",
            "Faramir",
            "Galadriel",
            "Elrond",
            "Saruman",
            "Gollum",
            "Théoden",
            "Treebeard",
            "Radagast",
            "Celeborn",
            "Denethor",
        ];
    }

    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function getRandomCharacter(): string
    {
        return $this->characters[random_int(0, sizeof($this->characters) - 1)];
    }
}
