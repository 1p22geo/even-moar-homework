<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css"/>
    <title>1000 digits explorer</title>
</head>
<body>

    <?php 
    session_start();
    $item_roll = ['dagger', 'scroll', 'bow'];
    $gold_roll = [5, 10, 20, 20, 25, 30, 30, 30, 30, 35, 40, 50, 1000];
    $enemy_roll = [10, 20, 25, 30, 30, 50, 50, 55, 75, 100, 150];
    $rare_roll = ['the crown', 'fire'];
    $damage = array('dagger' => 25, 'scroll' => 60, 'fire' => 300, 'bow' => 30);
    if(empty($_SESSION['ahh'])||!$_SESSION['ahh'])
    {
    $_SESSION['ahh'] = 1;
    $_SESSION['fighting'] = 0;
    $_SESSION['found chests'] = 0;
    $_SESSION['health'] = 100;
    $_SESSION['gold'] = 0;
    $_SESSION['inventory'] = [];
    $_SESSION['terrain'] = [
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0], //1
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],//2
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],//3
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],//4
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],//5
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],//6
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],//7
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],//8
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],//9
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ],
    [
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0],
    ]
    ];

    $_SESSION['player x'] = random_int(0,9);
    $_SESSION['player y'] = random_int(0,9);
    $_SESSION['player z'] = random_int(0,9);

    

    for($i = 0;$i < 7 && $i >= 0;$i++){
        $_SESSION['terrain'][random_int(0,9)][random_int(0,9)][random_int(0,9)] = 3;
    }
    for($i = 0;$i < 15 && $i >= 0;$i++){
        $_SESSION['terrain'][random_int(0,9)][random_int(0,9)][random_int(0,9)] = 4;
    }
    $_SESSION['terrain'][$_SESSION['player x']][$_SESSION['player y']][$_SESSION['player z']] = 1;
    }  //THE END OF ONE-TIME INIT

    if(random_int(0,7) == 7){
        $x = random_int(0,9);
        $y = random_int(0,9);
        $z = random_int(0,9);
        if($_SESSION['terrain'][$x][$y][$z] != 1){
        $_SESSION['terrain'][$x][$y][$z] = 4;
        }
    }
    
    if(!empty($_POST['move'])){
        $_SESSION['terrain'][$_SESSION['player x']][$_SESSION['player y']][$_SESSION['player z']] = 0;
        switch($_POST['move']){
            case "U":
                if(($_SESSION['player y']<9) && !$_SESSION['fighting']){
                    $_SESSION['player y'] += 1;
                }
                break;
            case "D":
                if(($_SESSION['player y']>0) && !$_SESSION['fighting']){
                    $_SESSION['player y'] -= 1;
                }
                break;
            case "L":
                if(($_SESSION['player z']>0) && !$_SESSION['fighting']){
                    $_SESSION['player z'] -= 1;
                }
                break;
            case "R":
                if(($_SESSION['player z']<9) && !$_SESSION['fighting']){
                    $_SESSION['player z'] += 1;
                }
                break;
            case "F":
                if(($_SESSION['player x']<9) && !$_SESSION['fighting']){
                    $_SESSION['player x'] += 1;
                }
                break;
            case "B":
                if(($_SESSION['player x']>0) && !$_SESSION['fighting']){
                    $_SESSION['player x'] -= 1;
                }
                break;
            case "Reset":
                $_SESSION['ahh'] = 0;
                $_SESSION['fighting'] = 0;
                break;
            case "O":
                if($_SESSION['found chests']>0){
                $rarity = random_int(0,10);
                if($rarity <=7){
                    array_push($_SESSION['inventory'], $item_roll[array_rand($item_roll,1)]);
                }
                else if($rarity <=10){
                    array_push($_SESSION['inventory'], $rare_roll[array_rand($rare_roll,1)]);
                }
                $_SESSION['found chests'] -=1;
                }
                break;
            case '':
                break;
            default:
                if (in_array($_POST['move'], $_SESSION['inventory'])){
                    $index = array_search($_POST['move'], $_SESSION['inventory']);
                    array_splice($_SESSION['inventory'],$index,1);
                    if (!empty($damage[$_POST['move']])){
                        $_SESSION['fighting'] -= $damage[$_POST['move']];
                        if($_SESSION['fighting']<0){
                            $_SESSION['fighting']=0;
                            $_SESSION['gold'] += $gold_roll[array_rand($gold_roll,1)];
                            //YOU WIN
                        }
                    }
                }
                else{
                    $coordinates = explode(' ',$_POST['move']);
                    if(count($coordinates) == 3){
                        if(($coordinates[0]>=0)&&($coordinates[0]<=9)&&($coordinates[1]>=0)&&($coordinates[1]<=9)&&($coordinates[2]>=0)&&($coordinates[2]<=9)){
                            if(in_array('the crown', $_SESSION['inventory'])){
                                $_SESSION['terrain'][$coordinates[0]][$coordinates[1]][$coordinates[2]] = 0;
                            }
                        }
                    }
                }
        }
        switch($_SESSION['terrain'][$_SESSION['player x']][$_SESSION['player y']][$_SESSION['player z']]){
            case 0:
                $_SESSION['terrain'][$_SESSION['player x']][$_SESSION['player y']][$_SESSION['player z']] = 1;
                break;
            case 3:
                $_SESSION['found chests'] +=1;
                $_SESSION['terrain'][$_SESSION['player x']][$_SESSION['player y']][$_SESSION['player z']] = 1;
                break;
            case 4:
                $_SESSION['fighting'] = $enemy_roll[array_rand($enemy_roll,1)];
                
                break;
        }
        //$_SESSION['terrain'][$_SESSION['player x']][$_SESSION['player y']][$_SESSION['player z']] = 1;
        if($_SESSION['ahh']){
        header('Location: index.php');
        exit();
        }
        else{
            echo '<h1>YOU DIED</h1><h2>refresh the page or click Continue</h2>';
        }
    }


    $view_x = [];
    for($i = 0;$i < 10 && $i >= 0;$i++){
        $view_x[$i] = $_SESSION['terrain'][$i][$_SESSION['player y']][$_SESSION['player z']];
    }
    $view_y = [];
    for($i = 0;$i < 10 && $i >= 0;$i++){
        $view_y[$i] = $_SESSION['terrain'][$_SESSION['player x']][$i][$_SESSION['player z']];
    }
    $view_z = [];
    for($i = 0;$i < 10 && $i >= 0;$i++){
        $view_z[$i] = $_SESSION['terrain'][$_SESSION['player x']][$_SESSION['player y']][$i];
    }
    ?>
    <div id="main">
    
    <section>
    <p>The goal of the game is to explore a 3-dimentional world contained in 1000 digits arranged in a 10&nbspx&nbsp10&nbspx&nbsp10&nbspcube. You have to collect and open chests to find unique items. You are also supposed to fight against different enemies for powerful loot and gain power...</p>
    <p>The digits mean:</p>
    <ul>
        <li>0 - empty tile</li>
        <li>1 - the player</li>
        <li>3 - a treasure chest</ls>
        <li>4 - an enemy</ls>
    </ul>
    <?php
    if(!$_SESSION['fighting']){
    echo '<h4>View on X:</h4>';
    echo '<h2 style="color:blue;">'.implode(' ', $view_x)."</h2>";
    echo '<h4>View on y:</h4>';
    echo '<h2 style="color:blue;">'.implode(' ', $view_y)."</h2>";
    echo '<h4>View on z:</h4>';
    echo '<h2 style="color:blue;">'.implode(' ', $view_z)."</h2>";
    }
    else{
        echo '<h1>Enemy health: '.$_SESSION['fighting'].'</h1>';
    }
    
    
    ?>

    <form method="post" action="index.php">
    <h4>Choose one of the following:</h4>
    <ul>
        <li><b>L</b> to go left</li>
        <li><b>R</b> to go right</li>
        <li><b>D</b> to go down</li>
        <li><b>U</b> to go up</li>
        <li><b>F</b> to go forward</li>
        <li><b>B</b> to go backward</li>
        <li><b>O</b> to open one of your chests</li>
        <li>some coordinates in the array (as 'x y z') to use a long-range weapon</li>
        <li>anything else to use an item</li>
    </ul>
    <input type="text" name="move">
    <input type="submit" value="Continue">
    
    </section>
    
    </form>
    <section>
    <h2>INVENTORY</h2>
    <h3>Current chests: <?php echo $_SESSION['found chests']; ?></h3>
    <h3>Current gold: <?php echo $_SESSION['gold']; ?></h3>
    <h3>The items you own :</h3>
    <p><?php echo implode('<br/>',$_SESSION['inventory']);?></p>
    </section>
</div>
</body>
</html>