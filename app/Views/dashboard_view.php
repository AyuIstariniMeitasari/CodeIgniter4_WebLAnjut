<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="text-center mb-4">
    <h4 class="text-secondary">Hallo <strong><?= esc($user_name) ?></strong> 👋</h4>
        <h2 class="text-primary mt-2">📋 Daftar Tugas</h2>
        <p class="text-muted">Kelola dan ekspor tugasmu dengan mudah</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($tasks as $task): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($task['title']) ?></td>
                        <td>
                            <?php if($task['status'] == 'Selesai'): ?>
                                <span class="badge bg-success"><?= esc($task['status']) ?></span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark"><?= esc($task['status']) ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                <a href="<?= base_url('/export/pdf') ?>" class="btn btn-danger me-2">
                    <i class="bi bi-file-earmark-pdf-fill"></i> Download PDF
                </a>
                <a href="<?= base_url('/export/excel') ?>" class="btn btn-success">
                    <i class="bi bi-file-earmark-excel-fill"></i> Download Excel
                </a>
            </div>

            <div class="text-center mt-4">
                <a href="<?= base_url('/logout') ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</body>
</html>
