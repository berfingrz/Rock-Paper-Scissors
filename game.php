<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0,minimum-scakle=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ROCK - PAPER - SCISSORS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Container -->
    <div class="box">
        <h3>ROCK PAPER SCISSORS</h3>
        <form action="game.php" method="post" autocomplete="off">
            <input type="choice" name="choice" placeholder="Enter your choice (Rock / Paper / Scissors)" required class="form-control" />
            <input type="submit" name="shoot" value="Shoot" class="btn btn-success" />
        </form>
        <?php
        
        $playerA = 0;
        $playerB = 0;
        $draw = 0;
        for ($i = 1; $i <= 10; $i++) {
            //check button
            if (isset($_POST['shoot'])) {
                $choice = $_POST['choice'];
                $compChoice = rand(0, 2);
            
                if ($choice == "") {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Please enter a valid choice!</div>";
                } elseif ($choice == "Rock" || $choice == "Paper" || $choice == "Scissors") {
                    echo "<div class=\"alert alert-info\" role=\"alert\">Round: $i</div>"; 
                    echo "<div class=\"alert alert-dark\" role=\"alert\">Player A: $choice</div>";

                    // If the random number is 0 it means rock
                    // If the random number is 1 it means paper
                    // If the random number is 2 it means scissors

                    switch ($compChoice) {
                        case 0:
                            echo "<div class=\"alert alert-warning\" role=\"alert\">Player B: Rock</div>";
                            break;
                        case 1:
                            echo "<div class=\"alert alert-warning\" role=\"alert\">Player B: Paper</div>";
                            break;
                        case 2:
                            echo "<div class=\"alert alert-warning\" role=\"alert\">Player B: Scissors</div>";
                            break;
                        default:
                            break;
                    }

                    if (($choice == "Rock" && $compChoice == 0) || ($choice == "Paper" && $compChoice == 1) || ($choice == "Scissors" && $compChoice == 2)) {
                        echo "<div class=\"alert alert-info\" role=\"alert\">Same choice: It is a draw...</div>";
                        $draw++;
                        break;
                    } elseif (($choice == "Rock" && $compChoice == 2)) {
                        echo "<div class=\"alert alert-success\" role=\"alert\">Rock crushers Scissors: Player A wins...</div>";
                        $playerA++;
                        break;
                    } elseif (($choice == "Paper" && $compChoice == 0)) {
                        echo "<div class=\"alert alert-success\" role=\"alert\">Paper covers Rock: Player A wins...</div>";
                        $playerA++;
                        break;
                    } elseif (($choice == "Scissors" && $compChoice == 1)) {
                        echo "<div class=\"alert alert-success\" role=\"alert\">Scissors cut Paper: Player A wins...</div>";
                        $playerA++;
                        break;
                    } else {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">Paper covers Rock: Player B wins...</div>";
                        $playerB++;
                        break;
                    }
                } else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Please enter a valid choice!</div>";
                }
            }
        }
        echo "<div class=\"alert alert-danger\" role=\"alert\">Player A: $playerA wins</div>";
        echo "<div class=\"alert alert-danger\" role=\"alert\">Player B: $playerB wins</div>";
        echo "<div class=\"alert alert-danger\" role=\"alert\">$draw Games were a draw. </div>";
        ?>
    </div>
</body>

</html>