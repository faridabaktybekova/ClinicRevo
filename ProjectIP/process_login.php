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

// Получение данных из формы входа
$login = $_POST['login'];
$password = $_POST['password'];

// Подготовка и выполнение запроса к базе данных для проверки учетных данных
$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss", $login, $password);
$stmt->execute();

// Получение результатов запроса
$result = $stmt->get_result();

// Проверка, были ли найдены учетные данные
if ($result->num_rows == 1) {
    // Успешный вход - перенаправление на главную страницу или другую страницу по вашему выбору
    header("Location: index.html");
    exit();
} else {
    // Неверные учетные данные - вывод ошибки или другой обработчик ошибок
    echo "Неверное имя пользователя или пароль.";
}

// Закрытие соединения с базой данных и подготовленного выражения
$stmt->close();
$conn->close();
