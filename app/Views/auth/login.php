<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
</head>
<body>
    <h1>Log in</h1>

    <?php if ($error !== null): ?>
        <p role="alert"><?= esc($error) ?></p>
    <?php endif ?>

    <form method="post" action="<?= site_url('login') ?>">
        <?= csrf_field() ?>

        <label for="username">Username</label>
        <input
            id="username"
            name="username"
            autocomplete="username"
            maxlength="100"
            required
        >

        <label for="password">Password</label>
        <input
            id="password"
            name="password"
            type="password"
            autocomplete="current-password"
            required
        >

        <button type="submit">Log in</button>
    </form>
</body>
</html>