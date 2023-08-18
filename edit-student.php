<?php
session_start(); //كود بدا الجلسة المستخدم 
error_reporting(0); //كود يعطي تقرير في حالة وقوع خطى
include('includes/config.php'); // كود جلب الاتصال من قاعدة البيانات 
if (strlen($_SESSION['alogin']) == "") //كود التاكد من اذا كان المستخدم مسجل دخول او لا
{
    header("Location: index.php"); // اذا لم يكون مسجل فانه يعمل على تحويل الصفحة الى الصفحة الرئيسية 
    
} else {

    $stid = intval($_GET['stid']); //استقبال id للطالب ليتم تعديلها 

    if (isset($_POST['submit']) && $_FILES['images']) //التاكد من الصورة ارتفعت وكذلك التاكيد على بيانات الورم
    {
        $img_name = $_FILES['images']['name'];//متغير ياخذ اسم الصورة
        $img_size = $_FILES['images']['size'];//متغير ياخذ حجم الصورة
        $tmp_name = $_FILES['images']['tmp_name'];//متغير ياخذ ياخزن الصورة في ملف موقت
        $error = $_FILES['images']['error'];// متغير ييظهر اذا وقد خطى في رفع الصورة

        if ($error === 0) {//اتاكد من انه لا توجد اي خطى في رفع الصورة
            if ($img_size > 10000000) {//التاكد من ان حجم الصورة مش اكبر من 10 ميجا
                $error = " عذراً حجم الملف اكبر من الحجم المسموح به اقصى حجم 10 ميجا.";
                
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);//متغير ياخذ امتداد الصورة
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");//الامتدادات المسموح بها للستخدام

                if (in_array($img_ex_lc, $allowed_exs)) {//مصفوفه للتاكد من الامتدادت للصورة
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;//متغير يعمل على اضافة ارقام عشواية للصورة من شان ما يحدث تكرار للصورة
                    $img_upload_path = 'images/image-students/' . $new_img_name;//وضع الصورة في مسار image/inage-students
                    move_uploaded_file($tmp_name, $img_upload_path);//كود نقل الصور الى المسار المحدد


                    $studentname = $_POST['fullname'];//متغير ياخذ اسم الطالب
                    $rollid = $_POST['rollid'];//متغير ياخذ الرقم الاكاديمي
                    //$images=$_POST['images']; 
                    $studentemail = $_POST['studentemail'];// متغير ياخذ الايميل
                    $gender = $_POST['gender'];//متغير ياخذ الجنس
                    $CollegeDepartment = $_POST['CollegeDepartment'];// متغير ياخذ الكلية والقسم
                    $RegDate = $_POST['RegDate'];// متغير ياخذ تاريخ التسجيل
                    $Phone = $_POST['Phone'];//متغير ياخذ الرقم 
                    $UpdationDate = date("Y-m-d h:i:sa");//  متغير ياخذ التاريخ الحالي للتعديل
                    $status = $_POST['status'];// متغير ياخذ جالة الطالب
                    $sql = "UPDATE tblstudents set StudentName=:studentname,RollId=:rollid,images=:new_img_name,StudentEmail=:studentemail,Gender=:gender,CollegeDepartment=:CollegeDepartment,RegDate=:RegDate,Phone=:Phone,UpdationDate=:UpdationDate,Status=:status where StudentId=:stid ";///كود الاستعلام للتعديل 
                    $query = $dbh->prepare($sql);
               
                    if ($query->execute([':studentname' => $studentname, ':rollid' => $rollid, ':new_img_name' => $new_img_name, ':studentemail' => $studentemail, ':gender' => $gender, ':CollegeDepartment' => $CollegeDepartment, ':RegDate' => $RegDate, 'Phone' => $Phone, ':UpdationDate' => $UpdationDate, ':status' => $status, ':stid' => $stid]))//كود تعديل البيانات حسب كل متغير
                    
                    {
                        $msg = "تم عملية تحديث البيانات بنجاح";
                    } else {
                        $error = "فشلت عملية التحديث";
                    }
                }
            }
        }else
        {
            $new_img_name = "/";
            $studentname = $_POST['fullname'];//متغير ياخذ اسم الطالب
                    $rollid = $_POST['rollid'];//متغير ياخذ الرقم الاكاديمي
                    //$images=$_POST['images']; 
                    $studentemail = $_POST['studentemail'];// متغير ياخذ الايميل
                    $gender = $_POST['gender'];//متغير ياخذ الجنس
                    $CollegeDepartment = $_POST['CollegeDepartment'];// متغير ياخذ الكلية والقسم
                    $RegDate = $_POST['RegDate'];// متغير ياخذ تاريخ التسجيل
                    $Phone = $_POST['Phone'];//متغير ياخذ الرقم 
                    $UpdationDate = date("Y-m-d h:i:sa");//  متغير ياخذ التاريخ الحالي للتعديل
                    $status = $_POST['status'];// متغير ياخذ جالة الطالب
                    $sql = "UPDATE tblstudents set StudentName=:studentname,RollId=:rollid,images=:new_img_name,StudentEmail=:studentemail,Gender=:gender,CollegeDepartment=:CollegeDepartment,RegDate=:RegDate,Phone=:Phone,UpdationDate=:UpdationDate,Status=:status where StudentId=:stid ";///كود الاستعلام للتعديل 
                    $query = $dbh->prepare($sql);
               
                    if ($query->execute([':studentname' => $studentname, ':rollid' => $rollid, ':new_img_name' => $new_img_name, ':studentemail' => $studentemail, ':gender' => $gender, ':CollegeDepartment' => $CollegeDepartment, ':RegDate' => $RegDate, 'Phone' => $Phone, ':UpdationDate' => $UpdationDate, ':status' => $status, ':stid' => $stid]))//كود تعديل البيانات حسب كل متغير
                    
                    {
                        $msg = "تم عملية تحديث البيانات بنجاح";
                    } else {
                        $error = "فشلت عملية التحديث";
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
                            <h2 class="title h1 text-center">تعديل بيانات الطلاب</h2>

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
                                        <h5>املاء بيانات الطلاب للتعدييل</h5>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>نجحت العملية!</strong><?php echo htmlentities($msg); ?>
                                        </div><?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>فشلت العملية!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                    <form  method="post" enctype="multipart/form-data">
                                        <?php
                                        $sql = "SELECT StudentName,RollId,images,StudentEmail,Gender,CollegeDepartment,RegDate,Phone,Status from tblstudents where StudentId=" . $stid;//يتم الاستعلام بيانات الطلاب حسب id
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':stid', $stid, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {  ?>
                                                <div class="form-group col-md-12" >
                                                    <div class="image form-input">
                                                        <label for="img" class="btn-all">اختر ملف الصور</label>
                                                        <input type="file" name="images" id="img" style="display: none;" accept="image/*"  onchange="document.getElementById('lbltext').innerHTML='تم اخيار الصورة'">
                                                        <p id="lbltext" style="color: black; padding-top: 20px; padding-right: 10px;">يجب اختيار الملف</p>
                                                        <?php echo "<img width='50px' height='50px' src='images/image-students/" . htmlentities($result->images) . "'/>"; ?>
                                                    </div>
                                                </div>

                                                <table id="example" dir="rtl" class="display table table-striped table-bordered text-center" cellspacing="0" width="50%">
                                                    <tr class="text-center">
                                                        <td><label for="default" class="texttable">الاسم كامل</label></td>
                                                        <td><input type="text" name="fullname" class="form-control" id="fullanme" value="<?php echo htmlentities($result->StudentName) ?>" required="required" autocomplete="off"></td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td><label for="default" class="texttable">الرقم الاكاديمي</label></td>
                                                        <td><input type="number" name="rollid" class="form-control"  id="rollid" value="<?php echo htmlentities($result->RollId) ?>" maxlength="5" required="required" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="default" class="texttable">البريد الالكتروني</label></td>
                                                        <td><input type="email" name="studentemail" class="form-control" id="email" value="<?php echo htmlentities($result->StudentEmail) ?>" required="required" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="default" class="texttable">الجنس</label></td>
                                                        <td>

                                                            <?php $gndr = $result->Gender;
                                                            if ($gndr == "ذكر") {
                                                            ?>
                                                                <input type="radio" name="gender" value="ذكر" required="required" checked>ذكر <input type="radio" name="gender" value="انثى" required="required">انثى
                                                            <?php } ?>
                                                            <?php
                                                            if ($gndr == "انثى") {
                                                            ?>
                                                                <input type="radio" name="gender" value="ذكر" required="required">ذكر <input type="radio" name="gender" value="انثى" required="required" checked>انثى
                                                            <?php } ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="default" class="texttable">الكلية - القسم</label></td>
                                                        <td>

                                                            <select name="CollegeDepartment" class="form-control" id="email" required="required">
                                                                <option id="subtitle" value="">الكلية + القسم</option>
                                                                <?php $sql = "SELECT departmentname,collegename from tbdepartment";
                                                                $query = $dbh->prepare($sql);
                                                                $query->execute();
                                                                $rslt = $query->fetchAll(PDO::FETCH_OBJ);
                                                                if ($query->rowCount() > 0) {
                                                                    foreach ($rslt as $rsult) {   ?>
                                                                        <option id="subtitle" value="<?php echo htmlentities($rsult->collegename); ?> - <?php echo htmlentities($rsult->departmentname); ?>"> <?php echo htmlentities($rsult->collegename); ?> - <?php echo htmlentities($rsult->departmentname); ?> </option>
                                                                <?php }
                                                                } ?>
                                                            </select>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="date" class="texttable">تاريخ التسجيل</label></td>
                                                        <td><input type="date" name="RegDate" class="form-control" value="<?php echo htmlentities($result->RegDate) ?>" id="date"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="date" class="texttable">رقم التلفون </label></td>
                                                        <td><input type="number" name="Phone" id="fullanme" class="form-control" value="<?php echo htmlentities($result->Phone) ?>" </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="date" class="texttable">الحالة </label></td>
                                                        <td>

                                                            <?php $stats = $result->Status;
                                                            if ($stats == "1") {
                                                            ?>
                                                                <input type="radio" name="status" value="1" required="required" checked>مفعل <input type="radio" name="status" value="0" required="required">موقف
                                                            <?php } ?>
                                                            <?php
                                                            if ($stats == "0") {
                                                            ?>
                                                                <input type="radio" name="status" value="1" required="required">مفعل <input type="radio" name="status" value="0" required="required" checked>موقف
                                                            <?php } ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><button type="submit" name="submit" class="btn-all">تعديل</button></td>
                                                    </tr>
                                                </table>
                                        <?php }
                                        } ?>



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