
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        
    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "delete from tblsubjects where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        echo '<script>alert("تم حذف المادة.")</script>';
        echo "<script>window.location.href = 'manage-subjects.php'</script>";
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
                                    <h2 class="title text-center">أدارة مواد التدريس </h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5 id="subtitle">عرض المواد</h5>
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

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" id="subtitle1">#</th>
                                                            <th class="text-center" id="subtitle1">أسم المادة</th>
                                                            <th class="text-center" id="subtitle1">الكلية / القسم</th>
                                                            <th class="text-center" id="subtitle1"> الترم </th>
                                                            <th class="text-center" id="subtitle1">تاريخ الانشاء</th>
                                                            <th class="text-center" id="subtitle1">تاريخ التحديث</th>
                                                            <th class="text-center" id="subtitle1">الحالة</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                          <th class="text-center" id="subtitle1">#</th>
                                                          <th class="text-center" id="subtitle1">أسم المادة</th>
                                                          <th class="text-center" id="subtitle1">الكلية / القسم</th>
                                                          <th class="text-center" id="subtitle1"> الترم </th>
                                                          <th class="text-center" id="subtitle1">تاريخ الانشاء</th>
                                                          <th class="text-center" id="subtitle1">تاريخ التحديث</th>
                                                          <th class="text-center" id="subtitle1">الحالة</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
<?php $sql = "SELECT * from tblsubjects";
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
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->SubjectName);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->CollegeDepartment);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->semster);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->Creationdate);?></td>
                                                            <td class="text-center" id="subtitle1"><?php echo htmlentities($result->UpdationDate);?></td>
<td>
<a href="edit-subject.php?subjectid=<?php echo htmlentities($result->id);?>" class="btn btn-info"><i class="fa fa-edit" title="Edit Record"></i> </a> 
<a href="manage-subjects.php?id=<?php echo htmlentities($result->id); ?>" onclick="return confirm('تم الحذف بنجاح?');" class="btn btn-danger"><i class="fa fa-trash" title="Delete this Record"></i> </a>
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


<?php } ?>

