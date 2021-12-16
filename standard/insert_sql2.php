<?php
require '../connection/connection.php';

$mode = $_REQUEST["mode"];

if ($mode == "insert_data") {
    $standard_meet = $_REQUEST["standard_meet"];
    $standard_number = $_REQUEST["standard_number"];
    $standard_detail = $_REQUEST["standard_detail"];
    $standard_mandatory = $_REQUEST["standard_mandatory"];
    $standard_tacking = $_REQUEST["standard_tacking"];
    $standard_note = $_REQUEST["standard_note"];
    //$file = $_REQUEST["file"];
    $group_id = $_REQUEST["group_id"];
    $agency_id = $_REQUEST["agency_id"];
    $type_id = $_REQUEST["type_id"];






    // print_r($fname);

    // if (count($fname) > "0") {

    //     foreach ($fname as $first_name) {

    //         if (trim($first_name) != "") {
    //             //    echo "<br>".$first_name; 

    //              $sql = "INSERT INTO main_user (user_fname,user_lname,user_username,user_password,user_status,user_add_date)
    //              VALUES ('$fname','$lname','$username','$password','1','$date_today')";

    //             $conn->query($sql);
    //         }
    //     }
    // }

    $sql = "INSERT INTO main_std ( standard_mandatory , standard_meet , standard_tacking , standard_number , standard_detail , standard_note  ) 
      VALUES ('$standard_mandatory','$standard_meet','$standard_tacking','$standard_number','$standard_detail','$standard_note')";



    //$conn->query($sql);
    //sqlsrv_close($conn);

    $stmt = sqlsrv_query($conn, $sql);

    $sqlmaxid = "SELECT @@IDENTITY AS 'Maxid'";
    $querymax = sqlsrv_query($conn, $sqlmaxid);
    $resultMaxid = sqlsrv_fetch_array($querymax, SQLSRV_FETCH_ASSOC);

    $standard_idtb =  $resultMaxid['Maxid'];

    if ($stmt == false) {
        die(print_r(sqlsrv_errors()));
    } else {
        echo "บันทึกข้อมูลสำเร็จ";
    }

    //1

    $test = count($group_id);

    //echo $test;


    for ($i = 0; $i < $test; $i++) {
        $a =  $group_id[$i];

        //echo "<br>";

        $sql2 = "INSERT INTO dimension_group ( group_id , standard_idtb  ) 
      VALUES ('$a', '$standard_idtb')";

        $stmt2 = sqlsrv_query($conn, $sql2);
        if ($stmt2 == false) {
            die(print_r(sqlsrv_errors()));
        } else {
            echo "บันทึกข้อมูลสำเร็จ1";
        }
    

        //echo "<br>";
    }

    //2

    $test2 = count($agency_id);

    //echo $test;


    for ($i = 0; $i < $test2; $i++) {
        $a =  $agency_id[$i];

        //echo "<br>";

        $sql3 = "INSERT INTO dimension_agency ( agency_id , standard_idtb  ) 
      VALUES ('$a', '$standard_idtb')";

        $stmt3 = sqlsrv_query($conn, $sql3);
        if ($stmt3 == false) {
            die(print_r(sqlsrv_errors()));
        } else {
            echo "บันทึกข้อมูลสำเร็จ2";
        }
    

        //echo "<br>";
    }

    //3

    $test3 = count($type_id);

    //echo $test;


    for ($i = 0; $i < $test3; $i++) {
        $a =  $type_id[$i];

        //echo "<br>";

        $sql3 = "INSERT INTO dimension_type ( type_id , standard_idtb  ) 
      VALUES ('$a', '$standard_idtb')";

        $stmt3 = sqlsrv_query($conn, $sql3);
        if ($stmt3 == false) {
            die(print_r(sqlsrv_errors()));
        } else {
            echo "บันทึกข้อมูลสำเร็จ3";
        }
    

        //echo "<br>";
    }

    //echo "OK! SAVE";

    //echo "<script>location.href='index.php?PG=1';</script>";
}
