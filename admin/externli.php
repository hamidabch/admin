<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

   <header class="header">
   
      <section class="flex">
         <div class="links">
            <a href="externli.php" class="upnavbar" ><i class="fa-solid fa-book-open-reader"></i>external subjects</a>
         </div>
         
         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
         </div>
   
         <div class="profile">
            <img src="../images/pic-1.jpg" class="image" alt="">
            <h3 class="name">shaikh anas</h3>
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
      <h3 class="name">shaikh anas</h3>
      <p class="role">Admin</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">     
       <a href="student.php"><i class="fa-solid fa-gears"></i><span>Manage accounts</span></a>
      <a href="bachelor.php"><i class="fas  fa-graduation-cap"></i><span>bachelor</span></a>
      <a href="master.php"><i class="fas fa-graduation-cap"></i><span>Master</span></a>

      
   </nav>

</div>


<section class="courses">
    <div class="sir">

   <h1 class="heading">external bachelor's subjects</h1>

   <table class="table">
    <tr>
    <th>iD</th>
    <th>Title</th>
    <th colspan="3">summary</th>
    <th>key-words</th>
    <th>Framer</th>
    <th colspan="3">students</th>
    <th>state</th>
    </tr>
   </table>
   <button class="btn">Send results</button>
</div>


</section>
















<footer class="footer">

   &copy; Univ-Boumerdes @ 2024 by <span></span> | Departement Informatique

</footer>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

   
</body>
</html>