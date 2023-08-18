<?php
session_start();//كود بدا الجلسة المستخدم 
error_reporting(0);//كود يعطي تقرير في حالة وقوع خطى
include('includes/config.php');// كود جلب الاتصال من قاعدة البيانات 
if(strlen($_SESSION['alogin'])=="")//كود التاكد من اذا كان المستخدم مسجل دخول او لا
{   header("Location: index.php"); }else{// اذا لم يكون مسجل فانه يعمل على تحويل الصفحة الى الصفحة الرئيسية 
?>


              <?php include('includes/topbar.php');//كود جلب الشريط الرئيسي الذي الصفحة الرئيسية ?>
            <div class="content-wrapper" dir="rtl"><!-- -->
                <div class="content-container" >

                    <?php include('includes/leftbar.php');// كود جلب القائمة الجانبية ?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title" style="font-size:40px;">لوحة التحكم</h2>
                                  
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                      
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section" >
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center " >
                                        <a class="dashboard-stat" href="manage-students.php" style="color:white;background-color:#2C3449">
                                            <?php 
                                            $sql1 ="SELECT StudentId from tblstudents ";//كود جلب id الطالب من جدول بيانات الطلاب
                                            $query1 = $dbh -> prepare($sql1);//
                                            $query1->execute();//كود تنفيذ الاستعلام
                                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);//كود جلب كل id
                                            $totalstudents=$query1->rowCount();//اسناد القيم الى المتغير totalstudents واظهار العدد الكلي
                                            ?>
                                            <span class="bg-icon color-white"><i class="fa fa-users color-white"></i></span>
                                            <span class="number counter " style="padding:10px;"><?php echo htmlentities($totalstudents);//طباعة عدد الطلاب ?></span>
                                            <span class="name color-white h3" style="padding:10px;">عدد الطلاب </span>
                                            
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center" >
                                        <a class="dashboard-stat bg-white" href="manage-subjects.php" style="color:white;background-color:#2C3449">
                                            <?php 
                                            $sql ="SELECT id from  tbdepartment ";// كود جلب id للاقسام 
                                            $query = $dbh -> prepare($sql);//كود تجهيز الاستعلام وربطة مع الاتصال بقاعدة البيانات
                                            $query->execute();///كود تنفيذ الاستعلام
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);//كود جلب كل id
                                            $totalsubjects=$query->rowCount();//اسناد القيم الى المتغير totalsubjects واظهار العدد الكلي
                                            ?>
                                            <span class="bg-icon color-white" ><i class="fa fa-ticket color-white"></i></span>
                                            <span class="number counter color-white" style="padding:10px;"><?php echo htmlentities($totalsubjects);//طباعة عدد الاقسام ?></span>
                                            <span class="name color-white h3" style="padding:10px;">عدد الاقسام</span>
                                           
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-white" href="manage-classes.php" style="color:white;background-color:#2C3449">
                                        <?php 
                                            $sql2 ="SELECT id from  tbcolleges ";// كود جلب id الكليات 
                                            $query2 = $dbh -> prepare($sql2);//كود تجهيز الاستعلام وربطة مع الاتصال بقاعدة البيانات
                                            $query2->execute();///كود تنفيذ الاستعلام
                                            $results2=$query2->fetchAll(PDO::FETCH_OBJ);//كود جلب كل id
                                            $totalcolleges=$query2->rowCount();//اسناد القيم الى المتغير totalcolleges واظهار العدد الكلي 
                                            ?>     
                                            <span class="bg-icon color-white"><i class="fa fa-bank color-white"></i></span>
                                            <span class="number counter color-white" style="padding:10px;"><?php echo htmlentities($totalcolleges);?></span>
                                            <span class="name color-white h3" style="padding:10px;">عدد الكليات</span>
                                            
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                        <a class="dashboard-stat bg-white" href="manage-results.php" style="color:white;background-color:#2C3449">
                                        <?php 
                                        $sql3="SELECT  id from  tblresults ";// كود جلب id للدرجات المعلنه 
                                        $query3 = $dbh -> prepare($sql3);
                                        $query3->execute();
                                        $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                                        $totalresults=$query3->rowCount();?> 
                                        <span class="bg-icon color-white" style="color:#2AA1AF"><i class="fa fa-file-text color-white"></i></span>
                                        <span class="number counter color-white" style="padding:10px;"><?php echo htmlentities($totalresults);?></span>
                                        <span class="name color-white h3" style="padding:10px;">عدد النتائج المرفوعه</span>
                                           
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                </div>
                                <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>اخر الدرجات المعدلة</h5>
                                                </div>
                                            </div>
                                <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                        <strong>تم العملية!</strong><?php echo htmlentities($msg);//كود اظهار رسالة نجاح الاستعلام من قاعدة البيانات ?>
                                </div><?php } 
                                else if($error){?>
                                <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>حدث خطى!</strong> <?php echo htmlentities($error);//كود اظهار رسالة خطى في حالة فشل في الاستعلام من قاعدة البيانات ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20 ">
                                            <table id="example" dir="rtl" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%"><!--جدول يحوي بيانات الطلاب -->
                                                    <thead>
                                                        <tr >
                                                            <th class="text-center" id="subtitle">#</th>
                                                            <th class="text-center" id="subtitle">اسم الطالب</th>
                                                            <th class="text-center" id="subtitle">الرقم الاكاديمي</th>
                                                            <th class="text-center" id="subtitle">الصورة </th>
                                                            <th class="text-center" id="subtitle">البريد الالكتروني </th>
                                                            <th class="text-center" id="subtitle">الجنس  </th>
                                                            <th class="text-center" id="subtitle">الكلية والتخصص</th>
                                                            <th class="text-center" id="subtitle">تاريخ التسجيل</th>
                                                            <th class="text-center" id="subtitle">التلفون</th>
                                                            <th class="text-center" id="subtitle">تاريخ اخر تحديث</th>
                                                            <th class="text-center" id="subtitle">الحالة</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-center" id="subtitle">#</th>
                                                            <th class="text-center" id="subtitle">اسم الطالب</th>
                                                            <th class="text-center" id="subtitle">الرقم الاكاديمي</th>
                                                            <th class="text-center" id="subtitle">الصورة </th>
                                                            <th class="text-center" id="subtitle">البريد الالكتروني </th>
                                                            <th class="text-center" id="subtitle">الجنس  </th>
                                                            <th class="text-center" id="subtitle">الكلية والتخصص</th>
                                                            <th class="text-center" id="subtitle">تاريخ التسجيل</th>
                                                            <th class="text-center" id="subtitle">التلفون</th>
                                                            <th class="text-center" id="subtitle">تاريخ اخر تحديث</th>
                                                            <th class="text-center" id="subtitle">الحالة</th>
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                            <?php $sql = "SELECT StudentId,StudentName,RollId,images,StudentEmail,Gender,CollegeDepartment,RegDate,phone,UpdationDate,Status from tblstudents";//كود جلب بيانات الطلاب كامله من قاعدة البيانات 
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                            $cnt=1;
                                                            if($query->rowCount() > 0)//كود التاكد من ان هناك بيانات للطلاب
                                                            {
                                                            foreach($results as $result)//كود دوارة جلب البيانات على صف صف
                                                            {   ?>
                                                            <tr>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($cnt);//طباعة الرقم التسلسلي للطالب?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->StudentName);//طباعة الاسم  للطالب?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->RollId);//طباعة الرقم الاكاديمي للطالب?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo "<img width='100px' height='100px' src='images/image-students/".htmlentities($result->images)."'/>";//طباعة الصوره  للطالب ?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->StudentEmail);//طباعة البريد الالكتروني  للطالب?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->Gender);//طباعة الجنس  للطالب?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->CollegeDepartment);//طباعة الكلية والقسم  للطالب?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->RegDate);//طباعة تاريخ التسجيل  للطالب?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->phone);//طباعة الرقم التلفون للطالب?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->UpdationDate);//طباعة تاريخ التعديل  للطالب?></td>
                                                            
                                                            <td id="subtitle"><?php if($result->Status==1){
                                                            echo htmlentities('مفعل');//طباعة حالة  للطالب
                                                            }
                                                            else{
                                                            echo htmlentities('موقف'); 
                                                            }
                                                                ?></td>
<td>
<a href="edit-student.php?stid=<?php echo htmlentities($result->StudentId);?>" class="btn btn-info"><i class="fa fa-edit" title="Edit Record"></i> </a> 
<!--زر التعديل على بيانات الطالب-->
</td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
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

    <?php include('includes/footer.php');//كود جلب البيانات التذييل?>


<?php } ?>
