<?php

   $query = mysql_query("SELECT * FROM `take` INNER JOIN (SELECT user.name as user_name , user.id as student_tid from user) u on student_id=u.student_tid WHERE take.quiz_id=".$_GET['quiz_id']) or die (mysql_error());
?>

 <table class="table table-striped">
     <thead>
       <tr>
         <th>Student</th>
         <th>Mark</th>
         </tr>
     </thead>
     <tbody>
<?php
while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
?>
       <tr>
         <td><?php  echo($row['user_name']); ?></td>
         <td><?php  echo($row['student_mark']); ?></td>
       </tr>
<?php
}
?>
     </tbody>
   </table>
