 <?php

  ?>

 <!DOCTYPE html>
 <htm lang="en">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous">
     <link rel="stylesheet" href="./assets/css/style.css">
     <title><?php echo $title;?></title>

   </head>

   <body>
     <div id="app" class="bg-light mt-5">
       <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-white shadow-sm ">
         <div class="container">
           <a class="navbar-brand" href="index.php">Lập trình web 1</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">

                    <!-- Đã đăng nhập -->
               <?php if ($currentUser) : ?>
                 <li class="nav-item <?php echo $title == "Home" ? "active" : ""; ?> ">
                   <a class="nav-link" href="index.php">
                     <svg viewBox="0 0 28 28" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 aaxa7vy3" height="28" width="28">
                       <path d="M25.825 12.29C25.824 12.289 25.823 12.288 25.821 12.286L15.027 2.937C14.752 2.675 14.392 2.527 13.989 2.521 13.608 2.527 13.248 2.675 13.001 2.912L2.175 12.29C1.756 12.658 1.629 13.245 1.868 13.759 2.079 14.215 2.567 14.479 3.069 14.479L5 14.479 5 23.729C5 24.695 5.784 25.479 6.75 25.479L11 25.479C11.552 25.479 12 25.031 12 24.479L12 18.309C12 18.126 12.148 17.979 12.33 17.979L15.67 17.979C15.852 17.979 16 18.126 16 18.309L16 24.479C16 25.031 16.448 25.479 17 25.479L21.25 25.479C22.217 25.479 23 24.695 23 23.729L23 14.479 24.931 14.479C25.433 14.479 25.921 14.215 26.132 13.759 26.371 13.245 26.244 12.658 25.825 12.29"></path>
                     </svg><?php echo $title == "Home" ? '<span class="sr-only">(current)</span>' : ''; ?> </a>
                 </li>
                 <li class="nav-item <?php echo $title == "Total" ? "active" : ""; ?> ">
                   <a class="nav-link" href="sum.php">Total<?php echo $title == "Total" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                 </li>
                 <li class="nav-item <?php echo $title == "Change the password" ? "active" : ""; ?> ">
                   <a class="nav-link" href="changePass.php">Change Password</a><?php echo $title == "Change the password" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                 </li>
                 <li class="nav-item <?php echo $title == "Profile" ? "active" : ""; ?> ">
                   <a class="nav-link" href="profile.php">Profile</a><?php echo $title == "Profile" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="logout.php">Logout</a>
                 </li>
                 
                  <!-- Chưa đăng nhập -->
               <?php else : ?>
                 <li class="nav-item <?php echo $title == "Login" ? "active" : ""; ?> ">
                   <a class="nav-link" href="login.php">Login<?php echo $title == "Login" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                 </li>
                 <li class="nav-item <?php echo $title == "Register" ? "active" : ""; ?> ">
                   <a class="btn btn-primary" href="register.php">Register<?php echo $title == "Register" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                 </li>
               <?php endif; ?>
             </ul>
             <form class="form-inline my-2 my-lg-0">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
             </form>
             <?php if ($currentUser) : ?>
              <a href="profile.php" class="btn-profile rounded-circle ml-3">
                <img  class="btn-profile--img " src="avatar.php?id=<?php echo $currentUser['id'];?>" alt="">
             </a>
             <?php endif; ?>

           </div>
         </div>

       </nav>
       <div id="content" style="min-height:100vh;">
          <div class="container pt-3">
            <?php if ($title != "Home") : ?>
              <h1 class="display-4 text-center"><?php echo $title ?></h1>
            <?php endif; ?>