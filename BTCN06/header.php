 <?php

  ?>

 <!DOCTYPE html>
 <htm lang="en">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <title><?php echo $title; ?></title>

   </head>

   <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="container">
         <a class="navbar-brand" href="#">Lập trình web 1</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
             <li class="nav-item <?php echo $title == "Home" ? "active" : ""; ?> ">
               <a class="nav-link" href="index.php">Home <?php echo $title == "Home" ? '<span class="sr-only">(current)</span>' : ''; ?> </a>
             </li>
             <li class="nav-item <?php echo $title == "Total" ? "active" : ""; ?> ">
               <a class="nav-link" href="sum.php">Total<?php echo $title == "Total" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
             </li>

             <?php if ($currentUser) : ?>
              <li class="nav-item <?php echo $title == "Change the password" ? "active" : ""; ?> ">
                 <a class="nav-link" href="changePass.php">Change Password</a><?php echo $title == "Change the password" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="logout.php">Logout</a>
               </li>
               
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
        
          </div>
       </div>

     </nav>

     <div class="container mt-4 m-auto">
       <h1 class="display-4 text-center"><?php echo $title; ?></h1>