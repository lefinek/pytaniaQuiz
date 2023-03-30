<?php
    session_start();
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - sprawdź się!</title>
    <script  src = "../scripts/script.js"></script>
    <link rel = "stylesheet" href="../styles/quiz.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Quiz - sprawdź swoją wiedzę!</h1>
            <p class="intotext">Za chwilę będziesz mieć szansę odpowiedzieć na losowych dziesięć pytań. Pytania są w kategoriach: geografia, historia, piłka nożna, astronomia, etyka, język polski, języki obce, polityka, technologia oraz filmy. Za wykonanie quizu można dostać maksyamlnie dziesięć punktów. Życzę powodzenia! </p>
            <p class="sign">by Jacob Arrow</p>
        </div>
        <div class="quiz_start">
        </div>
        <form action="../actions/quiz_action.php" method="POST">
        <div class="quiz_questions">
            <?php

                $array = array();
                for($i = 1; $i <=20; $i++){
                    $array[] = $i;
                }
                
                $result_numbers = array();
                for($j = 0; $j<=9; $j++){
                    $result_index = array_rand($array,1);
                    $result_numbers[] = $array[$result_index];
                    unset($array[$result_index]);
                }

                $connect = mysqli_connect('localhost', 'root', '', 'quiz');
                $query_questions = "Select * from questions";

                $xdd = 0;
                $ygu = ['A. ', 'B. ', 'C. ', 'D. '];
                while($xdd <= 9){
                    $query_questions = "Select content, category, questionId from questions where questionId = '$result_numbers[$xdd]'";
                    $reslut_questions = mysqli_query($connect, $query_questions);
                    $row_question = mysqli_fetch_row($reslut_questions);
                    
                    echo '<div class="question">';
                    echo '<div class="question_head">';
                    echo '<div class="question_content">';
                    echo $row_question[0];
                    echo '</div>';
                    echo '<div class="question_category">';
                    echo 'kategoria: ' . $row_question[1] . '';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="answers">';

                    $query_answers = "select content, rand() from answers where questionId = '$result_numbers[$xdd]' order by rand()";
                    $result_answers = mysqli_query($connect, $query_answers);
                    $r = 0;
                    while($row = mysqli_fetch_row($result_answers)){
                        echo '<input type="radio" id = "answer_inpucik_' . $xdd.$r . '" name="answer_'. $xdd . '" value = "'.$row[0].'" style="appearance: none;display: none; "/>';
                        echo '<label id="' . $xdd.$r . '" onclick="select(event)" class ="answer answer_input" for="answer_inpucik_' . $xdd.$r . '" style="padding-top:10px; padding-bottom: 10px">';
                        echo $ygu[$r].$row[0];
                        echo '</label>';
                        echo '<input type="hidden" name="hidden_question_id_' . $row_question[2] . '" value="' . $row_question[2] . '"/>';
                        

                        $r++;
                    }
                    echo '</div>';
                    echo '</div>';

                    $xdd++;
                }
            ?>
        </div>
        <div class="submitting">
            <input type="submit" value="Zakończ!" id="submit_button">
        </div>
        </form>
        <div class="quiz_start" style="margin-bottom: 30px;">
        </div>
        <div class="footer">
            <p class="intotext centering">Dziękuję za wypełnienie mojego quizu! Liczę, że SUPER Tobie poszło.</p>
            <p class="intotext centering">Do następnego razu!</p>
            <p class="sign centering" style="padding-top: 3vh; margin-bottom: 0px">Jacob Arrow | 2023 Wszystkie prawa zastrzeżone</p>
        </div>
    </div>
</body>
</html>