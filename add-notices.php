<?php
session_start();
error_reporting(0);
include('includes/config.php');
//include('includes/header.php');
$stid = intval($_GET['stid']);
include('includes/config.php');



if (isset($_POST['submit'])) {
    $rdfile = fopen("name.txt", "r");
    while (!feof($rdfile)) {
        $name = fread($rdfile, 1024);
    }
    
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $sql = "INSERT INTO  tblnotice(name,subject,text) VALUES(:name,:subject,:text)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':subject', $subject, PDO::PARAM_STR);
    $query->bindParam(':text', $text, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = "نجحة عملية تقديم التظلم";
    } else {
        $error = "فشلت عملية تقديم التظلم";
    }
}




?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> تقديم تضلم</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <link rel="stylesheet" href="assetss/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        function getterms(val) {
            $.ajax({
                type: "POST",
                url: "get_term.php",
                data: 'termid=' + val,

                success: function(data) {
                    $("#subject").html(data);
                }
            });
            alert("hajdj");
            document("adjkjadkjkj");
        }
    </script>

</head>

<body>



    <!-- Top Menu 1 -->
    <section class="w3l-top-menu-1">
        <div class="top-hd">
            <div class="container">
                <header class="row top-menu-top">
                    <div class="accounts col-md-9 col-6">
                        <li class="top_li"><span class="fa fa-phone"></span><a href="tel:+9671432345">+967 1 432345 </a>
                        </li>
                        <li class="top_li1"><span class="fa fa-envelope-o"></span> <a href="mailto:info@yju.edu.ye" class="mail"> info@yju.edu.ye</a> </li>
                    </div>
                    <div class="social-top col-md-3 col-6">
                        <a href="contact.html" class="btn btn-secondary btn-theme4" style="color:#ffffff"> تواصل
                            معنا</a>
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
                                <h2 class="title" align="center">تقديم تظلم </h2>
                            </div>
                        </div>

                    </div>


                    <section class="section" id="exampl">
                        <div class="container-fluid">

                            <div class="row">



                                <div class="col-md-12 col-md-offset-2">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <?php if ($msg) { ?>
                                                    <div class="alert alert-success left-icon-alert" role="alert">
                                                        <strong>تمت العملية بنجاح!</strong><?php echo htmlentities($msg); ?>
                                                    </div><?php } else if ($error) { ?>
                                                    <div class="alert alert-danger left-icon-alert" role="alert">
                                                        <strong>حدث خطى!</strong> <?php echo htmlentities($error); ?>
                                                    </div>
                                                <?php } ?>
                                                <form method="post">
                                                    <hr />
                                                    <?php


                                                    $qery = "SELECT tblstudents.StudentName from tblstudents WHERE tblstudents.StudentId=:stid; ";
                                                    $stmt = $dbh->prepare($qery);
                                                    $stmt->bindParam(':stid', $stid, PDO::PARAM_STR);
                                                    $stmt->execute();
                                                    $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                    if ($stmt->rowCount() > 0) {
                                                        foreach ($resultss as $row) {
                                                            $sid = $row->StudentId;
                                                            $name = $row->StudentName;
                                                            $file = fopen('name.txt', 'w');
                                                            fwrite($file, $name);
                                                            fclose($file);
                                                            //$names = $row->StudentName;
                                                    ?>
                                                            <table class="display table  table-bordered text-center" cellspacing="0" width="50%">

                                                                <tr class="text-center">
                                                                    <td><b>اسم الطالب :</b>
                                                                        <?php echo htmlentities($row->StudentName); ?>
                                                                    </td>


                                                                </tr>
                                                            </table>


                                            </div>
                                            <div class="panel-body p-20">
                                                <table class="table table-hover table-bordered" width="50%">
                                                    <tr>
                                                        <td class="text-center">اسم الطالب</td>
                                                        <td class="text-center"><input type="text" name="name" style="width: 100%;" disabled value="<?php echo htmlentities($row->StudentName); ?>"></td>

                                                    </tr>
                                            <?php

                                                        }
                                                    }
                                            ?>



                                            <tr>
                                                <td class="text-center">المادة</td>
                                                <td class="text-center">
                                                    <input type="text" style="width: 100%;" placeholder="اسم المادة" name="subject">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">نص التظلم</td>
                                                <td class="text-center">
                                                    <textarea name="text" style="width: 100%; height: 200px;">

                                                    </textarea>

                                                </td>
                                            </tr>


                                                </table>








                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="row">

                                        <div class="col-sm-6"><button name="submit" type="submit" class="btn-all">تقديم التطلم
                                        </div>
                                        <div class="col-sm-6"><a href="index.php" class="btn-all">العودة الى الصفحة
                                                الرئيسية</a></div>
                                        </form>
                                    </div>

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