<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    //For Deleting the notice

    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "delete from tbcolleges where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        echo '<script>alert("تم حذف الكلية.")</script>';
        echo "<script>window.location.href = 'manage-college.php'</script>";
    }

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
                        <div class="col-md-12">
                            <h2 class="title text-center">ادارة الكليات</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>

                </div>
                <!-- /.container-fluid -->

                <section class="section">
                    <div class="container-fluid">



                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h4>جميع الكليات</h4>
                                        </div>
                                    </div>

                                    <div class="panel-body p-20">

                                        <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">اسم الكلية</th>

                                                    <th class="text-center">الحدث</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">اسم الكلية</th>
                                                    <th class="text-center">الحدث</th>

                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $sql = "SELECT id,collegename from tbcolleges";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {   ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo htmlentities($cnt); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlentities($result->collegename); ?>
                                                            </td>

                                                            <td>
                                                                <a href="edit-college.php?collegeid=<?php echo htmlentities($result->id); ?>" class="btn btn-info"><i class="fa fa-edit" title="Edit Record"></i> </a>
                                                                <a href="manage-college.php?id=<?php echo htmlentities($result->id); ?>" onclick="return confirm('تم الحذف بنجاح?');" class="btn btn-danger"><i class="fa fa-trash" title="Delete this Record"></i> </a>
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