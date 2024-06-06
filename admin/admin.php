<?php
session_start(); // هنا نبدأ الجلسة
// التحقق من وجود قيمة $_SESSION['name']
if (!isset($_SESSION['name'])) {
    // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول إذا لم يتم تسجيل الدخول
    header("Location: ../../homeLogin/html/loginAdmin.php");
    exit(); // تأكيد الخروج لضمان عدم استمرار تنفيذ السكريبت
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
   <style>
      /* Style de base pour le tableau */
      table {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 2rem;
         background-color: #fff;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         border-radius: 10px;
         overflow: hidden;
      }

      th, td {
         padding: 12px;
         text-align: left;
      }

      th {
         background-color: #f39c12;
         color: #fff;
      }

      tr:hover {
         background-color: #f1f1f1;
      }

      .delete-btn {
         padding: 6px 10px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         transition: background-color 0.3s ease;
         font-size: 14px;
         background-color: #dc3545;
         color: #fff;
      }

      .delete-btn:hover {
         background-color: #c82333;
      }
   </style>
</head>
<body>

    <header class="header">
        <section class="flex">
           <div class="links">
              <a href="student.php"><i class="fas fa-graduation-cap"></i><span>Student</span></a>
              <a href="teacher.php"><i class="fas fa-chalkboard-teacher"></i><span>Teachers</span></a>
              <a href="admin.php"><i class="fas fa-user-shield"></i><span>Admins</span></a>
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
                 <a href="profile.php" class="option-btn">Profile</a>
                 <a href="register.php" class="option-btn">Logout</a>
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
           <a href="bachelor.php"><i class="fas fa-graduation-cap"></i><span>Bachelor</span></a>
           <a href="master.php"><i class="fas fa-graduation-cap"></i><span>Master</span></a>
        </nav>
     </div>

<section class="teachers">
   <div class="box-container">
      <div class="box offer">
         <h3>Admin accounts</h3>
         <section class="manage-accounts">
            <table>
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>First Name</th>
                     <th>Family Name</th>
                     <th>Email</th>
                     <th>Password</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody id="admin-table-body">
                  <!-- Lignes du tableau générées dynamiquement -->
               </tbody>
            </table>
         </section>
      </div>
   </div>
</section>

<!-- custom js file link  -->
<script src="../../desgin/js/script.js"></script>
<script>
   // Fonction pour ajouter une ligne au tableau
   function addAdminRow(id, firstName, familyName, email, password) {
      var tableBody = document.getElementById('admin-table-body');
      var newRow = tableBody.insertRow();
      newRow.innerHTML = `<td>${id}</td><td>${firstName}</td><td>${familyName}</td><td>${email}</td><td>${password}</td><td><button class="delete-btn">Delete</button></td>`;
      addEventListeners(newRow);
   }

   // Fonction pour supprimer une ligne du tableau et de la base de données
   function deleteAdminRow(row) {
      var cells = row.querySelectorAll('td');
      var id = cells[0].innerText;

      // Appel de deleteadmin.php avec l'ID de l'admin à supprimer
      fetch('deleteadmin.php?id=' + id, {
         method: 'GET'
      })
      .then(response => {
         if (response.ok) {
            row.remove();
            console.log('Admin deleted');
         } else {
            console.error('Error deleting admin');
         }
      })
      .catch(error => console.error('Error deleting admin:', error));
   }

   // Ajout des écouteurs d'événements sur les boutons de chaque ligne
   function addEventListeners(row) {
      var deleteButton = row.querySelector('.delete-btn');

      deleteButton.addEventListener('click', function() {
         deleteAdminRow(row);
      });
   }

   // Fonction pour récupérer les admins et les ajouter au tableau
   function fetchAdmins() {
      fetch('getadmin.php')
         .then(response => response.json())
         .then(data => {
            data.forEach(admin => {
               addAdminRow(admin.id, admin.firstName, admin.familyName, admin.email, admin.password);
            });
         })
         .catch(error => console.error('Error fetching admins:', error));
   }

   // Appel de la fonction pour récupérer les admins au chargement de la page
   document.addEventListener('DOMContentLoaded', fetchAdmins);
</script>

</body>
</html>
