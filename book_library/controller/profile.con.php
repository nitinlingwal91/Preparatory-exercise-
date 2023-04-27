<?php
    include "../conn/connection.php";

    $user_email = $_SESSION['user_email'];

    $stmt = mysqli_prepare($con, "SELECT * FROM user_registration WHERE user_email = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        echo "<h6 class='card-title text-capitalize mt-2'>Profile: " . htmlspecialchars($user['user_email']) . "</h6>";
        echo "<h6 class='card-title text-capitalize mt-2'>Role: " . htmlspecialchars($user['user_role']) . "</h6>";
        
    } else {
        echo "User not found.";
    }
?>