<?php
$id = $_GET['id'];
$sql = "delete from artikel where id = '".$id."'";
$conn->query($sql);