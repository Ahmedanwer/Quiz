<?php

   $query = mysql_query("SELECT * FROM `group` INNER JOIN (SELECT user.name as instructor_name , user.id from user) u on u.id=group.instructor_id  WHERE 1") or die (mysql_error());
?>

 <table class="table table-striped">
     <thead>
       <tr>
         <th>ID</th>
         <th>Group Name</th>
         <th>Subject</th>
         <th>Year</th>
         <th>Instructor Name</th>
       </tr>
     </thead>
     <tbody>
<?php
while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
?>
       <tr>
         <td><?php  echo($row['ID']); ?></td>
         <td><?php  echo($row['name']); ?></td>
          <td><?php  echo($row['subject']); ?></td>
          <td><?php  echo($row['year']); ?></td>
          <td><?php  echo($row['instructor_name']); ?></td>
       </tr>
<?php
}
?>
     </tbody>
   </table>
