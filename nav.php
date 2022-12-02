<?php 

  session_start();

?>

    <header>
      <!-- Logo -->
        <div class="logo-container">
            <div class="logo">
                <img src="media/SDG Logo/logo.png" alt="logo">
            </div>
    </header>

<nav>
  <!-- Navigation Bar-->
  <div class="navbar">
    <!-- Dropdown Menu -->
    <span>
      <a href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn"><span>About</span>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="about.php">About the SDGs</a>
          <a href="goals.php">What are the SDGs?</a>
        </div>
      </div>
      <a href="contactus.php">Contact Us</a>
    </span>
    <!-- Dummy Search Bar -->
    <span>
      <input type="text" placeholder="Search...">
      <!-- Login/Register Button -->
      <?php 
        if(isset($_SESSION['logged_in'])){
          echo '<a href="logout.php">Logout</a>';
        }else{
          echo '<a href="login.php">Login</a>';
        }
      ?>
    </span>
  </div>
</nav>


