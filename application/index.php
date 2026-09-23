<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three-Tier Student Registration</title>
</head>
<body>

    <h1>Three-Tier Student Registration System</h1>

    <form action="submit.php" method="POST">

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required>

        <br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required>

        <br><br>

        <button type="submit">Register</button>

    </form>

</body>
</html>