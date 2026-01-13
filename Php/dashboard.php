<?php
session_start();

/* Example role */
$user_role = "admin";

/* Student data */
$student_balance = 1500.75;
$student_fines   = 200.00;

/* Admin data */
$total_fines    = 5000.00;
$total_income   = 20000.00;
$total_expenses = 15000.00;

$event_names    = ["Foundation Day", "Sportsfest", "Cultural Night"];
$event_expenses = [5000, 7000, 3000];

/* Sample transactions */
$transactions = [
    ["id" => 1, "name" => "Juan Dela Cruz", "type" => "Fine", "status" => "Pending", "date" => "2025-01-10"],
    ["id" => 2, "name" => "Maria Santos", "type" => "Payment", "status" => "Paid", "date" => "2025-01-08"],
    ["id" => 3, "name" => "Pedro Reyes", "type" => "Fine", "status" => "Paid", "date" => "2025-01-05"],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Finance Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="../Js/dashboard.js"></script>
</head>
<body>

<div class="dashboard-container">

    <!-- HEADER -->
    <header class="dashboard-header">
        <h1>Financial Dashboard</h1>
        <div class="header-actions">
            <a href="homepage.php" class="back-btn">← Back</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <!-- STUDENT CARDS -->
    <div class="cards">
        <div class="card">
            <h2>Current Balance</h2>
            <p>₱<?= number_format($student_balance, 2); ?></p>
        </div>
        <div class="card">
            <h2>Pending Fines</h2>
            <p>₱<?= number_format($student_fines, 2); ?></p>
        </div>
    </div>

<?php if ($user_role === "admin"): ?>
    <hr>

    <!-- ADMIN CARDS -->
    <div class="admin-cards">
        <div class="card">
            <h3>Total Student Fines</h3>
            <p>₱<?= number_format($total_fines, 2); ?></p>
        </div>
        <div class="card">
            <h3>Total Income</h3>
            <p>₱<?= number_format($total_income, 2); ?></p>
        </div>
        <div class="card">
            <h3>Total Expenses</h3>
            <p>₱<?= number_format($total_expenses, 2); ?></p>
        </div>
    </div>

    <!-- BIG CHART -->
    <div class="chart-wrapper big-chart">
        <canvas id="eventChart"></canvas>
    </div>

    <!-- TRANSACTIONS -->
    <div class="table-wrapper">
        <h2 class="section-title">Recent Transactions</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $t): ?>
                <tr>
                    <td><?= $t['id']; ?></td>
                    <td><?= $t['name']; ?></td>
                    <td><?= $t['type']; ?></td>
                    <td class="<?= strtolower($t['status']); ?>">
                        <?= $t['status']; ?>
                    </td>
                    <td><?= $t['date']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

</div>

<?php if ($user_role === "admin"): ?>
<script>
new Chart(document.getElementById('eventChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($event_names); ?>,
        datasets: [{
            label: 'Event Expenses (₱)',
            data: <?= json_encode($event_expenses); ?>,
            backgroundColor: '#a855f7',
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: { color: '#e5e7ff' }
            },
            x: {
                ticks: { color: '#e5e7ff' },
                grid: { display: false }
            }
        },
        plugins: {
            legend: {
                labels: { color: '#e9d5ff' }
            }
        }
    }
});
</script>
<?php endif; ?>

</body>
</html>
