<?php
session_start();

// Redirect to index.php if the user is already logged in
if (isset($_SESSION['student'])) {
    header("Location: hall_ticket.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "include/connect.php";

    $roll_number = $_POST['roll_number'];
    $dob = $_POST['dob'];

    $sql = "SELECT * FROM student_info WHERE roll_no = '$roll_number' AND Stu_dob = '$dob'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['student'] = $result->fetch_assoc();
        header("Location: hall_ticket.php");
    } else {
        echo "<script>
            alert('Invalid credentials');
            window.location.href = 'index.php';
        </script>";
    }

    $conn->close();
}
?>