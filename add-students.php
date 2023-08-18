<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {


    if (isset($_POST['submit']) && isset($_FILES['images'])) {


        $img_name = $_FILES['images']['name'];
        $img_size = $_FILES['images']['size'];
        $tmp_name = $_FILES['images']['tmp_name'];
        $error = $_FILES['images']['error'];

        if ($error === 0) {
            if ($img_size > 10000000) {
                $error = " عذراً حجم الملف اكبر من الحجم المسموح به اقصى حجم 10 ميجا.";
                //header("Location: index.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'images/image-students/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    //$images=addcslashes(file_get_contents($_FILES['images']['tmp_name']));
                    $studentname = $_POST['fullname'];
                    $rollid = $_POST['rollid'];
                    $studentemail = $_POST['emailid'];
                    $gender = $_POST['gender'];
                    $CollegeDepartment = $_POST['CollegeDepartment'];

                    $stmt = "SELECT id from tbdepartment where collection = '$CollegeDepartment'";
                    $query = $dbh->prepare($stmt);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if ($query->rowCount() > 0) {
                        foreach ($results as $resulte) {
                            $id = $resulte->id;
                        }
                    }
                    $CollegeDepartmentID = $id;

                    $Phone = $_POST['Phone'];
                    $RegDate = $_POST['RegDate'];
                    $status = 1;
                    $check = "SELECT tblstudents.RollId from tblstudents WHERE tblstudents.RollId=:rollid;";
                    $query2 = $dbh->prepare($check);
                    $query2->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                    $query2->execute();
                    $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                    if ($query2->rowCount() == 0) {
                        $sql = "INSERT INTO  tblstudents(StudentName,RollId,images,StudentEmail,Gender,CollegeDepartmentID,CollegeDepartment,RegDate,Phone,Status) VALUES(:studentname,:rollid,:new_img_name,:studentemail,:gender,:CollegeDepartmentID,:CollegeDepartment,:RegDate,:Phone,:status)";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':studentname', $studentname, PDO::PARAM_STR);
                        $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                        $query->bindParam(':new_img_name', $new_img_name, PDO::PARAM_STR);
                        $query->bindParam(':studentemail', $studentemail, PDO::PARAM_STR);
                        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
                        $query->bindParam(':CollegeDepartmentID', $CollegeDepartmentID, PDO::PARAM_STR);
                        $query->bindParam(':CollegeDepartment', $CollegeDepartment, PDO::PARAM_STR);
                        $query->bindParam(':RegDate', $RegDate, PDO::PARAM_STR);
                        $query->bindParam(':Phone', $Phone, PDO::PARAM_STR);
                        $query->bindParam(':status', $status, PDO::PARAM_STR);
                        $query->execute();
                        $lastInsertId = $dbh->lastInsertId();
                        if ($lastInsertId) {
                            $msg = "نجحة عملية اضافة بيانات الطالب";
                        } else {
                            $error = "فشلت عملية اضافة بيانات الطالب يرجى المحاولة مره";
                        }
                    } else {
                        $error = "تم تكرار بيانات الطالب ";
                    }
                } else {
                    $error = "امتداد الصورة غير مسموح به";
                    //header("Location: index.php?error=$msg");
                }
            }
        } else {
            $new_img_name = "/";
            $studentname = $_POST['fullname'];
            $rollid = $_POST['rollid'];
            $studentemail = $_POST['emailid'];
            $gender = $_POST['gender'];
            $CollegeDepartment = $_POST['CollegeDepartment'];

            $stmt = "SELECT id from tbdepartment where collection = '$CollegeDepartment'";
            $query = $dbh->prepare($stmt);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {
                foreach ($results as $resulte) {
                    $id = $resulte->id;
                }
            }
            $CollegeDepartmentID = $id;

            $Phone = $_POST['Phone'];
            $RegDate = $_POST['RegDate'];
            $status = 1;
            $check = "SELECT tblstudents.RollId from tblstudents WHERE tblstudents.RollId=:rollid;";
            $query2 = $dbh->prepare($check);
            $query2->bindParam(':rollid', $rollid, PDO::PARAM_STR);
            $query2->execute();
            $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
            if ($query2->rowCount() == 0) {
                $sql = "INSERT INTO  tblstudents(StudentName,RollId,images,StudentEmail,Gender,CollegeDepartmentID,CollegeDepartment,RegDate,Phone,Status) VALUES(:studentname,:rollid,:new_img_name,:studentemail,:gender,:CollegeDepartmentID,:CollegeDepartment,:RegDate,:Phone,:status)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':studentname', $studentname, PDO::PARAM_STR);
                $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                $query->bindParam(':new_img_name', $new_img_name, PDO::PARAM_STR);
                $query->bindParam(':studentemail', $studentemail, PDO::PARAM_STR);
                $query->bindParam(':gender', $gender, PDO::PARAM_STR);
                $query->bindParam(':CollegeDepartmentID', $CollegeDepartmentID, PDO::PARAM_STR);
                $query->bindParam(':CollegeDepartment', $CollegeDepartment, PDO::PARAM_STR);
                $query->bindParam(':RegDate', $RegDate, PDO::PARAM_STR);
                $query->bindParam(':Phone', $Phone, PDO::PARAM_STR);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->execute();
                $lastInsertId = $dbh->lastInsertId();
                if ($lastInsertId) {
                    $msg = "نجحة عملية اضافة بيانات الطالب";
                } else {
                    $error = "فشلت عملية اضافة بيانات الطالب يرجى المحاولة مره";
                }
            } else {
                $error = "تم تكرار بيانات الطالب ";
            }
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
                            <h2 class="title" style="font-size:40px;font-weight: bold;text-align: center;">اضافة الطلاب</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>

                </div>
                <section class="section">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5 class="h1">ادخل بيانات الطالب</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>تمت العملية بنجاح!</strong><?php echo htmlentities($msg); ?>
                                            </div><?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>حدث خطى!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                        <form class="row" method="post" enctype="multipart/form-data">

                                            <div class="form-group col-md-12">
                                                <div class="image form-input">
                                                    <label for="img" class="btn-all">اختر ملف الصور</label><!-- هذا المتغير -->
                                                    <input type="file" name="images" id="img" style="display: none;" accept="image/*" onchange="document.getElementById('lbltext').innerHTML='تم اخيار الصورة'">
                                                    <p id="lbltext" style="color: black; padding-top: 20px; padding-right: 10px;">يجب اختيار الملف</p>
                                                </div>


                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="default" class="control-label" id="subtitle">الاسم كامل</label>
                                                <input type="text" name="fullname" class="form-control" id="fullanme" required="required" autocomplete="off">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="default" class="control-label" id="subtitle">الرقم الاكاديمي</label>
                                                <input type="number" name="rollid" class="form-control" id="rollid" maxlength="5" required="required" autocomplete="off">

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="default" class="control-label" id="subtitle">رقم التلفون </label>
                                                <input type="number" name="Phone" class="form-control" id="email" required="required" autocomplete="off">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="default" class="control-label" id="subtitle">البريد الالكتروني</label>
                                                <input type="email" name="emailid" class="form-control" id="email" required="required" autocomplete="off">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="default" class="control-label" id="subtitle">الجنس</label>
                                                <input type="radio" name="gender" value="ذكر" required="required" checked="" id="subtitle"><span id="subtitle">ذكر</span> <input type="radio" id="subtitle" name="gender" value="انثى" required="required"><span id="subtitle">انثى</span>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="default" class="control-label" id="subtitle">الكلية / القسم</label>
                                                <select name="CollegeDepartment" class="form-control" id="email" required="required">
                                                    <option id="subtitle" value="">الكلية + القسم</option>
                                                    <?php $sql = "SELECT collegename,departmentname from tbdepartment";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {   ?>

                                                            <option id="subtitle" value="<?php echo htmlentities($result->collegename); ?> - <?php echo htmlentities($result->departmentname); ?>"> <?php echo htmlentities($result->collegename); ?> - <?php echo htmlentities($result->departmentname); ?> </option>
                                                    <?php }
                                                    } ?>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="date" class=" control-label" id="subtitle">تاريخ التسجيل</label>
                                                <input type="date" name="RegDate" class="form-control" id="email">
                                            </div>



                                            <div class="form-group col-md-12">
                                                <button type="submit" name="submit" class="btn-all">اضافة</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('includes/footer.php'); ?>



    <?PHP } ?>