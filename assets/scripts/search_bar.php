<?php


session_start();
require 'dbconnection.php';

$search_text = isset($_GET['search']) ? trim($_GET['search']) : '';
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

if ($search_text === '') {
    $sql = "SELECT * FROM Loan ORDER BY loan_id DESC LIMIT $limit OFFSET $offset";
} else {
    $sql = "SELECT * FROM Loan WHERE description_title LIKE '%$search_text%' ORDER BY loan_id DESC LIMIT $limit OFFSET $offset";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
?>
    <!-- Card Start -->
    <div class="h-max[100] w-75 flex flex-col gap-3 items-center">
        <div>
            <img
                src="<?= htmlspecialchars($row['loan_photo']) ?>"
                class="h-max[60] w-max[60] rounded-2xl"
                alt="Loan Photo"
            />
        </div>
        <div class="flex align-middle text font-light">
            <?= htmlspecialchars($row['description_title']) ?>
        </div>
    </div>
    <!-- Card End -->
<?php
    endwhile;
else:
    echo "<p>No results found.</p>";
endif;
?>
