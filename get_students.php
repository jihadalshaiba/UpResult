<?php
include('includes/config.php');
if (!empty($_POST["CollegeDepartmentID"])) {
  $cid = intval($_POST['CollegeDepartmentID']);
  if (!is_numeric($cid)) {

    echo htmlentities("القسم خطى");
    exit;
  } else {
    $file = fopen('idresult.txt', 'w');
    fwrite($file, $cid);
    fclose($file);
    /*$filesid=fopen('idsubject.txt','w');
    fwrite($filesid,"");
    fclose($filesid);*/
    $stmt = $dbh->prepare("SELECT tblstudents.StudentId, tblstudents.StudentName from tblstudents WHERE tblstudents.CollegeDepartmentID = :cid order by tblstudents.StudentName");
    $stmt->execute(array(':cid' => $cid));

?>


    <option value="">اختار اسم الطالب </option><?php
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                                ?>
      <option value="<?php echo htmlentities($row['StudentId']); ?>"><?php echo htmlentities($row['StudentName']); ?></option>


    <?php
                                                }
                                              }
                                            }
                                            // Code for term
                                            if (!empty($_POST["termid"])) {
                                              $cid1 = intval($_POST['termid']);
                                              $rdfile = fopen("idresult.txt", "r");
                                              while (!feof($rdfile)) {
                                                $cid = fread($rdfile, 1024);
                                              }

                                              if (!is_numeric($cid1)) {

                                                echo htmlentities("تم اختيار الترم بشكل خاطى");
                                                exit;
                                              } else {
                                                //$status = 1;
                                                $stmt1 = $dbh->prepare("SELECT id,SubjectName FROM tblsubjects WHERE semsterID=:cid1 and  CollegeDepartmentID=:cid ");
                                                $stmt1->execute(array(':cid' => $cid, ':cid1' => $cid1));

                                                while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
      <script>
        function handlechange(input) {
          if (input.value < 0) {
            input.value = 0;
            alert("يجب ان تكون اكبر من 0");
          } else if (input.value > 100) {
            input.value = 100;
            alert("يجب ان تكون اصغر  من 100");

          }

        }
      </script>

      <p>
        <?php
                                                  /*
                                                  $subid = $row['id'];
                                                  $file = fopen('idsubject.txt', 'a');
                                                  fwrite($file, $subid."\n");
                                                  fclose($file);*/
                                                  $subid[] = $row['id'];
                                                  

        ?>
        <?php echo htmlentities($row['SubjectName']); ?>
        <input type="number" name="marks[]" value="" min="0" max="100" class="form-control" required="required" placeholder="ادخل الدرجة ما بين 0-100" autocomplete="off" onchange="handlechange(this)">

      </p>

<?php  }
$filename = 'idsubject.csv';
$f = fopen($filename, 'w'); 
while ($subid) {
  fputcsv($f, $subid);
  break;
}
fclose($f);
                                              }
                                            }


?>

<?php
/*
if (!empty($_POST["studclass"])) {
  $id = $_POST['studclass'];
  $dta = explode("$", $id);
  $id = $dta[0];
  $id1 = $dta[1];
  $query = $dbh->prepare("SELECT StudentId,ClassId FROM tblresult WHERE StudentId=:id1 and ClassId=:id ");
  //$query= $dbh -> prepare($sql);
  $query->bindParam(':id1', $id1, PDO::PARAM_STR);
  $query->bindParam(':id', $id, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) { ?>
    <p>
      <?php
      echo "<span style='color:red'> Result Already Declare .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
      ?></p>
<?php }
} */ ?>