<?php include('status_sql.php'); ?>
<?php include('insert_status.php'); ?>
<section class="items-grid section custom-padding">
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">เอกสารทั้งหมด</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="  tab-content font">
        <div id="home" class="container-fluid tab-pane active m-2">
            <form method="post">
                <table class="table table-bordered table-responsive-xl table-striped  text-center pt-5" style="width: 100%;" id="tableall">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>วาระจากในที่ประชุมสมอ.</th>
                            <th>เลขที่มอก.</th>
                            <th>ชื่อมาตรฐาน</th>
                            <th>กลุ่มผลิตภัณฑ์</th>
                            <th>หน่วยงานที่สามารถทดสอบได้</th>
                            <th>มาตรฐานบังคับ</th>
                            <th>หน่วยงานที่ขอ</th>
                            <th>วันที่แต่งตั้ง</th>
                            <th>สถานะ</th>
                            <th>เลขเอกสารที่เกี่ยวข้อง</th>
                            <th>เมนูจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while ($data = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                        ?>
                            <tr class="text-center">
                                <td class="align-middle"><?= $i++; ?></td>
                                <td class="align-middle"><?= $data['standard_meet'] ?></td>
                                <td class="align-middle"><?= $data['standard_number'] ?></td>
                                <td class="align-middle"><?= $data['standard_detail'] ?></td>
                                <td class="align-middle"><?= $data['group_name'] ?></td>
                                <td class="align-middle"><?= $data['agency_name'] ?></td> <!--ลองเปลี่ยน agency_id รันออก -->
                                <td class="align-middle"><?= $data['standard_mandatory'] ?></td>
                                <td class="align-middle"><?= $data['department_name'] ?></td> <!--ลองเปลี่ยน department_id รันออก -->
                                <td class="align-middle">
                                    <!-- <input type="date" class="form-control" name="progess_date" required> -->
                                    -
                                </td>
                                <td class="align-middle">
                                   -
                                </td>
                                <td class="align-middle">
                                    <!-- <input type="text" class="form-control" name="name_real" required> -->
                                    -
                                </td>
                                <td class="align-middle">
                                    <div class="mb-4">
                                        <!--กดรายงานสถานะแล้วไปหน้าไหนต่อ แล้วในหน้านั้นเป็นประมาณไหน จะได้สร้างถูก -->
                                        
                                        <a href="?page=statusedit&standard_id=<?php echo $data["standard_id"]; ?>" class="btn btn-sm btn-warning" role="button">แก้ไขสถานะ</a> 
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
</section>