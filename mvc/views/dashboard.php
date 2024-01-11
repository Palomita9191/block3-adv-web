<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Library!</h1>
    <h2>Your Book List</h2>
    <ul>
        <?php foreach ($data['books'] as $book): ?>
            <li><?= htmlspecialchars($book) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="logout.php">Logout</a>
</body>
</html>
