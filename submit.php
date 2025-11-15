<?php
//$env = parse_ini_file(__DIR__ . '/.env');

// Database connections
$db_host = "localhost";
//$env['DB_HOST'];
$db_user = "olanrew2_tunji";
//$env['DB_USER'];
$db_pass = "yn.4N[8_JiRbM-VR";
//$env['DB_PASS'];
$db_name = "olanrew2_tunji";
//$env['DB_NAME'];

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// 1️⃣ CHECK IF EMAIL ALREADY EXISTS
$checkEmail = "SELECT * FROM messages WHERE email = '$email'";
$result = $conn->query($checkEmail);

if ($result->num_rows > 0) {
    $status = "exists"; // Email already in database
} else {
    // 2️⃣ INSERT INTO DATABASE
    $sql = "INSERT INTO messages (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";
    
    
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Response</title>
    <style>
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .modal-box {
            background: #fff;
            padding: 25px;
            width: 350px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .modal-box button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .modal-box button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<?php if ($status === "exists"): ?>
    <div class="modal-overlay">
        <div class="modal-box">
            <h2 style="color:red;">Email Exists ❌</h2>
            <p>This email is already registered in our system.</p>
            <button onclick="goBack()">OK</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "index.html";
        }
    </script>

<?php elseif ($status === "success"): ?>
    <div class="modal-overlay">
        <div class="modal-box">
            <h2 style="color:green;">Success ✔</h2>
            <p>Your message was submitted and an email has been sent to you!</p>
            <button onclick="goBack()">OK</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "index.html";
        }
    </script>

<?php else: ?>
    <div class="modal-overlay">
        <div class="modal-box">
            <h2 style="color:red;">Error ❌</h2>
            <p>There was a problem saving your message.</p>
            <p><?php echo $error_message; ?></p>
            <button onclick="goBack()">Back</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "index.html";
        }
    </script>
<?php endif; ?>

</body>
</html>
