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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assests/style.css">
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST" onsubmit="return validateDate()">
            <section class="title"><h2>Login</h2></section>
            <fieldset>
                <legend>Roll Number</legend>
                    <input type="number" id="roll_number" name="roll_number" required  style=" width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;"><br>
                </fieldset>
            <fieldset>
                <legend>Date of Birth (yyyy-mm-dd)</legend>
                <input type="date" id="dob" name="dob" required>
            </fieldset>
            <button type="submit">Login</button>
            <div class="watermark">
        Developed by Ravi with link: <a href="https://ravimanivel.github.io/websites/" target="_blank">https://ravimanivel.github.io/websites/</a>
    </div>
        </form> 
    </div>

    <script>
        function validateDate() {
            const dateInput = document.getElementById('dob').value;
            const datePattern = /^\d{4}-\d{2}-\d{1,2}$/;

            if (!datePattern.test(dateInput)) {
                alert('Please enter a valid date in the format yyyy-mm-d');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
