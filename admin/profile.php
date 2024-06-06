<?php
session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
   <style>
      table {
         width: 100%;
         border-collapse: collapse;
         margin: 20px 0;
         font-size: 18px;
         text-align: left;
      }
      table th, table td {
         padding: 12px;
         border-bottom: 1px solid #ddd;
      }
      table th {
         background-color: #f2f2f2;
         text-align :center;
      }
      table td {
         background-color: #eee;
      }
   </style>
</head>
<body>

<header class="header">
   
   <section class="flex">
<div></div>
   
       <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="../images/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo $_SESSION['name']; ?></h3>
         <p class="role">Admin</p>
         
         <div class="flex-btn">
            <a href="profile.php" class="option-btn"> Profile</a>
            <a href="logout.php" class="option-btn">Logout</a>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="../images/pic-1.jpg" class="image" alt="">
      <h3 class="name"><?php echo $_SESSION['name']; ?></h3>
      <p class="role">Admin</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="student.php"><i class="fa-solid fa-gears"></i><span>Manage accounts</span></a>
      <a href="bachelor.php"><i class="fas  fa-graduation-cap"></i><span>bachelor</span></a>
      <a href="master.php"><i class="fas fa-graduation-cap"></i><span>Master</span></a>

      
   </nav>

</div>

<section class="user-profile">

   <h1 class="heading">Your information</h1>

   <div class="info">
      <div>
      <table>
         <thead>
            <tr>
               <th colspan="2"> General information</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td><b>first Name</b></td>
               <td><?php echo $_SESSION['firstName']; ?></td>
            </tr>
            <tr>
               <td><b>family Name</b></td>
               <td><?php echo $_SESSION['familyName']; ?></td>
            </tr>
            <tr>
               <td><b>Email</b></td>
               <td><?php echo $_SESSION['email']; ?></td>
            </tr>
         </tbody>
      </table>
      </div>
      <div class="update-btn-container">
      <button class="inline-btn">update profile</button>
   </div>

   </div>

   <!-- زر تحديث الملف الشخصي -->
   
</section>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>
