<?php
// Dummy data for demonstration
$students = [
    ['id' => 1, 'student_id' => 'S001', 'name' => 'Alice', 'age' => 20, 'address' => '123 Main St', 'section' => 'A'],
    ['id' => 2, 'student_id' => 'S002', 'name' => 'Bob', 'age' => 21, 'address' => '456 Elm St', 'section' => 'B'],
    ['id' => 3, 'student_id' => 'S003', 'name' => 'Charlie', 'age' => 19, 'address' => '789 Oak St', 'section' => 'A'],
];

// Search handling (front-end simulation)
$search = $_GET['search'] ?? '';
if ($search) {
    $students = array_filter($students, function($s) use ($search) {
        return str_contains(strtolower($s['student_id']), strtolower($search)) ||
               str_contains(strtolower($s['name']), strtolower($search));
    });
}

// Edit data simulation
$editData = null;
if (isset($_GET['edit'])) {
    foreach ($students as $s) {
        if ($s['id'] == $_GET['edit']) {
            $editData = $s;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../Css/studentinfo.css">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

<h1>Student Information</h1>

<!-- BACK BUTTON -->
<a href="homepage.php" class="btn back-btn" style="margin-bottom:20px; display:inline-block;">
    <i class='bx bx-arrow-back'></i> Back
</a>

<!-- SEARCH FORM -->
<form method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
    <button type="submit"><i class='bx bx-search'></i> Search</button>
</form>

<!-- ADD / EDIT FORM -->
<form class="student-form">
    <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

    <input type="text" name="student_id" placeholder="Student ID" value="<?= $editData['student_id'] ?? '' ?>" required>
    <input type="text" name="name" placeholder="Name" value="<?= $editData['name'] ?? '' ?>" required>
    <input type="number" name="age" placeholder="Age" value="<?= $editData['age'] ?? '' ?>" required>
    <input type="text" name="address" placeholder="Address" value="<?= $editData['address'] ?? '' ?>" required>
    <input type="text" name="section" placeholder="Section" value="<?= $editData['section'] ?? '' ?>" required>

    <?php if ($editData): ?>
        <button class="btn edit">Update</button>
        <button type="button" class="btn delete" onclick="window.location='studentinfo.php'">Cancel</button>
    <?php else: ?>
        <button type="button" class="btn" id="addBtn">Add</button>
    <?php endif; ?>
</form>

<!-- DATA GRID TABLE -->
<table class="datagrid">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Section</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['student_id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td><?= htmlspecialchars($row['section']) ?></td>
            <td>
                <a href="?edit=<?= $row['id'] ?>" class="btn edit">Edit</a>
                <button class="btn delete" onclick="alert('Delete function simulated')">Delete</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- LINK JS FOR ANIMATION -->
<script src="../Js/studentinfo.js"></script>

</body>
</html>
