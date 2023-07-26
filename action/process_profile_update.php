<?php
include_once 'connect.php';
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $newPassword = $_POST["password"];
    $fullName = $_POST["full_name"];
    $sex = $_POST["sex"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $userId = $_SESSION["user_id"]; // Assuming you have stored the user ID in the session

    // Perform any necessary validation on the form data here
    // For example, you may check if the email is valid, perform length checks, etc.
    // If any validation fails, you can redirect back to the profile page with an error message.

    // If a new password is provided, update the password field as well
    if (!empty($newPassword)) {
        // You should perform password hashing and other security measures here
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's profile data in the database, including the password
        $sql = "UPDATE users SET full_name = ?, sex = ?, email = ?, address = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $fullName, $sex, $email, $address, $hashedPassword, $userId);
    } else {
        // Update the user's profile data in the database, excluding the password
        $sql = "UPDATE users SET full_name = ?, sex = ?, email = ?, address = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $fullName, $sex, $email, $address, $userId);
    }

    // Execute the update
    if ($stmt->execute()) {
        // Update successful, redirect the user back to the profile page
        header("Location: /layout/profile.php");
        exit();
    } else {
        // Update failed, redirect with an error message
        header("Location: /layout/profile.php?error=1");
        
        exit();
    }
} else {
    // If the form is not submitted via POST, redirect the user to the profile page
    header("Location: /layout/profile.php");
    exit();
}
?>
