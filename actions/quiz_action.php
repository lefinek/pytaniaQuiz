<?php
    session_start();
    if(!empty($_POST['answer_0']) && !empty($_POST['answer_1']) && !empty($_POST['answer_2']) && !empty($_POST['answer_3']) && !empty($_POST['answer_4']) && !empty($_POST['answer_5']) && !empty($_POST['answer_6']) && !empty($_POST['answer_7']) && !empty($_POST['answer_8']) && !empty($_POST['answer_9'])){
        $connect = mysqli_connect('localhost', 'root', '', 'quiz');
        $xd = 0;
        $das = 1;
        for($i = 0; $i <10; $i++){
            $answer = $_POST["answer_".$i];
            $query = "select isItTrue, content from answers WHERE content LIKE '$answer'";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_row($result);
            if($row[0]==1){
                $_SESSION["answer_" . $i . ""] = $row[1];
                $xd++;
            }
            else{
                $_SESSION["answer_" . $i . ""] = $row[1];
            }
        }
        $_SESSION["result"] = $xd;

        $login = $_SESSION['login'];
        $date = date("Y-m-d");
        $query_get_id = "SELECT userId FROM users WHERE nick = '$login'";
        $result_get_id = mysqli_query($connect, $query_get_id);
        $row_result = mysqli_fetch_assoc($result_get_id);
        $sdasda = $row_result['userId'];

        $query_add_result = "INSERT into historyAnswers (userId, result, date) VALUES ('$sdasda', '$xd', '$date')";
        $result_add_result = mysqli_query($connect, $query_add_result);
        mysqli_close($connect);
        header("Location: ../pages/main.php");
        exit();
        }
    else{
        header("Location: ../pages/main.php");
        exit();
    }
?>