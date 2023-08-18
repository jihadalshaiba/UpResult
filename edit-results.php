<?php
session_start();//كود بدا الجلسة المستخدم 
error_reporting(0);//كود يعطي تقرير في حالة وقوع خطى
include('includes/config.php');// كود جلب الاتصال من قاعدة البيانات 
if (strlen($_SESSION['alogin']) == "") {//كود التاكد من اذا كان المستخدم مسجل دخول او لا
    header("Location: index.php");// اذا لم يكون مسجل فانه يعمل على تحويل الصفحة الى الصفحة الرئيسية 
} else {

    $stid = intval($_GET['stid']);//استقبال id للنتيجة ليتم تعديلها 
    if (isset($_POST['submit'])) {

        //$iid = $_POST['id'];
        $marks = $_POST['marks'];//تعديل النتيجة المختاره حسب id
        $sql = "update tblresults  set Marks=:marks where id=:stid ";//كود التعديل على النتيجة حسب id
        $query = $dbh->prepare($sql);
        $query->bindParam(':marks', $marks, PDO::PARAM_STR);//مطابقة البيانات الحقل بال القيمة الجديدة للعديل
        $query->bindParam(':stid', $stid, PDO::PARAM_STR);//مطابقة id الطالب الذي نريد تعديل درجته
        $query->execute();//تنفيذ الاستعلام

        $msg = "تم تعديل الدرجة المادة";//رسالة النجاح في عمالية التعديل 
    }

?>


    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php');//كود جلب الشريط الرئيسي الذي الصفحة الرئيسية  ?>
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper" dir="rtl">
        <div class="content-container">

            <!-- ========== LEFT SIDEBAR ========== -->
            <?php include('includes/leftbar.php');// كود جلب القائمة الجانبية  ?>
            <!-- /.left-sidebar -->

            <div class="main-page">

                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-12">
                            <h2 class="title text-center h1">تعديل بيانات درجة المادة</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>
                    <!-- /.row -->

                    <!-- /.row -->
                </div>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>تعديل درجة المادة التالية</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong><?php echo htmlentities($msg);//طباعة ريالة النجاح في عملية التعديل  ?>
                                        </div><?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error);//رسالة الخطى في عملية التعديل  ?>
                                        </div>
                                    <?php } ?>
                                    <form class="form-horizontal" method="post">

                                        <?php

                                        $ret = "SELECT tblstudents.StudentName,tblsubjects.SubjectName,tblresults.Marks FROM tblstudents,tblsubjects,tblresults WHERE tblstudents.StudentId=tblresults.StudentID and tblsubjects.id=tblresults.SubjectID AND tblresults.id=:stid";//كود جلب اسم الطالب والمادة والدرجة المراد تعديلها حسب id المختار;
                                        $stmt = $dbh->prepare($ret);
                                        $stmt->bindParam(':stid', $stid, PDO::PARAM_STR);
                                        $stmt->execute();
                                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($stmt->rowCount() > 0) {
                                            foreach ($result as $row) { //دوارة لجلب جميع الصفوف في جدول الدرجات لتعديل الدرجة المختاره  ?>

                                                <table class="display table  table-bordered text-center" cellspacing="0" width="50%">

                                                    <tr class="text-center">
                                                        <td><label for="default">أسم الطالب</label></td>
                                                        <td><?php echo htmlentities($row->StudentName);//طباعة الاسم ?></td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td><label for="default">أسم المادة</label></td>

                                                        <td><?php echo htmlentities($row->SubjectName) //طباعة اسم المادة?></td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td><label for="default">درجة المادة </label></td>
                                                        <td><input type="number" name="marks" class="form-control" value="<?php echo htmlentities($row->Marks) //طباعة الدرجة?>" required="required" autocomplete="off"></td>
                                                    </tr>

                                                </table>

                                        <?php }
                                        } ?>





                                        <tr>
                                            <td><button type="submit" name="submit" class="btn-all">تعديل</button></td>
                                        </tr>


                                    </form>

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