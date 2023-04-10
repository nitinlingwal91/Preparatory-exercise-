<?php
// Start the session
session_start();

// Display session information
echo "Session ID: " . session_id() . "<br>";
echo "Session name: " . session_name() . "<br>";
echo "Session status: " . session_status() . "<br>";
echo "Session variables: ";
print_r($_SESSION);
?>
