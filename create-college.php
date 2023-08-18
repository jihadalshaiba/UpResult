<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if (isset($_POST['submit'])) {
        $collegename = $_POST['collname'];
        $collegenumberdep = $_POST['collnumberdep'];
        $check = "SELECT tbcolleges.collegename from tbcolleges WHERE tbcolleges.collegename=:collegename;";
        $query2 = $dbh->prepare($check);
        $query2->bindParam(':collegename', $collegename, PDO::PARAM_STR);
        $query2->execute();
        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
        if ($query2->rowCount() == 0) {
            $sql = "INSERT INTO  tbcolleges(collegename,collegenumberdep) VALUES(:collegename,:collegenumberdep)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':collegename', $collegename, PDO::PARAM_STR);
            $query->bindParam(':collegenumberdep', $collegenumberdep, PDO::PARAM_STR);

            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $msg = "تم انشاء الكلية";
            } else {
                $error = "حدث خطى يرجى الاعادة";
            }
        } else {
            $error = "تم تكرار بيانات الكلية";
        }
    }
?>


    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php'); ?>
    <!-----End Top bar-->
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper" dir="rtl">
        <div class="content-container">

            <!-- ========== LEFT SIDEBAR ========== -->
            <?php include('includes/leftbar.php'); ?>
            <!-- /.left-sidebar -->

            <div class="main-page" dir="rtl">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-6" dir="rtl">
                            <h1 class="text-right" style="font-size:40px;font-weight: bold;">أنشاء كلية</h1>
                        </div>

                    </div>
                    <!-- /.row 
                            <div class="row breadcrumb-div" dir="rtl">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> الرئيسية</a></li>
            							<li><a href="#">الكليات</a></li>
            							<li class="active">انشاء كلية</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                <section class="section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h4 style="color: black;">ادخال معلومات الكلية</h4>
                                        </div>
                                    </div>
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>تم بنجاح!</strong><?php echo htmlentities($msg); ?>
                                        </div><?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>حدث خطى!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="panel-body">

                                        <form method="post">
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label" style="font-size: large;color: black;">اسم الكلية</label>
                                                <div class="">
                                                    <input type="text" name="collname" class="form-control" style="border-color: #2AA1AF;" required="required" id="success">
                                                    <span class="help-block">مثال/ كلية الحاسوب - الادارة</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label" style="font-size: large;color: black;">عدد الاقسام في الكلية</label>
                                                <div class="">
                                                    <input type="number" name="collnumberdep" required="required" style="border-color: #2AA1AF;" class="form-control" id="success">
                                                    <span class="help-block">مثال/ 1,2,3,4</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <div class="">
                                                    <button type="submit" name="submit" class="btn-all">حفظ</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-8 col-md-offset-2 -->
                        </div>
                        <!-- /.row -->




                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.section -->

            </div>
            <!-- /.main-page -->

        </div>
        <!-- /.content-container -->
    </div>
    <!-- /.content-wrapper -->
    <?php include('includes/footer.php'); ?>



<?php  } ?>