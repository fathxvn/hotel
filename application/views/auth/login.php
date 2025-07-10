<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Hotel App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            max-width: 400px;
            width: 100%;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            padding: 30px;
        }

        .login-card .logo {
            width: 50px;
            height: 50px;
        }

        .login-card h4 {
            font-weight: 600;
            color: #0d47a1;
            margin-top: 15px;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            border-radius: 6px;
        }

        .text-muted {
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<div class="login-card text-center">
    <link rel="icon" type="image/gif" href="<?= base_url('assets/img/favicon.gif') ?>">
    <h4 class="mb-3">Login Aplikasi Hotel</h4>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger text-start"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login_process') ?>">
        <div class="mb-3 text-start">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-2">Masuk</button>
    </form>

    <p class="text-muted mt-4">Level akses: Admin | Manager | Resepsionis</p>
</div>

</body>
</html>
