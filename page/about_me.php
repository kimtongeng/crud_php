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
          <a href="./borrow/index.php">Borrow</a>
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

        <h1>
          Welcome To Book borrow
        </h1>

      </div>
    </div>
  </div>
</body>

</html>

<script src="../js/script.js"></script>