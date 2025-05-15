<?php
include "../../connect.php";
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
      <div class="header">

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
            Borrow book list
          </div>
          <div class="add-button">
            <a href="./add.php">
              <i class="fa-solid fa-plus"></i>
              <span>Add</span>
            </a>
          </div>
        </div>

        <div class="body-form">
          <div class="main-table">
            <div class="table-container">
              <table class="custom-table" id="borrowTable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Book Name</th>
                    <th>Book ID</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $data = exc_query("SELECT * FROM borrow_book");
                  $i = 1;

                  foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['book_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['book_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['borrow_date']->format('Y-m-d')) . "</td>";
                    echo "<td>" . htmlspecialchars($row['return_date']->format('Y-m-d')) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['notes']) . "</td>";
                    echo "<td>
            <div class='action'>
              <a href='./edit.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>
              <a href='./delete.php?id=" . $row['id'] . "' class='delete-btn'>Delete</a>
            </div>
          </td>";
                    echo "</tr>";
                  }
                  ?>


                </tbody>
              </table>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>
</body>

</html>

<script src="../../js/script.js"></script>