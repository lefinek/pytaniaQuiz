<?php
    error_reporting(0);
    session_start();
    session_destroy();
    if(!empty($_POST['register_login']) && !empty($_POST['register_password'])){
        session_start();
        $login = $_POST['register_login'];
        $password = sha1($_POST['register_password']);
        
        $connect = mysqli_connect('localhost', 'root', '', 'quiz');
        $query = "SELECT * FROM users WHERE nick = '$login' AND password = '$password'";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) == '1'){
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
                        <p>Takie konto już istnieje</p>
                        <input type="button" onclick="backToMain()" value="Wróć na stronę główną" />
                    </div>
                </div>
            </body>
            </html>
        ';
            exit();
        }
        else{
            $query_add_account = "INSERT into users (nick, password) VALUES ('$login', '$password')";
            $result_add_account = mysqli_query($connect, $query_add_account);
            header("Location: ../pages/main.php");
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