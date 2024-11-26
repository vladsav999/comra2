<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Avtorizatsiya</title>
</head>
<style>
.main{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: brown;
    height: 30%;
    width: 30%;
    color: rgb(221, 192, 167); /* Белый текст */
}
body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Высота вьюпорта */
            margin: 0;
            background-color: #f0f0f0; /* Цвет фона страницы */
        }

</style>
<body>
    <div class="main">
    <form action="login.php" method="post">
        <h2>Vhod v calculator</h2>
        <label for="username">Imya pol'zovatelya:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Parol':</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Voyti</button>
    </form>
</div>
</body>
</html>