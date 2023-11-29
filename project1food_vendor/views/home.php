<!DOCTYPE html>
<html>
<head>
    <title>Food Vendor</title>
</head>
<body>
    <h1>Dishes</h1>
    <ul>
        <?php foreach ($dishes as $dish): ?>
            <li><?php echo htmlspecialchars($dish['name']); ?> - $<?php echo htmlspecialchars($dish['price']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
