<?php 
        include_once('functions.php');

        if(isset($_GET['del'])) {
            $userid = $_GET['del'];
            $deletedata = new DB_con();
            $sql = $deletedata->delete($userid);

            if($sql) {
                
                echo "<script>alert('ลบสำเร็จเรียบร้อยแล้ว')</script>";
                echo "<script>window.location.href='admin_manage.php'</script>";
            } else {
                echo "<script>alert('ลบไม่สำเร็จ ')</script>";
                echo "<script>window.location.href='admin_manage.php'</script>";
            }

        }

?>