<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Revo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка, были ли переданы данные из формы
if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])) {
    // Получение данных из формы
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Выполнение запроса к базе данных (например, вставка данных в таблицу)
    $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "Новая запись создана успешно!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $message = "Ошибка: не все поля были заполнены.";
}

// HTML и CSS для стилизации
$htmlHeader = <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- normalize css -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/main.css">
    <!-- custom styles for welcome page -->
    <style>
        /* Стили специфичные для welcome.php */
        .welcome-page .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .welcome-page .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body class="welcome-page">
    <!-- header -->
    <header class="header bg-blue">
        <nav class="navbar bg-blue">
            <div class="container flex">
                <a href="index.html" class="navbar-brand">
                    <img src="images/logo.png" alt="site logo">
                </a>
                <button type="button" class="navbar-show-btn">
                    <img src="images/ham-menu-icon.png" alt="menu icon">
                </button>
                <div class="navbar-collapse bg-white">
                    <button type="button" class="navbar-hide-btn">
                        <img src="images/close-icon.png" alt="close icon">
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Выйти</a>
                        </li>
                    </ul>
                    <div class="search-bar">
                        <form>
                            <div class="search-bar-box flex">
                                <span class="search-icon flex">
                                    <img src="images/search-icon-dark.png" alt="search icon">
                                </span>
                                <input type="search" class="search-control" placeholder="Найти здесь">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <section id="welcome" class="welcome py">
            <div class="container text-center text-white">
                <h1><br><br>Добро пожаловать!</h1>
                <p class="lead"><br>$message</p>
                <br><br>
                <a href="index.html" class="btn">Назад</a>
            </div>
        </section>
    </header>
    <!-- end of header -->

    <!-- custom js -->
    <script src="js/script.js"></script>
</body>

</html>
HTML;

echo $htmlHeader;
