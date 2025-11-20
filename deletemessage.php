<?php 
include "auth.php"; 
include "dbconnect.php";

if (isset($_GET["id"])) {

    $message_id = $_GET["id"]; // Get the ID from the URL

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
    $stmt->bind_param("i", $message_id);

    if ($stmt->execute()) {
        // Successful delete
        header("Location: viewmessages.php?deleted=1");
        exit();
    } else {
        // If something goes wrong
        echo "Error deleting record: " . $stmt->error;
    }
}
?>
