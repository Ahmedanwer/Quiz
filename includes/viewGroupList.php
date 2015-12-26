<?php
$where='1';
if($currentUser['type']==1){
$where=" group.instructor_id=".$currentUser['ID'];
}
   $query = mysql_query("SELECT * FROM `group` INNER JOIN (SELECT user.name as instructor_name , user.id from user) u on u.id=group.instructor_id  WHERE ".$where) or die (mysql_error());
?>

<div class="container">
  <div class=" block">
  <h1>Groups</h1>
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

         <tr class="clicable" onclick="document.location ='index.php?p=viewGroup&group_id=<?php echo($row['ID']); ?>'">
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
</div>
</div>
