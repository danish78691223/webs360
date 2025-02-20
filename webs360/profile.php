<?php
session_start();

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'auth_system';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];

// Fetch user data based on role
$user = [];
if ($user_role == 'user') {
    $sql = "SELECT name AS full_name, email, '' AS phone, '' AS address, '' AS business_type, '' AS profile_pic FROM users WHERE id = ?";
} elseif ($user_role == 'admin') {
    $sql = "SELECT full_name, email, mobile_no AS phone, address, business_type, '' AS profile_pic FROM admins WHERE id = ?";
} elseif ($user_role == 'employee' || $user_role == 'admin_dashboard') {
    $sql = "SELECT username AS full_name, email, '' AS phone, '' AS address, '' AS business_type, profile_pic FROM Dashboard WHERE id = ?";
} elseif ($user_role == 'seller') {
    $sql = "SELECT business_name AS full_name, email, phone, category AS business_type, '' AS address, '' AS profile_pic FROM sellers WHERE id = ?";
} else {
    die("Invalid role");
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    die("User not found!");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="profile-container">
        <div class="profile-card">
            <img src="<?php echo htmlspecialchars($user['profile_pic'] ?: 'default.jpg'); ?>" alt="Profile Picture" class="profile-pic">
            <h1><?php echo htmlspecialchars($user['full_name']); ?></h1>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <?php if (!empty($user['phone'])): ?>
                <p>Phone: <?php echo htmlspecialchars($user['phone']); ?></p>
            <?php endif; ?>
            <?php if (!empty($user['address'])): ?>
                <p>Address: <?php echo htmlspecialchars($user['address']); ?></p>
            <?php endif; ?>
            <?php if (!empty($user['business_type'])): ?>
                <p>Business Type: <?php echo htmlspecialchars($user['business_type']); ?></p>
            <?php endif; ?>
            <button id="editBtn">Edit Profile</button>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <script>
        document.getElementById('editBtn').addEventListener('click', () => {
            alert('Edit profile feature coming soon!');
        });
    </script>
</body>

</html>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .profile-container {
        text-align: center;
    }

    .profile-card {
        background: white;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        max-width: 500px;
        animation: fadeIn 1s ease-in-out;
    }

    .profile-pic {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #4e54c8;
    }

    h1 {
        margin: 1rem 0 0.5rem;
        font-size: 2rem;
        color: #333;
    }

    p {
        color: #555;
        margin: 0.5rem 0;
    }

    button, .logout-btn {
        margin-top: 1rem;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        background: #4e54c8;
        color: white;
        transition: background 0.3s;
        text-decoration: none;
    }

    button:hover, .logout-btn:hover {
        background: #8f94fb;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
