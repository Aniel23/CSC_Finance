<?php
session_start();

/* INITIALIZE DATA */
if (!isset($_SESSION['btvted_students'])) {
    $_SESSION['btvted_students'] = [
        [
            'id' => 1,
            'name' => 'John Torres',
            'year' => 'BTVTED 1',
            'fine_type' => 'Workshop Fee',
            'amount' => 450,
            'balance' => 450,
            'status' => 'Pending',
            'total' => 450
        ],
        [
            'id' => 2,
            'name' => 'Leah Cruz',
            'year' => 'BTVTED 2',
            'fine_type' => 'Lab Fine',
            'amount' => 300,
            'balance' => 0,
            'status' => 'Completed',
            'total' => 300
        ],
    ];
}

/* ADD STUDENT */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newId  = count($_SESSION['btvted_students']) + 1;
    $amount = (int)$_POST['amount'];
    $balance = (int)$_POST['balance'];

    $_SESSION['btvted_students'][] = [
        'id' => $newId,
        'name' => $_POST['name'],
        'year' => $_POST['year'],
        'fine_type' => $_POST['fine_type'],
        'amount' => $amount,
        'balance' => $balance,
        'status' => $balance > 0 ? 'Pending' : 'Completed',
        'total' => $amount
    ];

    header("Location: btvted.php");
    exit;
}

/* SEARCH */
$search = $_GET['search'] ?? '';
$students = $_SESSION['btvted_students'];

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
<title>BTVTED Department</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS CONNECTOR -->
<link rel="stylesheet" href="../Css/btvted.css">

<!-- BOXICONS -->
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>

<h1>BTVTED Department – Student Fines</h1>

<!-- BACK BUTTON -->
<a href="chs.php" class="back-btn">
    <i class='bx bx-arrow-back'></i> Back to CHS Department
</a>

<!-- LOGOUT BUTTON -->
<a href="logout.php" class="btn logout-btn">
    <i class='bx bx-log-out'></i> Logout
</a>

<!-- SEARCH -->
<form method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search ID or Name"
           value="<?= htmlspecialchars($search) ?>">
    <button class="btn">
        <i class='bx bx-search'></i> Search
    </button>
</form>

<!-- ADD STUDENT FORM -->
<form method="POST" class="student-form">
    <input type="text" name="name" placeholder="Student Name" required>

    <select name="year" required>
        <option value="">Select Year</option>
        <option>BTVTED 1</option>
        <option>BTVTED 2</option>
        <option>BTVTED 3</option>
    </select>

    <input type="text" name="fine_type" placeholder="Type of Fine" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <input type="number" name="balance" placeholder="Balance" required>

    <button class="btn">
        <i class='bx bx-plus'></i> Add Student
    </button>
</form>

<!-- DATA GRID VIEW -->
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
    <td>₱<?= number_format($s['amount'], 2) ?></td>
    <td>₱<?= number_format($s['balance'], 2) ?></td>
    <td class="<?= strtolower($s['status']) ?>">
        <?= $s['status'] ?>
    </td>
    <td>₱<?= number_format($s['total'], 2) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<!-- JS CONNECTOR -->
<script src="../Js/btvted.js"></script>

</body>
</html>
