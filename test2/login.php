<?php
session_start();

// ����������� � ���� ������
$host = 'MySQL-8.2';
$db   = 'auth_db';
$user = 'root'; // �������� �� ��� ������������ ����� ���� ������
$pass = '';     // �������� �� ������ �� ����� ���� ������
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

// �������� ������ �� �����
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // ������� ����������� ������

    // �������� ������������ � ���� ������
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();
    
    if ($user) {
        // ���� ������������ ������ � ������ ���������
        $_SESSION['logged_in'] = true;
        header('Location: calculator.html');
        exit;
    } else {
        echo '<p style="color: red;">Ne ugadal.</p>';
    }
}
?>

<h2>����������, ������� �����</h2>
<a href="index.php">��������� � ����� �����</a>