<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My tasks</title>
</head>
<body>
    <h1>My tasks</h1>

    <p>
        Welcome, <strong><?= esc($username) ?></strong>.
        You can see this page because you are logged in.
    </p>

    <ul>
        <li>Read the sessions lesson.</li>
        <li>Explain password hashing.</li>
        <li>Test the protected route.</li>
    </ul>

    <form method="post" action="<?= site_url('logout') ?>">
        <?= csrf_field() ?>
        <button type="submit">Log out</button>
    </form>
</body>
</html>