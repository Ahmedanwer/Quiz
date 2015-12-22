<?php

   $query = mysql_query("SELECT * FROM `quiz` WHERE quiz.group_id=".$_GET['group_id']) or die (mysql_error());
?>

 <table class="table table-striped">
     <thead>
       <tr>
         <th>ID</th>
         <th>Title</th>
         <th>Description</th>
         <th>Total Marks</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
<?php
while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
?>
       <tr href="">
         <td><?php  echo($row['ID']); ?></td>
         <td><?php  echo($row['title']); ?></td>
         <td><?php  echo($row['description']); ?></td>
         <td><?php  echo($row['total_marks']); ?></td>
         <td><?php  echo('<a href="index.php?p=viewMark&quiz_id='.$row['ID'].'">Marks</a>');?></td>
       </tr>
<?php
}
?>
     </tbody>
   </table>
