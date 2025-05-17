<?php
include "../../connect.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $data = [
    'student_name' => $_POST['student_name'],
    'student_id' => $_POST['student_id'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'book_name' => $_POST['book_name'],
    'book_id' => $_POST['book_id'],
    'borrow_date' => $_POST['borrow_date'],
    'return_date' => $_POST['return_date'],
    'quantity' => $_POST['quantity'],
    'status' => $_POST['status'],
    'notes' => $_POST['notes']
  ];

  if (updateBorrowForm($id, $data)) {
    header("Location: index.php");
    exit();
  } else {
    echo "<script>alert('❌ Failed to update record'); window.location.href='index.php';</script>";
  }
}
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit();
}
$id = $_GET["id"];
$borrow = getBorrowById($id);

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
            Edit Borrow book
          </div>
        </div>

        <div class="body-form">
          <div class="form-container">

            <form class="borrow-form" method="POST" action="edit.php">
              <input type="hidden" name="id" value="<?= $id ?>">

              <div class="form-row">
                <div class="form-group">
                  <label for="student_name">Student Name</label>
                  <input type="text" id="student_name" name="student_name" required value="<?= $borrow['student_name'] ?>">
                </div>

                <div class="form-group">
                  <label for="student_id">Student ID</label>
                  <input type="text" id="student_id" name="student_id" required value="<?= $borrow['student_id'] ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" value="<?= $borrow['email'] ?>">
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="tel" id="phone" name="phone" value="<?= $borrow['phone'] ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="book_name">Book Name</label>
                  <input type="text" id="book_name" name="book_name" required value="<?= $borrow['book_name'] ?>">
                </div>

                <div class="form-group">
                  <label for="book_id">Book ID</label>
                  <input type="text" id="book_id" name="book_id" required value="<?= $borrow['book_id'] ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="borrow_date">Borrow Date</label>
                  <input type="date" id="borrow_date" name="borrow_date" required value="<?= $borrow['borrow_date'] ?>">
                </div>

                <div class="form-group">
                  <label for="return_date">Return Date</label>
                  <input type="date" id="return_date" name="return_date" required value="<?= $borrow['return_date'] ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" id="quantity" name="quantity" min="1" required value="<?= $borrow['quantity'] ?>">
                </div>

                <div class="form-group">
                  <label for="status">Status</label>
                  <select id="status" name="status" required>
                    <option value="borrowed" <?= $borrow['status'] == 'borrowed' ? 'selected' : '' ?>>Borrowed</option>
                    <option value="returned" <?= $borrow['status'] == 'returned' ? 'selected' : '' ?>>Returned</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group full-width">
                  <label for="notes">Notes</label>
                  <textarea id="notes" name="notes" rows="3"><?= $borrow['notes'] ?></textarea>
                </div>
              </div>

              <button type="submit">Update</button>
            </form>
          </div>

        </div>

      </div>
    </div>
  </div>
</body>

</html>

<script src="../../js/script.js"></script>