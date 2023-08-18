<?php
session_start();
error_reporting(0);
include('includes/config.php');
//include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نتيجة الطالب</title>
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



    <!-- Top Menu 1 -->
    <section class="w3l-top-menu-1">
        <div class="top-hd">
            <div class="container">
                <header class="row top-menu-top">
                    <div class="accounts col-md-9 col-6">
                        <li class="top_li"><span class="fa fa-phone"></span><a href="tel:+9671432345">+967 1 432345 </a> </li>
                        <li class="top_li1"><span class="fa fa-envelope-o"></span> <a href="mailto:info@yju.edu.ye" class="mail"> info@yju.edu.ye</a> </li>
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
                                <h2 class="title" align="center">نظام ادارة نتائج الطلاب</h2>
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
                                                <h3 class="text-center">تفاصيل الدرجات</h3>
                                                <hr />
                                                <?php

                                                $rollid = $_SESSION['rollid'];
                                                $password = $_SESSION['password'];
                                                $semsterid = $_SESSION['semsterid'];
                                                //$_SESSION['rollid'] = $rollid;
                                                //$_SESSION['semster'] = $semster;
                                                $qery = "SELECT ts.StudentId,ts.StudentName,ts.RollId,ts.password, sm.semster FROM tblstudents ts, tblsemster sm WHERE  ts.RollId=:rollid AND sm.id=:semsterid  and ts.password=:password ";
                                                $stmt = $dbh->prepare($qery);
                                                $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                                                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                                                $stmt->bindParam(':semsterid', $semsterid, PDO::PARAM_STR);
                                                $stmt->execute();
                                                $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($stmt->rowCount() > 0) {
                                                    foreach ($resultss as $row) {
                                                        $sid = $row->StudentId;
                                                        if ($rollid == $row->RollId && $password == $row->password) {
                                                ?>
                                                            <table class="display table  table-bordered text-center" cellspacing="0" width="50%">

                                                                <tr class="text-center" >
                                                                    <td ><b >اسم الطالب :</b> <?php echo htmlentities($row->StudentName); ?></td>
                                                                    <td><b>الرقم الاكاديمي :</b> <?php echo htmlentities($row->RollId); ?></td>
                                                                    <td><b>الترم:</b> <?php echo htmlentities($row->semster); ?></td>
                                                                    <td><b><a href="change-user-password.php?stid=<?php echo  htmlentities($sid); ?>" class="btn-all">تغيير كلمة المرور </a></td>
                                                                </tr>
                                                            </table>
                                                    <?php
                                                        }
                                                    }


                                                    ?>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table id="exampl" class="table table-hover table-bordered" width="50%">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <th style="text-align: center">#</th>
                                                            <th style="text-align: center"> المادة</th>
                                                            <th style="text-align: center">الدرجة</th>
                                                        </tr>
                                                    </thead>




                                                    <tbody>
                                                        <?php
                                                        $query = "SELECT  tblsubjects.SubjectName,tblresults.Marks,tblresults.Status FROM tblsubjects,tblresults WHERE tblsubjects.id=tblresults.SubjectID AND tblresults.StudentID=:sid AND tblresults.TermID=:semsterid";
                                                        $query = $dbh->prepare($query);
                                                        $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                                                        $query->bindParam(':semsterid', $semsterid, PDO::PARAM_STR);

                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;

                                                        if ($countrow = $query->rowCount() > 0) {
                                                            foreach ($results as $result) {
                                                                if ($result->Status == 1) {
                                                        ?>

                                                                    <tr>
                                                                        <th scope="row" style="text-align: center"><?php echo htmlentities($cnt); ?></th>
                                                                        <td style="text-align: center"><?php echo htmlentities($result->SubjectName); ?></td>
                                                                        <td style="text-align: center"><?php echo htmlentities($totalmarks = $result->Marks); ?></td>
                                                                    </tr>
                                                            <?php
                                                                } else {
                                                                    echo htmlentities("<strong>يرجى مراجعة الادارة المالية!</strong>");
                                                                }
                                                                $totlcount += $totalmarks;
                                                                $cnt++;
                                                            }
                                                            ?>
                                                            <tr>
                                                                <th scope="row" colspan="2" style="text-align: center">مجموع الدارجات</th>
                                                                <td style="text-align: center"><b><?php echo htmlentities($totlcount); ?></b> من <b><?php echo htmlentities($outof = ($cnt - 1) * 100); ?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2" style="text-align: center">المعدل</th>
                                                                <td style="text-align: center"><b><?php echo  htmlentities($totlcount * (100) / $outof); ?> %</b></td>
                                                            </tr>

                                                            <tr>

                                                                <td colspan="3" class="text-center"><i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" onclick="window.print()"></i></td>
                                                            </tr>

                                                        <?php


                                                        } else { ?>
                                                            <div class="alert alert-warning left-icon-alert" role="alert">
                                                                <strong>ملاحظة!</strong> لم يتم الاعلان عن نتيجتك
                                                            <?php }
                                                            ?>
                                                            </div>
                                                        <?php
                                                    } else { ?>

                                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                                <strong>حدث خطى!</strong>
                                                            <?php
                                                            echo htmlentities("الرقم الاكاديمي خطى او كلمة المرور - او ان المستخدم تم توقيفة فيرجى مراجعة الادارة المالية");
                                                        }
                                                            ?>
                                                            </div>



                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3"><a href="add-notices.php?stid=<?php echo  htmlentities($sid); ?>" class="btn-all">تقديم تظلم </a></div>
                                        <div class="col-sm-3"><a href="index.php" class="btn-all">العودة الى الصفحة الرئيسية</a></div>
                                        <div class="col-sm-3"></div>
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