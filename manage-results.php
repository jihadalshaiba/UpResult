<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {

?>
    <link rel="stylesheet" type="text/css" href="assets/js/DataTables/datatables.min.css" />
    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php'); ?>
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper" dir="rtl">
        <div class="content-container">
            <?php include('includes/leftbar.php'); ?>

            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-12 text-center">
                            <h2 class="title text-center h1">ادارة درجات الطلاب</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

                <section class="section">
                    <div class="container-fluid">



                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h4>عرض كل درجات الطلاب</h4>
                                        </div>
                                    </div>
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                        </div><?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="panel-body p-20">

                                        <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">اسم الطالب</th>
                                                    <th class="text-center">الكلية / والقسم</th>
                                                    <th class="text-center">الترم</th>
                                                    <th class="text-center">المادة</th>
                                                    <th class="text-center">المنيجة</th>
                                                    <th class="text-center">الحالة</th>
                                                    <th class="text-center">حدث</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">اسم الطالب</th>
                                                    <th class="text-center">الكلية / والقسم</th>
                                                    <th class="text-center">الترم</th>
                                                    <th class="text-center">المادة</th>
                                                    <th class="text-center">المنيجة</th>
                                                    <th class="text-center">الحالة</th>
                                                    <th class="text-center">حدث</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT rs.id,sd.StudentName, dp.collection, sm.semster, su.SubjectName, rs.Marks, rs.Status FROM tblstudents sd, tbdepartment dp, tblsubjects su, tblsemster sm, tblresults rs WHERE sd.StudentId = rs.StudentID AND dp.id = rs.CollegeDepartmentID AND sm.id = rs.TermID AND su.id = rs.SubjectID;";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {   ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($result->StudentName); ?></td>
                                                            <td><?php echo htmlentities($result->collection); ?></td>
                                                            <td><?php echo htmlentities($result->semster); ?></td>
                                                            <td><?php echo htmlentities($result->SubjectName); ?></td>
                                                            <td><?php echo htmlentities($result->Marks); ?></td>
                                                            <td><?php echo htmlentities($result->RegDate); ?></td>
                                                            <td><?php if ($result->Status == 1) {
                                                                    echo htmlentities('Active');
                                                                } else {
                                                                    echo htmlentities('Blocked');
                                                                }
                                                                ?></td>
                                                            <td>
                                                                <a href="edit-results.php?stid=<?php echo htmlentities($result->id); ?>" class="btn btn-info"><i class="fa fa-edit" title="Edit Record"></i> </a>

                                                            </td>
                                                        </tr>
                                                <?php $cnt = $cnt + 1;
                                                    }
                                                } ?>


                                            </tbody>
                                        </table>


                                        <!-- /.col-md-12 -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->


                        </div>
                        <!-- /.col-md-12 -->
                    </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-md-6 -->

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



<?php } ?>