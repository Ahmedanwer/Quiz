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
  <div class="block center">
    <h1><?php echo($group['name']); ?>

    <?php if($currentUser['type']) {
      echo('<button type="button" class="btn btn-success" onClick=createQuiz('.$_GET['group_id'].')><i class="fa fa-plus"></i> Create Quiz</button>');

      $show_quizes_query = mysql_query("SELECT * FROM `quiz` WHERE quiz.group_id=".$_GET['group_id']) or die (mysql_error());
      } else if ($currentUser['type'] == 0 && $is_joined) {
      echo('<button type="button" class="btn btn-danger" onClick="group_action(\'leave\', \''.$_GET['group_id'].'\', \''.$currentUser['ID'].'\')"><i class="fa fa-hand-o-left"></i> Leave</button>');
      $show_quizes_query = mysql_query("SELECT * FROM `quiz` WHERE quiz.group_id=".$_GET['group_id']) or die (mysql_error());

    } else {
      echo('<button type="button" class="btn btn-success" onClick="group_action(\'join\', \''.$_GET['group_id'].'\', \''.$currentUser['ID'].'\')"><i class="fa fa-sign-in"></i> Join</button>');
    }
    ?>
    </h1>
    <p>
  <p>subject: <?php echo($group['subject']); ?></p>
    <p>year: <?php echo($group['year']); ?></p>
    </p>
    </div>

<div class="block">
<?php
  if($is_joined || $currentUser['type']) {
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
<?php
$linkQuiz;
if($currentUser["type"] == 1) {
$linkQuiz="index.php?p=viewMark&quiz_id=".$row['ID'];
}else{
$linkQuiz="index.php?p=solveQuiz&quiz_id=".$row['ID'];
}
 ?>
       <tr class="clicable"  onclick="document.location ='<?php echo $linkQuiz; ?>'">
       <td><?php  echo($row['title']); ?></td>
         <td><?php  echo($row['ID']); ?></td>
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

<div>
</div>

<script type="text/javascript">
  function group_action(action, group_id, student_id) {
      window.location.href='index.php?Smode=1&p=groupAction&action='+action+'&group_id='+group_id+'&student_id='+student_id;
  }

  function createQuiz(group_id) {
      window.location.href='index.php?p=createQuiz&group_id=' + group_id;
  }
</script>
