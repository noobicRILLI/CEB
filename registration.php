
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form form action="assets/php/log/reg.php" method="post">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="phone">Номер телефона</label>
        <input type="phone" id="phone" name="phone" required><br>

        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>
