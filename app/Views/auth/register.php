<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <?php if (isset($validation)): ?>
        <div class="errors">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <form action="" method="post">
        <?= csrf_field() ?>
        <div>
            <label for="username">Name</label>
            <input type="text" name="username" id="username" value="<?= old('username') ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id">
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role['id'] ?>" <?= set_select('role_id', $role['id']) ?>>
                        <?= esc($role['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>
