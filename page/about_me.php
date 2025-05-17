<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <div class="main">
    <div class="side-bar" id="side-bar">
      <div class="top-menu">
        <i class="fa-solid fa-angle-left" id="close-menu"></i>
      </div>
      <div class="main-menu">
        <div class="menu">
          <a href="../index.php">Dashboard</a>
        </div>
        <div class="menu">
          <a href="./borrow/index.php">Borrow book</a>
        </div>
        <div class="menu active">
          <a href="./about_me.php">About me</a>
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
        <div class=" mt-5">
          <div class="card shadow rounded">
            <div class="card-body">
              <h3 class="card-title mb-3">📘 About Me</h3>

              <p><strong>👤 Name:</strong> Yeang Hongmeng</p>
              <p><strong>🏫 Class:</strong> A6</p>

              <h5 class="mt-4">📝 About this page</h5>
              <p>This system is designed to help manage book borrowing efficiently. On this page, you can:</p>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">👁️ <strong>View</strong> information about borrowed books</li>
                <li class="list-group-item">➕ <strong>Insert</strong> new borrow records</li>
                <li class="list-group-item">✏️ <strong>Update</strong> details of borrow records</li>
                <li class="list-group-item">🗑️ <strong>Delete</strong> incorrect or outdated borrow information</li>
              </ul>

              <p class="mt-3">
                The goal is to create a streamlined experience for managing library book transactions.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>

<script src="../js/script.js"></script>