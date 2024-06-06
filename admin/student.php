<?php
session_start();
include '../php/db_connection.php';

try {
    // الاستعلام لجلب التلاميذ الذين لديهم إيميل وكلمة مرور فقط
    $sql = "SELECT matricule, email, password FROM students WHERE email IS NOT NULL AND password IS NOT NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // جلب جميع السجلات
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
   <title>Student a compte </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

   <style>
      /* Style de base pour الجدول */
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
            <a href="student.php"><i class="fas  fa-graduation-cap"></i><span>Student</span></a>
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
            <p class="role">admin</p>
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

   <section class="teachers">
      <div class="box-container">
         <div class="box offer">
            <h3>Student accounts </h3>
            <section class="manage-accounts">
               <table>
                  <thead>
                     <tr>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id="student-table-body">
                     <?php foreach ($students as $student): ?>
                        <?php if (!empty($student['email']) && !empty($student['password'])): ?>
                           <tr data-matricule="<?php echo htmlspecialchars($student['matricule']); ?>">
                              <td><?php echo htmlspecialchars($student['email']); ?></td>
                              <td><?php echo htmlspecialchars($student['password']); ?></td>
                              <td>
                                 <button class="delete-btn" onclick="deleteStudent(this)">Delete</button>
                                
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
      function deleteStudent(button) {
         var row = button.closest('tr');
         var matricule = row.getAttribute('data-matricule');
         
         // طلب لحذف الطالب من قاعدة البيانات
         var xhr = new XMLHttpRequest();
         xhr.open("POST", "../php/delete_student.php", true);
         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         xhr.onload = function () {
            if (xhr.status === 200) {
               // إزالة الصف من الجدول
               row.remove();
            } else {
               console.error('Failed to delete student.');
            }
         };
         xhr.send("matricule=" + matricule);
      }
   </script>

   <script src="../../desgin/js/script.js"></script>
</body>
</html>
