<?php
declare(strict_types=1);

global $DB;

$sql = "SELECT * FROM {calculator}";

$records = $DB->get_records_sql($sql);
?>

<div class="header">
    <h3>История</h3>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>a</th>
        <th>b</th>
        <th>c</th>
        <th>x1</th>
        <th>x2</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($records as $record) : ?>
        <tr class="body-tr">
            <td><?= $record->a ?></td>
            <td><?= $record->b ?></td>
            <td><?= $record->c ?></td>
            <td><?= $record->x1 ?? 'Нет решения' ?></td>
            <td><?= $record->x2 ?? 'Нет решения' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    a {
        text-decoration: none;
        color: blue;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .body-tr:nth-child(2n) {
        background-color: #f9f9f9;
    }
</style>
