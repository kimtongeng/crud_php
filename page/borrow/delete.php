<?php
include "../../connect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $id = $_POST['id'];
  $isDeleted = deleteRecord($id);
  if ($isDeleted) {
    header("Location: index.php");
    exit();
  } else {
    $isError = true;
    
  }
}
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit();
}

$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="main">
    <div class="side-bar" id="side-bar">
      <div class="top-menu">
        <i class="fa-solid fa-angle-left" id="close-menu"></i>
      </div>
      <div class="main-menu">
        <div class="menu">
          <a href="../../index.php">Dashboard</a>
        </div>
        <div class="menu active">
          <a href="./index.php">Borrow book</a>
        </div>
        <div class="menu">
          <a href="../about_me.php">About me</a>
        </div>

      </div>
    </div>
    <div class="body">
      <div class="header space-between">
        <a href="./index.php">
          <div class="back">
            <i class="fa-solid fa-arrow-left"></i>
          </div>
        </a>
        <button id="menu" class="menu">
          <i class="fa-solid fa-bars-staggered"></i>
        </button>

        <div class="clock">
          <i class="fa-regular fa-clock"></i>
          <div id="clock">--:--:--</div>
        </div>
      </div>
      <div class="main-body">


        <div class="header-form">
          <div class="title">
            Delete Borrow book
          </div>
        </div>

        <div class="body-form">
          <div class="delete-container">
            <h2>Delete Borrow</h2>
            <p class="warning-text">Are you sure you want to delete this borrow record?</p>
            <div class="btn-group">
              <a href="index.php" class="cancel-btn">Cancel</a>
              <form method="POST" action="delete.php" style="display: inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <button type="submit" class="confirm-delete-btn">Delete</button>
              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</body>

</html>
<script src="../../js/script.js"></script>
<?php 
if(isset($isError)){
  echo "<script>alert('❌ Failed to delete the record.'); window.location.href = 'index.php';</script>";
}
?>