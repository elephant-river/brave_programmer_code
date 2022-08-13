<?php

class Victim {
    public array $persons;

    public function __constructor(array $persons) {
        $this->persons = $persons;
    }

    // Checking year of person
    protected function check(int $number): ?int
    {
        $result = array(0, 1);

        for ($i = 1; $i < $number; $i++) {
            $result[] = ($result[$i] + $result[$i - 1]);
        }

        return array_sum($result);
    }

    // Computing average of person
    public function compute(): float
    {
        $result = 0;

        foreach ($this->persons as $person) {
            $temp = ($person->year - $person->age);
            if ($temp < 0) {
                $result = -1;

                // Break if $result equal to "-1"
                break;
            } else {
                $result += $this->check($temp);
            }
        }

        // Condition if $result wasn't equal to "-1"
        if ($result != -1) {
            $result = $result / 2;
        }

        return $result;
    }
}