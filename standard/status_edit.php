
<?php
$sql = "SELECT * FROM standard_tb WHERE standard_id = " . $_REQUEST["standard_id"];
$query = sqlsrv_query($conn, $sql);
$xx = sqlsrv_fetch_array($query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
</head>

<body>
<section class="items-grid section custom-padding">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2 class="wow fadeInUp" data-wow-delay=".4s">แก้ไขเอกสาร</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="grid-3">

                                <div class="form-group mb-2">
                                    <label for="">วาระจากที่ประชุม สมอ. </label>
                                    <input type="text" name="standard_meet" class="form-control" value="<?php echo $xx["standard_meet"] ?>">
                                </div>

                                <div class="form-group mb-2 f-red">
                                    <label for="">เลขที่ มอก.*</label>
                                    <input type="text" name="standard_number" class="form-control" required value="<?php echo $xx["standard_number"] ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="">ชื่อมาตรฐาน</label>
                                    <input type="text" name="standard_detail" class="form-control" value="<?php echo $xx["standard_detail"] ?>">
                                </div>

                                <!-- <div class="form-group mb-2">
                                    <label for="">ประเภทผลิตภัณฑ์. </label>
                                    <input type="text" name="type_id" class="form-control">
                                </div> -->

                                <div class="form-group mb-2">
                                    <div class="form-group mb-2">
                                        <label for="">มาตรฐานบังคับ</label>
                                        <input type="text" name="standard_mandatory" class="form-control" value="<?php echo $xx["standard_mandatory"] ?>">
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="">หมายเลข tracking</label>
                                    <input type="text" name="standard_tacking" class="form-control" value="<?php echo $xx["standard_tacking"] ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="">หมายเหตุ</label>
                                    <input type="text" name="standard_note" class="form-control" value="<?php echo $xx["standard_note"] ?>">
                                </div>



                                <div class="form-group mb-2">
                                    <label for="">ไฟล์แนบ</label>
                                    <input type="file" name="file" class="form-control" value="<?php echo $xx["file"] ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="">สถานะ</label>
                                    <input type="text" name="standard_note" class="form-control" >
                                </div>

                                <div class="form-group mb-2">
                                    <label for="">วันที่แต่งตั้ง</label>
                                    <input type="date" name="date" class="form-control">
                                    
                                </div>
                            </div>


                            <!-- หลายฟอร์ม -->
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-success">เพิ่ม</a>
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">กลุ่มผลิตภัณฑ์</label>
                                            <input type="text" name="group_name[]" class="form-control" placeholder="กรอกกลุ่มผลิตภัณฑ์" value="<?php echo $xx["group_name"] ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="paste-new-forms"></div>
                            <!--  -->

                            <!-- หลายฟอร์ม -->
                            <a href="javascript:void(0)" class="add-more-form1 float-end btn btn-success">เพิ่ม</a>
                            <div class="main-form1 mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">หน่วยงานที่สามารถทดสอบได้</label>
                                            <input type="text" name="agency_name[]" class="form-control" placeholder="กรอกหน่วยงานที่ต้องการทดสอบ" value="<?php echo $xx["agency_name"] ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="paste-new-forms1"></div>
                            <!--  -->

                            <!-- หลายฟอร์ม -->
                            <a href="javascript:void(0)" class="add-more-form2 float-end btn btn-success">เพิ่ม</a>
                            <div class="main-form2 mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">หน่วยงานที่ขอ</label>
                                            <input type="text" name="department_name[]" class="form-control" placeholder="กรอกหน่วยงานที่ขอ" value="<?php echo $xx["department_name"] ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="paste-new-forms2"></div>
                            <center>
                                <!--  -->
                                <button type="submit" name="save_multiple_data" class="btn btn-primary mt-3">บันทึกข้อมูล</button>
                            </center>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php include('insert_2_script.php'); ?>

</body>

</html>