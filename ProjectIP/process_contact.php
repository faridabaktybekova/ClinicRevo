<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Проверка, что данные были отправлены методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];


        // // Отладка данных
        // echo "Name: $name<br>";
        // echo "Email: $email<br>";
        // echo "Message: $message<br>";

        // Подготавливаем и выполняем запрос на вставку данных
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Ошибка подготовки запроса: " . $conn->error);
        }

        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute() === TRUE) {
            echo "Ваше сообщение отправлено!";
        } else {
            echo "Ошибка: " . $stmt->error;
        }

        // Закрываем подготовленное выражение и соединение с базой данных
        $stmt->close();
        $conn->close();
    } else {
        echo "Ошибка: не все поля были заполнены.";
    }
} else {
    echo "Ошибка: данные формы не были отправлены.";
}
