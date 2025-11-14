<?php
// Database configuration
$host = "localhost";
$dbname = "tunji";
$username = "root";
$password = "";

try {
    // Connect to database using PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];


        // Insert query
        $sql = "INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            echo "Record inserted successfully!";
            header("Location: index.html");
            exit();
            
        } else {
            echo "Error inserting data.";
        }
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <style>
        /* Modal background */
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

        /* Modal box */
        .modal-box {
            background: #fff;
            padding: 25px;
            width: 350px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            animation: fadeIn 0.4s ease;
        }

        .modal-box h2 {
            color: #155724;
            margin-bottom: 20px;
        }

        .modal-box p {
            font-size: 16px;
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

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>

<?php if ($success): ?>
    <div class="modal-overlay">
        <div class="modal-box">
            <h2>Success ✔</h2>
            <p>Your message has been submitted successfully!</p>
            <button onclick="goBack()">OK</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "index.html";  // ← your HTML page
        }

        // Auto-close modal after 3 seconds
        setTimeout(goBack, 3000);
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