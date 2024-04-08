<?php

class RequestWrapper {
    public static function get($key) {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    public static function post($key) {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    public static function all() {
        return $_REQUEST;
    }
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = RequestWrapper::post('username');
    $password = RequestWrapper::post('password');

    if ($username === 'user' && $password === 'pass') {
        session_start();
        $_SESSION['username'] = $username;

        setcookie('authenticated', 'true', time() + 3600, '/');
        exit;
    } else {
        echo "Wrong username or password!!";
    }
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $searchQuery = RequestWrapper::get('search');
    if ($searchQuery) {
        echo "You search: $searchQuery";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
</head>
<body>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Log in</button>
    </form>

    <form method="get" action="">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search"><br>
        <button type="submit">Search</button>
    </form>
</body>
</html>

