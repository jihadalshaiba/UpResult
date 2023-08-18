<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if (isset($_POST['Update'])) {
        $sid = intval($_GET['subjectid']);
        $subjectname = $_POST['subjectname'];
        $CollegeDepartment = $_POST['CollegeDepartment'];
        $stmt1 = "SELECT id from tbdepartment where collection = '$CollegeDepartment'";
        $query = $dbh->prepare($stmt1);
        $query->execute();
        $results1 = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results1 as $resulte1) {
                $id1 = $resulte1->id;
            }
        }
        $CollegeDepartmentID = $id1;

        $semster = $_POST['semster'];
        $stmt = "SELECT id from tblsemster where semster = '$semster'";
        $query = $dbh->prepare($stmt);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $resulte) {
                $id = $resulte->id;
            }
        }
        $semsterID = $id;
        $check = "SELECT tblsubjects.SubjectName from tblsubjects WHERE tblsubjects.SubjectName=:subjectname and tblsubjects.CollegeDepartmentID=:CollegeDepartmentID and semsterID=:semsterID";
        $query2 = $dbh->prepare($check);
        $query2->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
        $query2->bindParam(':CollegeDepartmentID', $CollegeDepartmentID, PDO::PARAM_STR);
        $query2->bindParam(':semsterID', $semsterID, PDO::PARAM_STR);
        $query2->execute();
        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
        if ($query2->rowCount() == 0)
        {
            $UpdationDate = date("Y-m-d h:i:sa");
            $sql = "update  tblsubjects set SubjectName=:subjectname,CollegeDepartment=:CollegeDepartment,semsterID=:semsterID,semster=:semster,UpdationDate=:UpdationDate where id=:sid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
            $query->bindParam(':CollegeDepartment', $CollegeDepartment, PDO::PARAM_STR);
            $query->bindParam(':semsterID', $semsterID, PDO::PARAM_STR);
            $query->bindParam(':semster', $semster, PDO::PARAM_STR);
            $query->bindParam(':UpdationDate', $UpdationDate, PDO::PARAM_STR);
            $query->bindParam(':sid', $sid, PDO::PARAM_STR);
            
            $query->execute();
            $msg = "تم تعديل بيانات المادة";
        }
        else
        {
            $error="لقد تم تعديل البيانات بشكل خاطى --- تكرار"; 
        }
              
        
    }
?>


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
                            <h2 class="title text-center">تعديل بيانات مادة التدريس</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>
                    <!-- /.row -->

                </div>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h5 id="subtitle">تعديل البيانات</h5>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>نجحت عملية التعديل!</strong><?php echo htmlentities($msg); ?>
                                        </div><?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>فشل عملية التعديل!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="panel-body">
                                        <form method="post">
                                            <?php
                                            $sid = intval($_GET['subjectid']);
                                            $sql = "SELECT * from tblsubjects where id=:sid";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <table class="" style="width: 75%;">
                                                        <tr>
                                                            <td class="td-tb"><label for="default" class="">اسم المادة</label></td>
                                                            <td class="td-tb"><input type="text" name="subjectname" id="email" value="<?php echo htmlentities($result->SubjectName); ?>" class="form-control" id="default" placeholder="Subject Name" required="required"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-tb"><label for="default" class=" subtitle">الكلية / القسم</label></td>
                                                            <td class="td-tb"><select name="CollegeDepartment" class="form-control" id="email" required="required">
                                                                    <option id="subtitle" value="">الكلية + القسم</option>
                                                                    <?php $sql = "SELECT departmentname,collegename from tbdepartment";
                                                                    $query = $dbh->prepare($sql);
                                                                    $query->execute();
                                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                    if ($query->rowCount() > 0) {
                                                                        foreach ($results as $result) {   ?>
                                                                            <option id="subtitle" value="<?php echo htmlentities($result->collegename); ?> - <?php echo htmlentities($result->departmentname); ?>"> <?php echo htmlentities($result->collegename); ?> - <?php echo htmlentities($result->departmentname); ?> </option>
                                                                    <?php }
                                                                    } ?>
                                                                </select></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-tb"> <label for="default" class=" subtitle"> الترم </label></td>
                                                            <td class="td-tb">
                                                                <select name="semster" class="form-control" id="email" required="required">
                                                                    <option id="subtitle" value=""> الترم</option>
                                                                    <?php $sql = "SELECT id,semster from tblsemster";
                                                                    $query = $dbh->prepare($sql);
                                                                    $query->execute();
                                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                    if ($query->rowCount() > 0) {
                                                                        foreach ($results as $result) {
                                                                            ?>
                                                                            <option id="subtitle" value="<?php echo htmlentities($result->semster); ?> "> <?php echo htmlentities($result->semster); ?> </option>
                                                                            
                                                                    <?php }
                                                                     

                                                                    } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                    <?php }
                                            } ?>
                                                    <td></td>
                                                    <td> <button type="submit" name="Update" class="btn-all">تعديل</button> </td>
                                                        </tr>
                                                    </table>







                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                </div>
            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('includes/footer.php'); ?>



    <?PHP } ?>