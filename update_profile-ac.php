<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user']['id'];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $profile_image = $_FILES['profile_image'];

    // Validate inputs
    if (empty($username) || empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Username and email are required.']);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
        exit;
    }

    // Update password if provided
    $update_password = '';
    if (!empty($password)) {
        $salt = bin2hex(random_bytes(16));
        $salted_password = $password . $salt;
        $password_hash = password_hash($salted_password, PASSWORD_BCRYPT);
        $update_password = ", password_hash = '$password_hash', salt = '$salt'";
    }

    // Handle profile image upload
    if (!empty($profile_image['tmp_name'])) {
        $image_path = 'uploads/';
        $image_name = $username . '_' . time() . '.jpg';
        $full_image_path = $image_path . $image_name;

        if (!move_uploaded_file($profile_image['tmp_name'], $full_image_path)) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload profile image.']);
            exit;
        }
        $update_image = ", profile_image = '$image_name'";
    } else {
        $update_image = '';
    }

    // Update user details
    $stmt = $pdo->prepare("
        UPDATE users 
        SET username = ?, email = ? $update_password $update_image 
        WHERE id = ?
    ");
    if ($stmt->execute([$username, $email, $user_id])) {
        $_SESSION['user']['username'] = $username;
        $_SESSION['user']['email'] = $email;
        if (!empty($image_name)) {
            $_SESSION['user']['profile_image'] = $image_name;
        }
        echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Profile update failed.']);
    }
}
?>

