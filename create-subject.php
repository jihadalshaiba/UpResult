<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if (isset($_POST['submit'])) {

        $subjectname = $_POST['subjectname'];

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
        $check = "SELECT tblsubjects.SubjectName from tblsubjects WHERE tblsubjects.SubjectName=:subjectname and tblsubjects.CollegeDepartmentID=:CollegeDepartmentID and semsterID=:semsterID";
        $query2 = $dbh->prepare($check);
        $query2->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
        $query2->bindParam(':CollegeDepartmentID', $CollegeDepartmentID, PDO::PARAM_STR);
        $query2->bindParam(':semsterID', $semsterID, PDO::PARAM_STR);
        $query2->execute();
        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
        if ($query2->rowCount() == 0) {
            $sql = "INSERT INTO  tblsubjects(SubjectName,semsterID,semster,CollegeDepartmentID,CollegeDepartment) VALUES(:subjectname,:semsterID,:semster,:CollegeDepartmentID,:CollegeDepartment)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
            $query->bindParam(':semsterID', $semsterID, PDO::PARAM_STR);
            $query->bindParam(':semster', $semster, PDO::PARAM_STR);
            $query->bindParam(':CollegeDepartment', $CollegeDepartment, PDO::PARAM_STR);
            $query->bindParam(':CollegeDepartmentID', $CollegeDepartmentID, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $msg = "تم اضافة المادة بنجاح";
            } else {
                $error = "يوجد خطى يرجى اعادة المحاولة";
            }
        }
        else
        {
            $error="لقد تم اضافة هذه المادة مسبقاً";
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

            <div class="main-page" dir="rtl">

                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-12">
                            <h2 class="title text-center">انشاء مادة تدريس</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>
                    <!-- /.row -->

                </div>
                <section class="section">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5 class="h1">ادخل بيانات المادة</h5>
                                        </div>
                                    </div>
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
                                                <label for="default" class=" subtitle">اسم المادة</label>
                                                <input type="text" name="subjectname" class="form-control" id="email" placeholder="اسم المادة" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="default" class=" subtitle">الكلية / القسم</label>
                                                <select name="CollegeDepartment" class="form-control" id="email" required="required">
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
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class=" subtitle"> الترم </label>
                                        <select name="semster" class="form-control" id="email" required="required">
                                            <option id="subtitle" value=""> الترم</option>
                                            <?php $sql = "SELECT semster from tblsemster";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <option id="subtitle" value="<?php echo htmlentities($result->semster); ?> "> <?php echo htmlentities($result->semster); ?> </option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group col-md-12">

                                    <button type="submit" name="submit" class="btn-all">أضافة</button>

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
    </div>
    <!-- /.content-wrapper -->
    <?php include('includes/footer.php'); ?>



<?PHP } ?>