<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if (isset($_POST['Update'])) {
        $gid = intval($_GET['collegeid']);
        $collegename = $_POST['collegename'];
        $check = "SELECT tbcolleges.collegename from tbcolleges WHERE tbcolleges.collegename=:collegename ";
        $query2 = $dbh->prepare($check);
        $query2->bindParam(':collegename', $collegename, PDO::PARAM_STR);
        $query2->execute();
        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
        if ($query2->rowCount() == 0)
        {
            
            $sql = "update  tbcolleges set collegename=:collegename where id=:gid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':collegename', $collegename, PDO::PARAM_STR);
            $query->bindParam(':gid', $gid, PDO::PARAM_STR);
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
                            <h2 class="title text-center">تعديل بيانات الكلية </h2>

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
                                            $gid = intval($_GET['collegeid']);
                                            $sql = "SELECT collegename from tbcolleges where id=:gid";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':gid', $gid, PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <table class="" style="width: 75%;">
                                                        <tr>
                                                            <td class="td-tb"><label for="default" class="">اسم الكلية</label></td>
                                                            <td class="td-tb"><input type="text" name="collegename" id="email" value="<?php echo htmlentities($result->collegename); ?>" class="form-control" id="default" placeholder=" اسم الكلية" required="required"></td>
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