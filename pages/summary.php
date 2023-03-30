<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz summary</title>
    <script  src = "../scripts/script.js"></script>
    <link rel = "stylesheet" href="../styles/quiz.css">
</head>
<body>
    <div class="container">
        <div class="header_summary">
            <h1>Sprawdź, jak Ci poszło!</h1>
        </div>
        <div class="main_summary">
            <div class="your_result">
                <?php
                    if($_SESSION["result"]<=4){
                        echo '<h2 class="quiz_text">Twój wynik to: <span style="color: red">'. $_SESSION["result"] . '</span>/10</h2>';
                        echo '<p class="motivation">Nie przejmuj się! Następnym razem pójdzie lepiej!</p>';
                    }
                    else if($_SESSION["result"]>=5 && $_SESSION["result"]<=7){
                        echo '<h2 class="quiz_text">Twój wynik to: <span style="color: yellow">'. $_SESSION["result"] . '</span>/10</h2>';
                        echo '<p class="motivation">Jest nieźle! Tak trzymaj!</p>';
                    }
                    else if($_SESSION["result"]>=8 && $_SESSION["result"]<=9){
                        echo '<h2 class="quiz_text">Twój wynik to: <span style="color: green">'. $_SESSION["result"] . '</span>/10</h2>';
                        echo '<p class="motivation">Było bardzo blisko. Następnym razem rozwalisz system!</p>';
                    }
                    else if($_SESSION["result"]==10){
                        echo '<h2 class="quiz_text">Twój wynik to: <span class="shiny">'. $_SESSION["result"] . '/10</span></h2>';
                        echo '<p class="motivation">Rozwaliłeś system. Gratulacje!!!!</p>';
                    }
                    
                ?>
            </div>
            <div class="quiz_start">
            </div>
            <div class="quiz_text">
                <h2>Poznaj swoje i poprawne odpowiedzi!</h2>
            </div>
            <div class="demostrate">
                <?php
                    $connect = mysqli_connect('localhost', 'root', '', 'quiz');
                    $asd = 0;
                    while($asd <= 9){
                        $query_find_questionId = "SELECT questions.questionId FROM questions join  answers on questions.questionId = answers.questionId where answers.content = '" . $_SESSION['answer_' . $asd . ''] . "'";
                        $resut_find_questionId = mysqli_query($connect, $query_find_questionId);
                        $row1 = mysqli_fetch_row($resut_find_questionId);
                        $query_questions = "Select content, category, questionId from questions where questionId = '$row1[0]'";
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


                        $query_answers = "select content, rand() from answers where questionId = '$row1[0]' order by rand()";
                        $result_answers = mysqli_query($connect, $query_answers);
                        $query_corret_answer = "SELECT answers.content FROM answers join questions on questions.questionId = answers.questionId WHERE questions.questionId = '$row1[0]' and isItTrue = 1";
                        $result_correct_answer = mysqli_query($connect, $query_corret_answer);
                        $rowek = mysqli_fetch_row($result_correct_answer);
                        $r = 0;
                        while($row = mysqli_fetch_row($result_answers)){

                            if($row[0] == $rowek[0]){
                                echo '<div class ="answer answer_summary" style="background-color: green;">';
                                echo $row[0];
                                echo '</div>';
                            }
                            elseif($row[0] == $_SESSION['answer_' . $asd . '']){
                                echo '<div class ="answer answer_summary" style="background-color: red;">';
                                echo $row[0];
                                echo '</div>';
                            }
                            else{
                                echo '<div class ="answer answer_summary">';
                                echo $row[0];
                                echo '</div>';
                            }
                            
                            
                        

                            $r++;
                        }
                        echo '</div>';
                        echo '</div>';
                        
                        $asd++;
                    }
                    
                ?>
            </div>
            <div class="quiz_start">
            </div>
        </div>
    </div>
</body>
</html>