<?php
    error_reporting(0);
    session_start();
    session_destroy();
    if(!empty($_POST['login_login']) && !empty($_POST['login_password'])){
        session_start();
        $login = $_POST['login_login'];
        $password = sha1($_POST['login_password']);
        
        $connect = mysqli_connect('localhost', 'root', '', 'quiz');
        $query = "SELECT * FROM users WHERE nick = '$login' AND password = '$password'";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) == '1'){
            $_SESSION['login'] = $_POST['login_login'];
            $_SESSION['password'] = sha1($_POST['login_password']);
            header("Location: ../pages/main.php");
            exit();
        }
        else{
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            echo 
        '
            <!DOCTYPE html>
            <html lang="pl">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Unexpected Failure</title>
                <script  src = "../scripts/script.js"></script>
                <link rel = "stylesheet" href="../styles/quiz.css">
            </head>
            <body>
                <div class="container_fail">
                    <div class="fail_popup">
                        <h1>Błąd!</h1>
                        <p>Hasło lub login są nieprawidłowe</p>
                        <input type="button" onclick="backToMain()" value="Wróć na stronę główną" />
                    </div>
                </div>
            </body>
            </html>
        ';
            exit();
        }
    }
    else{
        echo 
        '
            <!DOCTYPE html>
            <html lang="pl">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Unexpected Failure</title>
                <script  src = "../scripts/script.js"></script>
                <link rel = "stylesheet" href="../styles/quiz.css">
            </head>
            <body>
                <div class="container_fail">
                    <div class="fail_popup">
                        <h1>Błąd!</h1>
                        <p>Nie podano loginu lub hasła</p>
                        <input type="button" onclick="backToMain()" value="Wróć na stronę główną" />
                    </div>
                </div>
            </body>
            </html>
        ';
        exit();
    }
?>