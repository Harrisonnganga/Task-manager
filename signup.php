<?php
require 'database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Basic email format validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format.';
    } elseif (strlen($password) < 8) {
        $message = 'Password must be at least 8 characters long.';
    } elseif ($password !== $confirmPassword) {
        $message = 'Passwords do not match.';
    } else {
        // Check if the email is already registered
        $checkEmail = $conn->prepare('SELECT id FROM users WHERE email = :email');
        $checkEmail->bindParam(':email', $email);
        $checkEmail->execute();
        $existingUser = $checkEmail->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            $message = 'This email is already registered.';
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $sql = 'INSERT INTO users (email, password) VALUES (:email, :password)';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                $message = 'Successfully created a new user.';
                // Redirect to the dashboard after successful registration
                header('Location: dashboard.php');
                exit; // Ensure no more code execution after redirection
            } else {
                $message = 'Sorry, there must have been an issue creating your account.';
            }
        }
    }
}
?>
<?php
require "partials/head.php";
require "partials/header.php";
?>

    <?php if (!empty($message)): ?>
      <p><?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
