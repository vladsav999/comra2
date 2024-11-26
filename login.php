<?php
session_start();

// Подключение к базе данных
$host = 'MySQL-8.2';
$db   = 'auth_db';
$user = 'root'; // Заменить на имя пользователя вашей базы данных
$pass = '';     // Заменить на пароль от вашей базы данных
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Получаем данные из формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Простое хеширование пароля

    // Проверка пользователя в базе данных
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();
    
    if ($user) {
        // Если пользователь найден и пароль совпадает
        $_SESSION['logged_in'] = true;
        header('Location: calculator.html');
        exit;
    } else {
        echo '<p style="color: red;">Ne ugadal.</p>';
    }
}
?>

<h2>Пожалуйста, войдите снова</h2>
<a href="index.php">Вернуться к форме входа</a>