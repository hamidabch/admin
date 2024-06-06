<?php
// بداية الجلسة
session_start();

// قم بتفريغ كافة البيانات المخزنة في الجلسة
session_unset();

// انهاء الجلسة
session_destroy();

// توجيه المستخدم إلى الواجهة المعينة
header("Location: ../../homeLogin/html/loginAdmin.php");
exit(); // التأكد من توقف تنفيذ السكريبت
?>
