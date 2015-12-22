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
    } else {
      echo('<button type="button" class="btn btn-danger" onClick="group_action(\'join\', \''.$_GET['group_id'].'\', \''.$currentUser['ID'].'\')">Join</button>');
    }
    ?>
    </div>
</div>


<script type="text/javascript">
  function group_action(action, group_id, student_id) {
      window.location.href='index.php?p=groupAction&action='+action+'&group_id='+group_id+'&student_id='+student_id;
  }
</script>

