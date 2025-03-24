<?php include 'point-table.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IPL 2025 Points Table</title>

    <!-- ✅ Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .table-container {
            max-width: 1000px;
            margin: auto;
        }

        .team-logo {
            height: 24px;
            vertical-align: middle;
            margin-right: 8px;
        }

        .print-btn {
            display: block;
            margin: 20px auto;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container table-container">
        <h2 class="text-primary">IPL 2025 Points Table</h2>

        <button class="btn btn-success print-btn" onclick="window.print()">🖨️ Print</button>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm bg-white">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Team</th>
                        <th>Matches</th>
                        <th>Won</th>
                        <th>Lost</th>
                        <th>Tied</th>
                        <th>No Result</th>
                        <th>Points</th>
                        <th>NRR</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($pointsTable as $row): ?>
                        <tr>
                            <td class="text-start">
                                <img src="<?= $row['team_logo'] ?>" alt="<?= $row['team_name'] ?>" class="team-logo">
                                <strong class="text-uppercase"><?= $row['team_name'] ?></strong>
                            </td>
                            <td><?= $row['matches'] ?></td>
                            <td><span class="badge bg-success"><?= $row['won'] ?></span></td>
                            <td><span class="badge bg-danger"><?= $row['lost'] ?></span></td>
                            <td><span class="badge bg-warning text-dark"><?= $row['tied'] ?></span></td>
                            <td><?= $row['nr'] ?></td>
                            <td><strong><?= $row['points'] ?></strong></td>
                            <td><?= $row['nrr'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
