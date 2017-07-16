<?php
try {
  $db = new PDO("mysql:host=localhost;dbname=robot;port=3306","root","root");
} catch (Exception $e) {
  echo "Unable to connnect to database.";
  exit;
}
?>
