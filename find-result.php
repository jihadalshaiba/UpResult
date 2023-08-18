<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
    $rollid = $_POST['rollid'];
    $password = md5($_POST['password']);
    $semsterid = $_POST['semster'];
    $qery = "SELECT ts.StudentId,ts.Status,ts.StudentName,ts.RollId,ts.password,tr.TermID FROM tblstudents ts,tblresults tr WHERE  ts.RollId=:rollid AND tr.TermID=:semsterid  and ts.password=:password ";
    $stmt = $dbh->prepare($qery);
    $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':semsterid', $semsterid, PDO::PARAM_STR);
    $stmt->execute();
    $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);
    if ($stmt->rowCount() > 0) {
        foreach ($resultss as $row) {
            $sid = $row->StudentId;
            if ($row->Status == 0) {
                echo "<script>alert(' يرجى مراجعة المالية ')</script>";
                echo "<script>window.location.href ='find-result.php'</script>";
            } else {
                if ($rollid == $row->RollId && $password == $row->password) {
                    $string = rtrim($semsterid);
                    if ($string == $row->TermID) {
                        $_SESSION["rollid"] = $rollid;
                        $_SESSION["password"] = $password;
                        $_SESSION["semsterid"] = $semsterid;
                        echo "<script>window.location.href ='result.php'</script>";
                    } else {
                        echo "<script>alert('لم يتم رفع مواد هذا الترم ')</script>";
                        echo "<script>window.location.href ='find-result.php'</script>";
                    }
                }
            }
        }
    } else { {
            echo "<script>alert(' الرقم الاكاديمي او كلمة المرور خاطئة - او لم يتم رفع مواد هذا الترم')</script>";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل دخول الطالب</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/icheck/skins/flat/blue.css">
    <link rel="stylesheet" href="assets/css/main.css" media="screen">
    <script src="assets/js/modernizr/modernizr.min.js"></script>
</head>

<body class="" style="background-image: url(images/background.jpeg); background-color: #ffffff; background-size: cover; height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="main-wrapper">
        <div class="login-bg-color">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel login-box" style="    background: #ffffff;">
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <a href="#">
                                    <img style="height: 70px" src="images/logo.png"></a>
                                <h3 class="text-white">ادارة نتائج الطلاب</h3>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <form method="post" class="admin-login">
                                <div class="form-group">
                                    <label for="rollid" class="control-label" style="color: #172541; font-size:20px; font-weight: bold;" dir="rtl">ادخل الرقم
                                        الاكاديمي</label>
                                    <input type="number" class="form-control" style="color: #172541; font-size:14px;" dir="rtl" id="rollid" require placeholder="ادخل الرقم الاكاديمي" autocomplete="off" name="rollid">
                                </div>
                                <div class="form-group">
                                    <label for="rollid" class="control-label" style="color: #172541; font-size:20px; font-weight: bold;" dir="rtl">ادخل كلمة
                                        المرور </label>
                                    <input type="password" class="form-control" style="color: #172541; font-size:14px;" dir="rtl" id="rollid" require placeholder="ادخل كلمة المرور " autocomplete="off" name="password">
                                </div>
                                <div class="form-group" dir="rtl">
                                    <label for="default" style="color: #172541; font-size:20px; font-weight: bold;" dir="rtl" class="control-label">المستوى</label>
                                    <label for="default" class=" subtitle"> الترم </label>
                                    <select name="semster" class="form-control" id="email" required="required">
                                        <option id="subtitle" value=""> الترم</option>
                                        <?php $sql = "SELECT id,semster from tblsemster";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {   ?>
                                                <option id="subtitle" value="<?php echo htmlentities($result->id); ?> ">
                                                    <?php echo htmlentities($result->semster); ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>


                                <div class="form-group mt-20">
                                    <div class="" dir="rtl">
                                        <button type="submit" name="submit" class="btn" style="font-size:16px; font-weight: bold; color:#FFFFFF; background-color:#04888F">الاستعلام</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="index.php" style="color: #172541; font-size:16px; font-weight: bold;" dir="rtl">العودة الى الصفحة الرئيسية</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-md-6 col-md-offset-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /. -->
    </div>
    <!-- /.main-wrapper -->
    <!-- ========== COMMON JS FILES ========== -->
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/pace/pace.min.js"></script>
    <script src="assets/js/lobipanel/lobipanel.min.js"></script>
    <script src="assets/js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="assets/js/icheck/icheck.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="assets/js/main.js"></script>
    <script>
        $(function() {
            $('input.flat-blue-style').iCheck({
                checkboxClass: 'icheckbox_flat-blue'
            });
        });
    </script>
    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>