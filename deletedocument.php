<?php 
        include_once('functions.php');

        if(isset($_GET['del'])) {
            $docid = $_GET['del'];
            $deletedata = new DB_con();
            $sql = $deletedata->deletedoc($docid);

            if($sql) {
                
                // echo "<script>alert('ลบสำเร็จเรียบร้อยแล้ว')</script>";
                echo "<script>window.location.href='admin_document.php'</script>";
            } else {
                echo "<script>alert('ลบไม่สำเร็จ ')</script>";
                echo "<script>window.location.href='admin_document.php'</script>";
            }

        }

?>