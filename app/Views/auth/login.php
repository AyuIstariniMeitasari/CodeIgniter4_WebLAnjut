<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 500px">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="text-center mb-4">Login</h2>
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/login') ?>" method="post">
                    <input type="email" name="email">
                    <input type="password" name="password">
                    <button type="submit">Login</button>
                </form>
                
                <div class="mt-3 text-center">
                    Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar disini</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>