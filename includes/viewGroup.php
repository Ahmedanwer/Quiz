<?php

   $query = mysql_query("SELECT * FROM `group` where group.ID =".$_GET['group_id']) or die (mysql_error());
   if($query) {
    $group = mysql_fetch_array($query, MYSQL_ASSOC);
    $query = mysql_query("SELECT * FROM `join` where group_id =".$_GET['group_id']." and student_id=".$currentUser['ID']) or die (mysql_error());
    if($query) {
      if(mysql_num_rows($query)) {
        $is_joined = true;
      } else {
        $is_joined = false;
      }
    }
   }
?>

<div class="container">
  <div class="jumbotron">
    <h1><?php echo($group['name']); ?></h1>
    <?php if ($is_joined) {
      echo('<button type="button" class="btn btn-danger" onClick="group_action(\'leave\', \''.$_GET['group_id'].'\', \''.$currentUser['ID'].'\')">Leave</button>');
      $show_quizes_query = mysql_query("SELECT * FROM `quiz` WHERE quiz.group_id=".$_GET['group_id']) or die (mysql_error());

    } else {
      echo('<button type="button" class="btn btn-danger" onClick="group_action(\'join\', \''.$_GET['group_id'].'\', \''.$currentUser['ID'].'\')">Join</button>');
    }
    ?>
    </div>
</div>

<?php
  if($is_joined) {
?>
<table class="table table-striped">
     <thead>
       <tr>
         <th>ID</th>
         <th>Title</th>
         <th>Description</th>
         <th>Toal Marks</th>
       </tr>
     </thead>
     <tbody>
      <?php
      while ($row = mysql_fetch_array($show_quizes_query, MYSQL_ASSOC)) {
?>

       <tr>
         <td><?php  echo($row['ID']); ?></td>
         <td><?php  echo($row['title']); ?></td>
          <td><?php  echo($row['description']); ?></td>
          <td><?php  echo($row['total_marks']); ?></td>
       </tr>
  <?php
}
?>

     </tbody>
   </table>
<?php
  }
?>


<script type="text/javascript">
  function group_action(action, group_id, student_id) {
      window.location.href='index.php?p=groupAction&action='+action+'&group_id='+group_id+'&student_id='+student_id;
  }
</script>

