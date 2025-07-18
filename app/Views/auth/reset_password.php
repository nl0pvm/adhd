<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <?php if (isset($error)): ?>
        <div class="errors">
            <?= esc($error) ?>
        </div>
    <?php endif; ?>
    <form action="?token=<?= urlencode($token) ?>" method="post">
        <?= csrf_field() ?>
        <div>
            <label for="password">New Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Update Password</button>
    </form>
</body>
</html>
