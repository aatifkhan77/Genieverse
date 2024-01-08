<?php

$log_in = "";

if($boolLoggedin){
  $log_in = 
  "<li class='dropdown'><a href='#'><span>$sessionUsername</span> <i class='bi bi-chevron-down dropdown-indicator'></i></a>
  <ul>
    <li><a href='./userProfile.php'>Profile</a></li>
    <li><a href='./assets/php/logout.php'>Log-Out</a></li>
  </ul>
  ";
}else{
  $log_in = 
  "<li class='dropdown'><a href='#'><span>Log in</span> <i class='bi bi-chevron-down dropdown-indicator'></i></a>
  <ul>
    <li><a href='./userLogin.php'>AAKA</a></li>
    <li><a href='./admin/adminSignin.php'>Admin</a></li>
  </ul>
  ";
}



$navbar = "

<section id='topbar' class='topbar d-flex align-items-center'>
    <div class='container d-flex justify-content-center justify-content-md-between'>
      <div class='contact-info d-flex align-items-center'>
        <i class='bi bi-envelope d-flex align-items-center'><a
            href='mailto:contact@example.com'>contact@genieverse.com</a></i>
        <i class='bi bi-phone d-flex align-items-center ms-4'><span>+91 99999 00000</span></i>
      </div>
      <div class='social-links d-none d-md-flex align-items-center'>
        <a href='#' class='twitter'><i class='bi bi-twitter'></i></a>
        <a href='#' class='facebook'><i class='bi bi-facebook'></i></a>
        <a href='#' class='instagram'><i class='bi bi-instagram'></i></a>
        <a href='#' class='linkedin'><i class='bi bi-linkedin'></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id='header' class='header d-flex align-items-center'>

    <div class='container-fluid container-xl d-flex align-items-center justify-content-between'>
      <a href='./index.php' class='logo d-flex align-items-center'>
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src='assets/img/logo.png' alt=''>
        <h1>GENIE VERSE<span>.</span></h1>
      </a>
      <nav id='navbar' class='navbar'>
        <ul>
          <li><a href='./index.php#hero'>Home</a></li>
          <li><a href='./index.php#about'>About</a></li>
          <li class='dropdown'><a href='#'><span>Services</span> <i
                class='bi bi-chevron-down dropdown-indicator'></i></a>
            <ul>
              <li class='dropdown'><a href='#'><span>Agents</span> <i
                    class='bi bi-chevron-down dropdown-indicator'></i></a>
                <ul>
                  <li><a href='./allCategoryGenie.php'>Insurance</a></li>
                  <li><a href='./allCategoryGenie.php'>Travel</a></li>
                </ul>
              </li>
              <li><a href='./allCategoryGenie.php?category=Carpenter'>Carpenter</a></li>
              <li><a href='./allCategoryGenie.php?category=Electrician'>Electrician</a></li>
              <li><a href='./allCategoryGenie.php?category=Grocery'>Grocery</a></li>
              <li class='dropdown'><a href='#'><span>Home Decor</span> <i
                    class='bi bi-chevron-down dropdown-indicator'></i></a>
                <ul>
                  <li><a href='./allCategoryGenie.php?category=Lawn Care'>Lawn Care</a></li>
                  <li><a href='./allCategoryGenie.php?category=Maids'>Maids</a></li>
                  <li><a href='./allCategoryGenie.php?category=Pest Control'>Pest Control</a></li>
                </ul>
              <li><a href='./allCategoryGenie.php?category=Laundry'>Laundry</a></li>
              <li><a href='./allCategoryGenie.php?category=Locksmith'>Locksmith</a></li>
              <li><a href='./allCategoryGenie.php?category=Mechanic'>Mechanic</a></li>
              <li><a href='./allCategoryGenie.php?category=Milkman'>Milkman</a></li>
              <li><a href='./allCategoryGenie.php?category=Plumber'>Plumber</a></li>
          </li>
        </ul>
        <li><a href='./index.php#contact'>Contact</a></li>
        $log_in

      </nav><!-- .navbar -->

      <i class='mobile-nav-toggle mobile-nav-show bi bi-list'></i>
      <i class='mobile-nav-toggle mobile-nav-hide d-none bi bi-x'></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
";
  
echo $navbar;


?>
