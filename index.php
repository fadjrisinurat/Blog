<?php
require_once("header.php");
require_once("view.php");
require_once("koneksidb.php"); // Make sure your database connection is set up

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case "hapus":
        require_once "proseshapus.php"; // Include the appropriate file for deleting data
        break;
    case "tambah":
    case "edit":
        require_once "input_data.php"; // Include the file for adding/editing data
        break;
    default:
        // Display the list of articles or main content
        $sql = "SELECT * FROM artikel";
        $result = $conn->query($sql);

      
    }
    include "footer.php";
?>


