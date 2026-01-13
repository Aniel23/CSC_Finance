<?php
session_start();

/* INITIALIZE DATA */
if (!isset($_SESSION['chs_students'])) {
    $_SESSION['chs_students'] = [
        [
            'id' => 1,
            'name' => 'Ana Reyes',
            'year' => 'CHS 1',
            'fine_type' => 'Laboratory Fine',
            'amount' => 400,
            'balance' => 400,
            'status' => 'Pending',
            'total' => 400
        ],
        [
            'id' => 2,
            'name' => 'Mark Villanueva',
            'year' => 'CHS 2',
            'fine_type' => 'Uniform Violation',
            'amount' => 250,
            'balance' => 0,
            'status' => 'Completed',
            'total' => 250
        ],
    ];
}

/* ADD STUDENT */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newId = count($_SESSION['chs_students']) + 1;

    $amount  = (int)$_POST['amount'];
    $balance = (int)$_POST['balance'];

    $_SESSION['chs_students'][] = [
        'id' => $newId,
        'name' => $_POST['name'],
        'year' => $_POST['year'],
        'fine_type' => $_POST['fine_type'],
        'amount' => $amount,
        'balance' => $balance,
        'status' => $balance > 0 ? 'Pending' : 'Completed',
        'total' => $amount
    ];

    header("Location: chs.php");
    exit;
}

/* SEARCH */
$search = $_GET['search'] ?? '';
$students = $_SESSION['chs_students'];

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
<title>CHS Department</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS CONNECTOR -->
<link rel="stylesheet" href="../Css/chs.css">

<!-- BOXICONS -->
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>

<h1>CHS Department – Student Fines</h1>

<!-- BACK BUTTON -->
<a href="bsis.php" class="back-btn">
    <i class='bx bx-arrow-back'></i> Back to BSIS Department
</a>

<!-- LOGOUT BUTTON -->
<a href="register.php" class="btn logout-btn">
    <i class='bx bx-log-out'></i> Logout
</a>

<!-- NEXT DEPARTMENT BUTTON -->
<a href="btvted.php" class="next-dept-btn">
    <i class='bx bx-right-arrow-circle'></i> Next Department
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
        <option>CHS 1</option>
        <option>CHS 2</option>
        <option>CHS 3</option>
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
<script src="../Js/chs.js"></script>

</body>
</html>

