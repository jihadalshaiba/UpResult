<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if (isset($_POST['submit'])) {
        $departmentname = $_POST['departmentname'];
        $collegename = $_POST['collegename'];
        $collection = $collegename . ' - ' . $departmentname;
        $check = "SELECT tbdepartment.departmentname from tbdepartment WHERE tbdepartment.departmentname=:departmentname AND tbdepartment.collegename=:collegename;";
        $query2 = $dbh->prepare($check);
        $query2->bindParam(':departmentname', $departmentname, PDO::PARAM_STR);
        $query2->bindParam(':collegename', $collegename, PDO::PARAM_STR);
        $query2->execute();
        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
        if ($query2->rowCount() == 0) {
            $sql = "INSERT INTO  tbdepartment(departmentname,collegename,collection) VALUES(:departmentname,:collegename,:collection)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':departmentname', $departmentname, PDO::PARAM_STR);
            $query->bindParam(':collegename', $collegename, PDO::PARAM_STR);
            $query->bindParam(':collection', $collection, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $msg = "تم انشاء الكلية";
            } else {
                $error = "حدث خطى يرجى الاعادة";
            }
        }
        else
        {
            $error="تم تكرار بيانات القسم";
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
                        <div class="col-md-12" dir="rtl">
                            <h1 class="text-right" style="font-size:40px;font-weight: bold;text-align: center;">أنشاء قسم ضمن كلية</h1>
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
                                            <h4 style="color: black;font-size: larger;">ادخال معلومات القسم</h4>
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
                                                <label for="success" class="control-label" style="font-size: large;color: black;">اسم القسم</label>
                                                <div class="">
                                                    <input type="text" name="departmentname" class="form-control" style="border-color: #2AA1AF; font-size: 18px;" required="required" id="success">
                                                    <span class="help-block">مثال/ قسم تكنلوجيا المعلومات - قسم الشبكات</span>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="default" class="control-label" style="font-size: 18px; color: black;"> أختر الكلية </label>
                                                <select name="collegename" class="form-control" id="default" required="required" style="font-size: 18px;">
                                                    <option value="">الكلية</option>
                                                    <?php $sql = "SELECT collegename from tbcolleges";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {   ?>
                                                            <option value="<?php echo htmlentities($result->collegename); ?>"><?php echo htmlentities($result->collegename); ?> </option>
                                                    <?php }
                                                    } ?>
                                                </select>
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