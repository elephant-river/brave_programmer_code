<?php
    require_once "modules/Victim.php";
    require_once "modules/Person.php";

    $result = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && (
            $_POST['age_a'] && $_POST['year_a'] && $_POST['age_b'] && $_POST['year_b'])
    ) {
        $victim = new Victim();

        $personA = new Person();
        $personA->age = $_POST['age_a'];
        $personA->year = $_POST['year_a'];

        $personB = new Person();
        $personB->age = $_POST['age_b'];
        $personB->year = $_POST['year_b'];

        $victim->persons = array($personA, $personB);
        $result = $victim->compute();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Brave Programmer Code</title>
    </head>
    <body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div>
            <label>
                Person A<br>
                <input type="number" name="age_a" placeholder="Age of Death">
                <input type="number" name="year_a" placeholder="Year of Death">
            </label>
        </div>

        <br>

        <div>
            <label>
                Person B<br>
                <input type="number" name="age_b" placeholder="Age of Death">
                <input type="number" name="year_b" placeholder="Year of Death">
            </label>
        </div>

        <br>

        <div>
            <h3>Average</h3>
            <h1>
                <?php echo $result ?>
            </h1>
        </div>

        <br>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    </body>
</html>