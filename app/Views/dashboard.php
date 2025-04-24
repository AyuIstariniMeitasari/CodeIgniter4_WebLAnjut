<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">CI4 Auth</a>
            <div class="d-flex">
                <span class="me-3"><?= session()->get('userData')['name'] ?></span>
                <a href="/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome to Dashboard!</h1>
        <p>Email: <?= session()->get('userData')['email'] ?></p>
    </div>
</body>
</html>