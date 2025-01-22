<?php


$conn = new mysqli("localhost", "root", "", "void_project");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
