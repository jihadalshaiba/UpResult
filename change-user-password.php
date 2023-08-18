<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
    $password = md5($_POST['oldpass']); ///متغيير كلمة المرور السابقة
    $newpassword = md5($_POST['newpass']); ////متغيير كلمة المرور الجديده
    $stid = intval($_GET['stid']); ///متغيير الرقم التسلسلي الطالب
    $sql = "SELECT password FROM tblstudents WHERE password=:password and StudentId=:stid;"; ///كود الاستعلام عن كلمة الخاصة بالطالب
    $query = $dbh->prepare($sql); //كود تجهز الاستعلام مع الاتصال
    $query->bindParam(':stid', $stid, PDO::PARAM_STR); ///مطابقة بين المتغير والقيمة المدخله
    $query->bindParam(':password', $password, PDO::PARAM_STR); ///مطابقة بين المتغير والقيمة المدخله
    $query->execute(); //كود تنفيذ الاستعلام 
    $results = $query->fetchAll(PDO::FETCH_OBJ); ///كود جلب كامل البيانات 
    if ($query->rowCount() > 0) { //
        $con = "update tblstudents set password=:newpassword where StudentId=:stid;"; //الاستعلام على تعديل كلمة المرور 
        $chngpwd1 = $dbh->prepare($con); //كود تجهز الاستعلام مع الاتصال
        $chngpwd1->bindParam(':stid', $stid, PDO::PARAM_STR); ///مطابقة بين المتغير والقيمة المدخله
        $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR); ///مطابقة بين المتغير والقيمة المدخله
        $chngpwd1->execute();
        $msg = "نجحت عملية تغيير كلمة المرور";
    } else {
        $error = "فشلت عملية تغيير كلمة المرور";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تغيير كلمة المرور </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <link rel="stylesheet" href="assetss/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) { //كود جافا سكربت للتاكد من مطابقة كلمة المرور
                alert("يجب ان تكون كلمة الجديدة وتاكيدها متطابقتان  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>


    <!-- Top Menu 1 -->
    <section class="w3l-top-menu-1">
        <div class="top-hd">
            <div class="container">
                <header class="row top-menu-top">
                    <div class="accounts col-md-9 col-6">
                        <li class="top_li"><span class="fa fa-phone"></span><a href="tel:+9671432345">+967 1 432345 </a> </li>
                        <li class="top_li1"><span class="fa fa-envelope-o"></span> <a href="mailto:info@yju.edu.ye" class="mail"> info@yju.edu.ye</a> </li>
                    </div>
                    <div class="social-top col-md-3 col-6">
                        <a href="contact.html" class="btn btn-secondary btn-theme4" style="color:#ffffff"> تواصل معنا</a>
                    </div>
                </header>
            </div>
        </div>
    </section>
    <!-- //Top Menu 1 -->
    <section class="w3l-bootstrap-header">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa fa-bars"></span>
                </button>


            </div>
        </nav>
    </section>


    <div class="main-wrapper" dir="rtl">
        <div class="content-wrapper">
            <div class="content-container">


                <!-- /.left-sidebar -->

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-12">
                                <h2 class="title" align="center">تغيير كلمة المرور الخاصة بالطالب </h2>
                            </div>





                        </div>

                    </div>
                    <br>
                    <br>
                    <form name="chngpwd" method="post" onSubmit="return valid();">

                        <table id="example" class="display table table-striped table-bordered text-center" style="width: 70%;">
                            <tr>
                                <td><label class="control-label">كلمة المرور الحالية</label></td>
                                <td><input type="password" name="oldpass" class="form-control" id="email" placeholder="يجب ان تكون كلمة المرور ارقام فقط" /></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">كلمة المرور الجديدة</label></td>
                                <td><input type="password" name="newpass" class="form-control" id="email" placeholder="يجب ان تكون كلمة المرور ارقام فقط" /></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">تاكيد كلمة المرور </label></td>
                                <td><input type="password" name="conpass" class="form-control" id="email" placeholder="يجب ان تكون كلمة المرور ارقام فقط" /></td>
                            </tr>
                            <tr>
                                <td><a href="index.php" class="btn-all">العودة الى الصفحة الرئيسية</a></td>
                                <td><input type="submit" name="submit" class="btn-all" value="تعديل"></td>

                            </tr>
                        </table>

                    </form>
                </div>

            </div>



        </div>
        <!-- /.main-page -->


    </div>
    <!-- /.content-container -->
    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
        $(function($) {

        });


        function CallPrint(strid) {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>



    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

</body>

</html>