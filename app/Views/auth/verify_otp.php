<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
</head>
<body>
    <h1>Enter Verification Code</h1>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="errors">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <form action="" method="post">
        <?= csrf_field() ?>
        <div>
            <label for="code">Code</label>
            <input type="text" name="code" id="code">
        </div>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
