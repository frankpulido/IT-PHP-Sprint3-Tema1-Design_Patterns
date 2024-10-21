<?php
declare(strict_types=1);
require "dishwasherFacade.php";

$option = 0;
$countDishes = 0;
$process_steps = 0;

echo PHP_EOL;

$countdishes = (int) readline("How many dirty dishes do you have to handle?" . PHP_EOL);

for($i = 1; $i <= $countdishes; $i++) {
    $dirtydishes[] = new DirtyDish();
}
$dishwashingmachine = new DishwasherFacade($dirtydishes);

echo PHP_EOL;
$option = (int) readline("[1] Wash one by one in the sink." . PHP_EOL . "[2] Wash in the dishwaher." . PHP_EOL . "[0] Don't wash anything. Exit." . PHP_EOL);
echo PHP_EOL;
switch ($option) {
    case 0 :
        echo "See you later, lazy alligator!!!.";
        break;
    case 1 :
        $break = random_int(0, (int) round($countDishes * 0.1));
        foreach($dirtydishes as $dirtydish) {
            echo $dirtydish->pickDirtyDish();
            echo $dirtydish->removeLeftOvers();
            echo $dirtydish->soaping();
            echo $dirtydish->rinsing();
            echo $dirtydish->letDry();
            $process_steps+=5;
        }
        echo PHP_EOL;
        echo "Several hours later..." . PHP_EOL;
        foreach($dirtydishes as $dirtydish) {
            echo $dirtydish->moveToCabinet();
            $process_steps++;
        }
        break;
    case 2 :
        echo "We used a facade pattern design for the dishwashing machine process" . PHP_EOL;
        echo PHP_EOL;
        foreach($dirtydishes as $dirtydish) {
            echo $dirtydish->pickDirtyDish();
            echo $dirtydish->removeLeftOvers();
            $process_steps+=2;
        }
        echo PHP_EOL;
        echo "You start the dishwashing machine for SOAPING - RINSING - DRYING.. You sit and watch TV" . PHP_EOL;
        $dishwashingmachine->startDishWashingMachine();
        $process_steps++;
        echo PHP_EOL;
        echo "2 hours later..." . PHP_EOL;
        foreach($dirtydishes as $dirtydish) {
            echo $dirtydish->moveToCabinet();
            $process_steps++;
        }
        break;
    default :
        echo "You should choose a valid option (0-1-2)..." . PHP_EOL;
}
echo PHP_EOL;
if ($option == 1) {echo "You have washed the dishes manually in the sink." . PHP_EOL;}
if ($option == 2) {echo "You have washed using the dishwasher and watched some TV." . PHP_EOL;}
echo PHP_EOL;
echo "The process took $process_steps steps to complete..." . PHP_EOL;
echo PHP_EOL;

?>