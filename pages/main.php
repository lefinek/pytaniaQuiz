<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main panel</title>
    <script  src = "../scripts/script.js"></script>
    <link rel = "stylesheet" href="../styles/quiz.css">
</head>
<body class="flex">
    <div class="main_container">
        <form method="POST" action="../actions/login_action.php" class="fog_login_popup">
            <div class="login_popup">
                <h2>Zaloguj się</h2><p class="disappear" onclick="disappear()">X</p>
                <input type="text" placeholder="login" class="placeholder" name="login_login" autofocus/>
                <input type="password" placeholder="hasło" class="placeholder" name="login_password"/>
                <input type="submit" value="Zaloguj" class="to_login"/>
            </div>
        </form>
        <form method="POST" action="../actions/register_action.php" class="fog_register_popup">
            <div class="register_popup">
                    <h2>Zarejestruj się</h2><p class="disappear" onclick="disappear()">X</p>
                <input type="text" placeholder="login" class="placeholder" name="register_login" autofocus/>
                <input type="password" placeholder="hasło" class="placeholder" name="register_password"/>
                <input type="submit" value="Zarejestruj" class="to_sign_up"/>
            </div>
        </form>
        <div class="upper_panel">
            <div class="logo">
                <h2 class="logo_text">QuizSimple</h2>
            </div>
            <div class="main_title">
                <h2 class="main_title_text">Panel główny QuizSimple</h2>
            </div>
            <div class="action_buttons">
                <?php
                    if(!$_SESSION['login']){
                        echo '<div class="action_button_main" onclick="signUp()">Zarejestruj się</div>';
                        echo '<div class="action_button_main" onclick="logIn()">Zaloguj się</div>';
                    }
                    else{
                        echo '<div class="action_header_main">Witaj, ' . $_SESSION["login"] . '!</div>';
                        echo '<div class="action_button_main" onclick="backToMain()">Wyloguj się</div>';
                    }
                ?>
            </div>
        </div>
        <div class="main_main">
            <div class="con">
                <div class="main_panel_left">
                    <?php
                        if(!$_SESSION['login']){
                            echo 
                            '
                                <div class="center" action="quiz.php">
                                    <h2 class="encourage">Sprawdź się!</h2>
                                    <input type="button" class="to_start" onclick="logIn()" value="Rozpocznij nowy quiz!"/>
                                </div>
                            ';
                        }else{
                            echo 
                            '
                                <form class="center" action="quiz.php">
                                    <h2 class="encourage">Sprawdź się!</h2>
                                    <input type="submit" class="to_start" value="Rozpocznij nowy quiz!"/>
                                </form>
                            ';
                        }
                    ?>
                </div>
                <div class="main_panel">
                    <div>
                        <h1 class="encourage">Hall Of Fame</h1>
                    </div>
                    <div class="list">
                        <?php
                            $connect = mysqli_connect('localhost', 'root', '', 'quiz');
                            $query_results = "SELECT users.nick, round(avg(result), 2), date FROM historyAnswers join users on users.userId = historyAnswers.userId GROUP by nick order by avg(result) desc limit 3";
                            $result_results = mysqli_query($connect, $query_results);

                            echo '<ol>';
                            $xd = 1;
                            while($row = mysqli_fetch_row($result_results)){
                                if($row[0] == $_SESSION['login']){
                                    if($xd == 1){
                                        echo '<li style="color: gold">Ty średnio: ' . $row[1]. ' pkt.</li>';
                                    }
                                    else if($xd == 2){
                                        echo '<li style="color: silver">Ty średnio: ' . $row[1]. ' pkt.</li>';
                                    }
                                    else if($xd == 3){
                                        echo '<li style="color: brown">Ty średnio: ' . $row[1]. ' pkt.</li>';
                                    }
                                    $xd++;
                                }
                                else{
                                    if($xd == 1){
                                        echo '<li style="color: gold">' . $row[0]. ' średnio: ' . $row[1]. ' pkt.</li>';
                                    }
                                    else if($xd == 2){
                                        echo '<li style="color: silver">' . $row[0]. ' średnio: ' . $row[1]. ' pkt.</li>';
                                    }
                                    else if($xd == 3){
                                        echo '<li style="color: brown">' . $row[0]. ' średnio: ' . $row[1]. ' pkt.</li>';
                                    }
                                    $xd++;
                                }
                                
                            }
                            echo '</ol>';
                            mysqli_close($connect);
                        ?>
                    </div>
                </div>
            </div>
            <?php
            if(!$_SESSION['answer_9']){
                
            }
            else{
                echo '<div class="main_panel_wider">
                <iframe src="../pages/summary.php" title="Your result" class="iframe"></iframe>
                </div>';
            }
            ?>
            
        </div>
    </div>
    <div class="end">
        <p>Jacob Arrow | 2023 Wszystkie prawa zastrzeżone</p>
    </div>
</body>
</html>