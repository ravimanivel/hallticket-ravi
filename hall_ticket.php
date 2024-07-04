<?php
session_start();
if (!isset($_SESSION['student'])) {
    header("Location: ../login.html");
    exit();
}

$student = $_SESSION['student'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Ticket</title>
    <style>
         
        body {
            font-family: Cambria, serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            width: 90%;
            padding: 50px; 
            padding-top: 20px;
            box-sizing: border-box;
            background: #fff; 
            border:1px solid black ;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0px auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border: 2px solid #6f42c1;
            2px solid #6f42c1;
            padding-bottom: 10px;
        }
        .header .text {
            text-align: center;
            width: 75%;
        }
        .header img {
            width: 125px;
            height: 150px;
            border-radius: 5px;
        }
        .header p {
            margin: 0;
        }
        .title {
            font-weight: bold;
            font-size: 1.2em;
            margin: 10px 0;
            color: #6f42c1;
        }
        .info-table, .course-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table td, .course-table td, .course-table th {
            border: 1px solid #000;
            padding: 8px;
            font-size: 1em;
        }
        .info-table td:first-child {
            width: 20%;
            font-weight: bold;
            background-color: #f1f1f1;
        }
        .course-table th {
            background-color: #6f42c1;
            color: #fff;
            padding: 10px;
            font-weight: bold;
        }
        .signatures {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .signatures .signature-block {
            width: 45%;
            text-align: center;
        }
        .signatures .signature-block p {
            border-top: 1px solid #000;
            padding-top: 10px;
        }
        .signatures .signature-block img {
            display: block;
            margin: 10px auto 0;
            max-width: 100%;
            height: auto;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        button {
            background: #6f42c1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #5a32a3;
        }
        .logout-button {
            background: #dc3545;
            margin-top: 20px;
        }
        .logout-button:hover {
            background: #c82333;
        }
        @media print {
            .button-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="text">
                <pclass="title">Office of the Controller of Examinations</p> 
                <p class="title">End Semester Examinations, April - 2024</p>
                <p class="title">UG Hall Ticket</p>
            </div>
            <img src="<?php echo htmlspecialchars($student['Stu_img']); ?>" alt="Student Photo">
        </div>
        <table class="info-table">
            <tr>
                <td>Student Name</td>
                <td><?php echo htmlspecialchars($student['Stu_name']); ?></td>
                <td>Register No</td>
                <td><?php echo htmlspecialchars($student['roll_no']); ?></td>
            </tr>
            <tr>
                <td>Programme</td>
                <td colspan="3">B.Sc. Computer Science</td>
            </tr>
        </table>
        <table class="course-table">
            <tr>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Date & Session</th>
                <th>Invigilator's Initial</th>
            </tr>
            <tr>
                <td>U21CS608</td>
                <td>Computer Networking</td>
                <td>03-04-2024 Wednesday (FN)</td>
                <td></td>
            </tr>
            <tr>
                <td>U21CS6:1</td>
                <td>Machine Learning</td>
                <td>05-04-2024 Friday (FN)</td>
                <td></td>
            </tr>
            <tr>
                <td>U21CS6:4</td>
                <td>Business Analytics</td>
                <td>08-04-2024 Monday (FN)</td>
                <td></td>
            </tr>
        </table>
        <div class="signatures">
            <div class="signature-block">
                <br><br>
                <p>Candidate Signature</p>
            </div>
            <div class="signature-block">
                <img src="ceo_sign.png" alt="CEO Signature" height="20" width="90">
                <p>CEO Signature</p>
            </div>
        </div>
        <div class="button-container">
            <button onclick="printHallTicket()">Download PDF</button>
             <form action="logout.php" method="post" style="display: inline;">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>
    <script>
        function printHallTicket() {
            window.print();
        }
    </script>
</body>
</html>
