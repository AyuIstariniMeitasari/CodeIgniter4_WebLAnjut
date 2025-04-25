<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2><?= $title ?></h2>
    <table>
        <tr><th>No</th><th>Nama Tugas</th></tr>
        <?php foreach ($items as $i => $item): ?>
        <tr><td><?= $i+1 ?></td><td><?= $item ?></td></tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
