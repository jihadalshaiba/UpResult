<?php
session_start();
error_reporting(0);
include('includes/config.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        
        
        if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $StudentName = $row['0'];
                $RollId = $row['1'];
                $StudentEmail = $row['2'];
                $Gender = $row['3'];
                $CollegeDepartment = $row['4'];
                $RegDate = $row['5'];
                $Phone = $row['6'];
                $Status = $row['7'];
                $sql="INSERT INTO  tblstudents(StudentName,RollId,StudentEmail,Gender,CollegeDepartment,RegDate,Phone,Status) VALUES(:studentname,:rollid,:studentemail,:gender,:CollegeDepartment,:RegDate,:Phone,:status)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':studentname',$StudentName,PDO::PARAM_STR);
                $query->bindParam(':RollId,',$RollId,PDO::PARAM_STR);
                $query->bindParam(':StudentEmail',$StudentEmail,PDO::PARAM_STR);
                $query->bindParam(':Gender',$Gender,PDO::PARAM_STR);
                $query->bindParam(':CollegeDepartment',$CollegeDepartment,PDO::PARAM_STR);
                $query->bindParam(':RegDate',$RegDate,PDO::PARAM_STR);
                $query->bindParam(':Phone',$Phone,PDO::PARAM_STR);
                $query->bindParam(':Status',$Status,PDO::PARAM_STR);
                $query->execute();

                $lastInsertId = $dbh->lastInsertId();
                if($lastInsertId)
                {
                    $msg = "نجحت عملية استيراد البيانات";
                }
                else
                {
                    $error = "فشلت عملية استيراد البيانات";
                }
                
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "تم استيراد البيانات";
            //header('Location: index.php');
            //exit(0);
        }
        else
        {
            $_SESSION['message'] = "فشل عملية استيراد البيانات";
            //header('Location: index.php');
            //exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "نوع الملف مطابق";
        //header('Location: index.php');
        //exit(0);
    }
}
?>

        
       
            


            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper" dir="rtl">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" style="font-size:40px;font-weight: bold;text-align: center;">استيراد البيانات من  ملف اكسل </h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                          
                        </div>
                        <section class="section">
                        <div class="container-fluid" >
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5 class="h1">استيراد بيانات الطالب</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <?php if($msg){?>
                                                <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>تمت العملية بنجاح!</strong><?php echo htmlentities($msg); ?>
                                            </div><?php } 
                                                else if($error){?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>حدث خطى!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                                <?php } ?>
                                        <form class="row"  method="POST" enctype="multipart/form-data">
                                        
                                            <div class="form-group col-md-12">
                                                <div class="image form-input">
                                                    <label for="img"  class="btn-all">اختر ملف الاكسل</label>
                                                    <input type="file" name="import_file" id="img" style="display: none;" accept="file_ext/*" required="required" onchange="document.getElementById('lbltext').innerHTML='تم اخيار الصورة'">
                                                    <p id="lbltext" style="color: black; padding-top: 20px; padding-right: 10px;">يجب اختيار الملف</p>
                                                </div>
                                                    
                                                
                                            </div>

                                                
                                            <div class="form-group col-md-12">
                                                <button type="submit" name="save_excel_data" class="btn-all">استيراد</button>
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
<?php include('includes/footer.php');?>

  

<?PHP } ?>
