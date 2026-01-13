<?php
session_start();

/* Initialize data */
if (!isset($_SESSION['bsis_students'])) {
    $_SESSION['bsis_students'] = [
        [
            'id' => 1,
            'name' => 'Juan Dela Cruz',
            'year' => 'BSIS 1',
            'fine_type' => 'Library Fine',
            'amount' => 500,
            'balance' => 500,
            'status' => 'Pending',
            'total' => 500
        ],
        [
            'id' => 2,
            'name' => 'Maria Santos',
            'year' => 'BSIS 2',
            'fine_type' => 'ID Replacement',
            'amount' => 300,
            'balance' => 0,
            'status' => 'Completed',
            'total' => 300
        ],
    ];
}

/* ADD STUDENT */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newId = count($_SESSION['bsis_students']) + 1;

    $amount = (int)$_POST['amount'];
    $balance = (int)$_POST['balance'];

    $_SESSION['bsis_students'][] = [
        'id' => $newId,
        'name' => $_POST['name'],
        'year' => $_POST['year'],
        'fine_type' => $_POST['fine_type'],
        'amount' => $amount,
        'balance' => $balance,
        'status' => $balance > 0 ? 'Pending' : 'Completed',
        'total' => $amount
    ];

    header("Location: bsis.php");
    exit;
}

/* SEARCH */
$search = $_GET['search'] ?? '';
$students = $_SESSION['bsis_students'];

if ($search) {
    $students = array_filter($students, function ($s) use ($search) {
        return stripos($s['name'], $search) !== false ||
               stripos((string)$s['id'], $search) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BSIS Department</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BSIS CSS -->
    <link rel="stylesheet" href="../Css/bsis.css">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>

<h1>BSIS Department – Student Fines</h1>

<!-- BACK BUTTON -->
<a href="homepage.php" class="back-btn">
    <i class='bx bx-arrow-back'></i> Back to Homepage
</a>

<!-- LOGOUT BUTTON -->
<a href="register.php" class="btn logout-btn">
    <i class='bx bx-log-out'></i> Logout
</a>

<!-- NEXT DEPARTMENT BUTTON -->
<a href="chs.php" class="back-btn" style="margin-left: 10px;">
    <i class='bx bx-right-arrow-alt'></i> Next Department
</a>

<!-- SEARCH -->
<form method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search ID or Name"
           value="<?= htmlspecialchars($search) ?>">
    <button class="btn">
        <i class='bx bx-search'></i> Search
    </button>
</form>

<!-- ADD STUDENT -->
<form method="POST" class="student-form">
    <input type="text" name="name" placeholder="Student Name" required>

    <select name="year" required>
        <option value="">Select Year</option>
        <option>BSIS 1</option>
        <option>BSIS 2</option>
        <option>BSIS 3</option>
    </select>

    <input type="text" name="fine_type" placeholder="Type of Fine" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <input type="number" name="balance" placeholder="Balance" required>

    <button class="btn">
        <i class='bx bx-plus'></i> Add Student
    </button>
</form>

<!-- DATA GRID -->
<table class="datagrid">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Year</th>
            <th>Fine Type</th>
            <th>Amount</th>
            <th>Balance</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= $s['year'] ?></td>
            <td><?= htmlspecialchars($s['fine_type']) ?></td>
            <td>₱<?= $s['amount'] ?></td>
            <td>₱<?= $s['balance'] ?></td>
            <td class="<?= strtolower($s['status']) ?>">
                <?= $s['status'] ?>
            </td>
            <td>₱<?= $s['total'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!-- BSIS JS -->
<script src="../Js/bsis.js"></script>

</body>
</html>
