<?php
include('includes/config.php');
if (!empty($_POST["termid"])) {
    $cid = intval($_POST['termid']);
    if (!is_numeric($cid)) {
  
      echo htmlentities("القسم خطى");
      exit;
    } else {
      $file = fopen('idresult.txt', 'w');
      fwrite($file, $cid);
      fclose($file);
      $filesid=fopen('idsubject.txt','w');
      fwrite($filesid,"");
      fclose($filesid);
      $stmt = $dbh->prepare("SELECT tblstudents.StudentId, tblstudents.StudentName from tblstudents WHERE tblstudents.CollegeDepartmentID = :cid order by tblstudents.StudentName");
      $stmt->execute(array(':cid' => $cid));
  
  ?>
      
      
        <option value="" >اختر المادة   </option><?php
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
                                                    ?>
          <option value="<?php echo htmlentities($row['StudentId']); ?>"><?php echo htmlentities($row['StudentName']); ?></option>
  <?php 
  }
}
}
  
  ?>