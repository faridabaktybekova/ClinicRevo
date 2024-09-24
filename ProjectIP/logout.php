<?php
session_start();
session_unset();
session_destroy();
header("Location: signin.html"); // Перенаправление на страницу входа после выхода из системы
exit();
?>
