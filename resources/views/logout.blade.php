<?php



session_start();

session_unset();
session_destroy();

// echo $_SESSION['userid']. " " . $SESSION['username'];

return view('login');
?>