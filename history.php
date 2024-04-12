<?php
declare(strict_types=1);

require_once('../../config.php');

require_login();

global $DB;

$PAGE->set_url('/blocks/calculator/history.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_title('История');
$PAGE->set_heading('История');

echo $OUTPUT->header();

$sql = "SELECT * FROM {calculator}";
$records = $DB->get_records_sql($sql);
?>
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

<?php

echo $OUTPUT->footer();