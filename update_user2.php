<?php 

    include_once('functions.php');
    if(isset($_GET['id'])) {

        $userid = $_GET['id'];

        $updatestatus = new DB_con();
        $sql = $updatestatus->update_user2($userid);

        if($sql) {
           /* echo "<script>alert('เปลี่ยนสถานะเรียบร้อยแล้ว')</script>";*/
            echo "<script>window.location.href='admin_manage.php'</script>";
        } else {
           /* echo "<script>alert('เปลี่ยนสถานะไม่สำเร็จ ')</script>";
            echo "<script>window.location.href='admin_manage.php'</script>";*/
        }
    }

?>