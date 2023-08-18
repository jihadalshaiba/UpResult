<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if (isset($_POST['submit'])) {
        $marks = array();
        $CollegeDepartmentID = $_POST['CollegeDepartmentID'];
        $studentid = $_POST['studentid'];
        $mark = $_POST['marks'];
        $termid = $_POST["semster"];
        //$subids = array();
        /*$stmt = $dbh->prepare("SELECT tblsubjects.SubjectName,tblsubjects.id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=:cid order by tblsubjects.SubjectName");
        $stmt->execute(array(':cid' => $class));
        $sid1 = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            array_push($sid1, $row['id']);
        }*/

        //$SubjectID = $_POST[""];
        /*
        $file_handle = fopen("idsubject.txt", 'r', FILE_IGNORE_NEW_LINES);
        while (!feof($file_handle)) {
            $line_of_text[] = fgetc($file_handle);
        }
        fclose($file_handle);*/
        //$subids = [];
        $file_handle =array_map('str_getcsv',file("idsubject.csv"));
        $sperate_array=array();
        foreach($file_handle as $row)
        {
            foreach($row as $value)
            {
                $sperate_array[]=$value;
            }
        }
        /*while (($row = fgetcsv($file_handle)) !== false) {
            $data[] = $row;
        }*/
        fclose($file_handle);
        $sid = $sperate_array;
        for ($i = 0; $i < count($mark); $i++) {
            $mar = $mark[$i];
            
            $stu = 1;

            $check = "SELECT rs.StudentID,rs.CollegeDepartmentID,rs.SubjectID,rs.TermID from tblresults rs WHERE rs.StudentID=:studentid AND rs.CollegeDepartmentID=:CollegeDepartmentID AND rs.SubjectID=:sid AND rs.TermID=:termid;";
            $query2 = $dbh->prepare($check);
            $query2->bindParam(':studentid', $studentid, PDO::PARAM_STR);
            $query2->bindParam(':CollegeDepartmentID', $CollegeDepartmentID, PDO::PARAM_STR);
            $query2->bindParam(':sid', $sid[$i], PDO::PARAM_STR);
            $query2->bindParam(':termid', $termid, PDO::PARAM_STR);
            $query2->execute();
            $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
            if ($query2->rowCount() == 0)
                    {
            $sql = "INSERT INTO tblresults(StudentID, CollegeDepartmentID, SubjectID, TermID, Marks,Status)VALUES(:studentid,:CollegeDepartmentID,:sid,:termid,:marks,:stu)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
            $query->bindParam(':CollegeDepartmentID', $CollegeDepartmentID, PDO::PARAM_STR);
            $query->bindParam(':sid', $sid[$i], PDO::PARAM_STR);
            $query->bindParam(':termid', $termid, PDO::PARAM_STR);
            $query->bindParam(':marks', $mar, PDO::PARAM_STR);
            $query->bindParam(':stu', $stu, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $msg = "تم ادخال بيانات الدرجات بنجاح";
            } else {
                $error = "حدث خطى لم يتم ادخال البيانات";
            }
        }else{
                $error="لم يتم ادخل بعض المواد نتيجت لتكراراها ";
        }
        }
    }
?>

    <script>
        function getStudents(val) {
            $.ajax({
                type: "POST",
                url: "get_students.php",
                data: 'CollegeDepartmentID=' + val,
                success: function(data) {
                    $("#studentid").html(data);

                }
            });

        }
        $.ajax({
            type: "POST",
            url: "get_student.php",
            data: 'termid=' + val,
            success: function(data) {
                $("#subject").html(data);

            }
        });

        function getterms(val) {
            $.ajax({
                type: "POST",
                url: "get_students.php",
                data: 'termid=' + val,
                success: function(data) {
                    $("#subject").html(data);

                }
            });
        }
    </script>

    <script>
        function getresult(val, clid) {

            var clid = $(".clid").val();
            var val = $(".stid").val();;
            var abh = clid + '$' + val;
            //alert(abh);
            $.ajax({
                type: "POST",
                url: "get_students.php",
                data: 'studclass=' + abh,
                success: function(data) {
                    $("#reslt").html(data);

                }
            });
        }
    </script>



    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php'); ?>
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper" dir="rtl">
        <div class="content-container">

            <!-- ========== LEFT SIDEBAR ========== -->
            <?php include('includes/leftbar.php'); ?>
            <!-- /.left-sidebar -->

            <div class="main-page">

                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-12">
                            <h2 class="title text-center">أضافة الدرجات</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>

                </div>
                <section class="section">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel">

                                    <div class="panel-body">
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>نجحت العملية!</strong><?php echo htmlentities($msg); ?>
                                            </div><?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>فشلت العملية!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                        <form class="" method="post">

                                            <div class="form-group">
                                                <label for="default" class="control-label">الكلية والقسم</label>

                                                <select name="CollegeDepartmentID" class="form-control" id="CollegeDepartmentID" onChange="getStudents(this.value);" required="required">
                                                    <option id="subtitle" value="">الكلية + القسم</option>
                                                    <?php $sql = "SELECT * from tbdepartment";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {   ?>
                                                            <option id="subtitle" value="<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities($result->collegename); ?> - <?php echo htmlentities($result->departmentname); ?> </option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="control-label">الترم </label>
                                                <select name="semster" class="form-control" id="termid" onChange="getterms(this.value);" required="required">
                                                    <option id="subtitle" value=""> الترم</option>
                                                    <?php $sql = "SELECT * from tblsemster";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $resultss = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($resultss as $resulte) {   ?>
                                                            <option id="subtitle" value="<?php echo htmlentities($resulte->id); ?> "> <?php echo htmlentities($resulte->semster); ?> </option>
                                                    <?php }
                                                    } ?>
                                                </select>







                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">اسم الطالب</label>
                                                    <select name="studentid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
                                                    </select>
                                                </div>

                                                <div class="form-group">

                                                    <div id="reslt">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class="control-label">المواد</label>
                                                    <div id="subject">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <button type="submit" name="submit" id="submit" class="btn-all">اضافة الدرجات</button>

                                                </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('includes/footer.php'); ?>



    <?PHP } ?>