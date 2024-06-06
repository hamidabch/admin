<?php
session_start();
include '../php/db_connection.php';

try {
    // استعلام لاسترداد بيانات الأساتذة الذين يمتلكون عنوان بريد إلكتروني وكلمة مرور
    $sql = "SELECT id, firstName, familyName, email, password FROM teachers WHERE email IS NOT NULL AND password IS NOT NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // استرداد جميع السجلات
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Teacher Accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../desgin/css/style.css">
   <style>
      /* Basic table styling */
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

      .edit-btn, .delete-btn {
         padding: 6px 10px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         transition: background-color 0.3s ease;
         font-size: 14px;
      }

      .edit-btn {
         background-color: #007bff;
         color: #fff;
         margin-right: 5px;
      }

      .delete-btn {
         background-color: #dc3545;
         color: #fff;
      }

      .edit-btn:hover {
         background-color: #0056b3;
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
         <a href="student.php"><i class="fas  fa-graduation-cap"></i><span>Students</span></a>
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
         <h3 class="name"><?php echo $_SESSION['name']; ?></h3>
         <p class="role">Admin</p>
         <div class="flex-btn">
            <a href="profile.php" class="option-btn">Profile</a>
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
      <a href="profile.html" class="btn">View Profile</a>
   </div>

   <nav class="navbar">
      <a href="student.php"><i class="fa-solid fa-gears"></i><span>Manage Accounts</span></a>
      <a href="bachelor.php"><i class="fas fa-graduation-cap"></i><span>Bachelor</span></a>
      <a href="master.php"><i class="fas fa-graduation-cap"></i><span>Master</span></a>
   </nav>
</div>

<section class="teachers">
   <div class="box-container">
      <div class="box offer">
         <h3>Teacher Accounts</h3>
         <section class="manage-accounts">
            <table>
               <thead>
                  <tr>
                     <th>First Name</th>
                     <th>Family Name</th>
                     <th>Email</th>
                     <th>Password</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody id="teacher-table-body">
                  <?php foreach ($teachers as $teacher): ?>
                     <?php if ($teacher['email'] && $teacher['password']): ?>
                        <tr id="teacher_<?php echo htmlspecialchars($teacher['id']); ?>">
                           <td><?php echo htmlspecialchars($teacher['firstName']); ?></td>
                           <td><?php echo htmlspecialchars($teacher['familyName']); ?></td>
                           <td><?php echo htmlspecialchars($teacher['email']); ?></td>
                           <td><?php echo htmlspecialchars($teacher['password']); ?></td>
                           <td>
                              <button class="delete-btn" onclick="deleteTeacher(this)">Delete</button>
                           </td>
                        </tr>
                     <?php endif; ?>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </section>
      </div>
   </div>
</section>

<script>
   function deleteTeacher(button) {
      var row = button.closest('tr');
      var teacherId = row.getAttribute('id').replace('teacher_', '');
      
      // طلب لحذف الأستاذ من قاعدة البيانات
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../php/delete_teacher.php", true);
      xhr.setRequestHeader("Content-Type",
      "application/x-www-form-urlencoded");
      xhr.onload = function () {
         if (xhr.status === 200) {
            // إزالة الصف من الجدول
            row.remove();
         } else {
            console.error('Failed to delete teacher.');
         }
      };
      xhr.send("id=" + teacherId);
   }
</script>

<!-- Custom JavaScript file link -->
<script src="../../desgin/js/script.js"></script>

</body>
</html>
