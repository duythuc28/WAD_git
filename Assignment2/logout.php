<?php
/**
 * StudentID: 101767225
 * Student name: Duy Thuc Pham
 * This file uses to usset current session for logout function
 */
    session_start();
    unset($_SESSION['customer_id']);
    header("location:login.html");
 ?>
