<?php

use PHPUnit\Framework\TestCase;

// "Victim.php" import class "Victim()"
require_once "modules/Victim.php";

// "Person.php" import class "Person()"
require_once "modules/Person.php";

class Test extends TestCase
{
    // Positive Case : if person who born after witch took control

    /** @test */
    public function validCase() {
        $victim = new Victim();

        $personA = new Person();
        $personA->age = 10;
        $personA->year = 12;

        $personB = new Person();
        $personB->age = 13;
        $personB->year = 17;

        $victim->persons = array($personA, $personB);
        $this->assertGreaterThan(-1, $victim->compute());
    }


    // Negative Case : if person who born before the witch took control

    /** @test */
    public function invalidCase() {
        $victim = new Victim();

        $personA = new Person();
        $personA->age = 13;
        $personA->year = 12;

        $personB = new Person();
        $personB->age = 13;
        $personB->year = 17;

        $victim->persons = array($personA, $personB);
        $this->assertEquals(-1, $victim->compute());
    }
}

