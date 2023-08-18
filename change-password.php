<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if (isset($_POST['submit'])) {
        $password = md5($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $username = $_SESSION['alogin'];
        $sql = "SELECT Password FROM admin WHERE UserName=:username and Password=:password";
        $query = $dbh->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            $con = "update admin set Password=:newpassword where UserName=:username";
            $chngpwd1 = $dbh->prepare($con);
            $chngpwd1->bindParam(':username', $username, PDO::PARAM_STR);
            $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd1->execute();
            $msg = "نجحت عملية تغيير كلمة المرور";
        } else {
            $error = "فشلت عملية تغيير كلمة المرور";
        }
    }
?>

    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("يجب ان تكون كلمة الجديدة وتاكيدها متطابقتان  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>

    <?php include('includes/topbar.php'); ?>
    <div class="content-wrapper" dir="rtl">
        <div class="content-container">
            <?php include('includes/leftbar.php'); ?>
            <!-- /.left-sidebar -->

            <div class="main-page" dir="rtl">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-12">
                            <h2 class="title h1 text-center">تغيير كلمة المرور الخاصة بمدير النظام</h2>
                        </div>

                    </div>
                    <!-- /.row -->


                    <section class="section">
                        <div class="container-fluid">





                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5 id="subtitle">ادخل كلمة المرور للتعديل</h5>
                                            </div>
                                        </div>
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>نجحت العملية!</strong><?php echo htmlentities($msg); ?>
                                            </div><?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>فشلت العملية!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>

                                        <div class="panel-body">

                                            <form name="chngpwd" method="post" \ onSubmit="return valid();">
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label" id="subtitle">كلمة المرور الحالية</label>
                                                    <div class="">
                                                        <input type="password" id="email" name="password" class="form-control" required="required" id="success">

                                                    </div>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label" id="subtitle">كلمة المرورالجديدة</label>
                                                    <div class="">
                                                        <input type="password" id="email" name="newpassword" required="required" class="form-control" id="success">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label" id="subtitle">تاكيد كلمة المرور</label>
                                                    <div class="">
                                                        <input type="password" id="email" name="confirmpassword" class="form-control" required="required" id="success">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success">

                                                    <div class="">
                                                        <button type="submit" name="submit" class="btn-all">تعديل</button>
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