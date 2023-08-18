
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if($_GET['id'])
{
$id=$_GET['id'];
$sql="delete from tblstudents where StudentId=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("تم حذف الطالب.")</script>';
echo "<script>window.location.href = 'manage-students.php'</script>";

}

?>

<link rel="stylesheet" type="text/css" href="assets/js/DataTables/datatables.min.css"/>
            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper" dir="rtl">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title text-center h1">ادارة الطلاب</h2>
                                
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
                                                    <h4>عرض معلومات الطلاب</h4>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20">
                                                <table id="example" dir="rtl" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">
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
                                                            <?php $sql = "SELECT StudentId,StudentName,RollId,images,StudentEmail,Gender,CollegeDepartment,RegDate,phone,UpdationDate,Status from tblstudents";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                            $cnt=1;
                                                            if($query->rowCount() > 0)
                                                            {
                                                            foreach($results as $result)
                                                            {   ?>
                                                            <tr>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($cnt);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->StudentName);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->RollId);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo "<img width='50px' height='50px' src='images/image-students/".htmlentities($result->images)."'/>"; ?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->StudentEmail);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->Gender);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->CollegeDepartment);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->RegDate);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->phone);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->UpdationDate);?></td>
                                                            
                                                            <td id="subtitle"><?php if($result->Status==1){
                                                            echo htmlentities('مفعل');
                                                            }
                                                            else{
                                                            echo htmlentities('موقف'); 
                                                            }
                                                                ?></td>
<td>
<a href="edit-student.php?stid=<?php echo htmlentities($result->StudentId);?>" class="btn btn-info"><i class="fa fa-edit" title="Edit Record"></i> </a> 
<a href="manage-students.php?id=<?php echo htmlentities($result->StudentId);?>"onclick="return confirm('تم الحذف بنجاح?');"class="btn btn-danger"><i class="fa fa-trash" title="Delete this Record"></i> </a>


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
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>

< 

        
<?php } ?>

