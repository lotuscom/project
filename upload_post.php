<?php
        session_start();

        include_once('functions.php');
        $date = date("d-m-y");
        $errors = array();

        if (isset($_POST['btn_insert'])) {
            
            $document_no =  $_POST['docid'];
            $topic =  $_POST['topic'];
            $detail = $_POST['detail'];
            $el = implode(' ', $detail);

            
            
            
            
            if (empty($docid)) { //กรณีถ้ามันเป็นค่าว่าง
                array_push($errors);
            }
            if (empty($topic)) {
                array_push($errors);
            }
            if (empty($detail)) {
                array_push($errors);
            }

            $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
            $upload=$_FILES['fileupload'];

            if($upload !== ""){
                $path="upload/";
    
                $remove_these = array(' ','`','"','\'','\\','/','_');
                $newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);
    
                $newname = time().'-'.$newname;
                $path_copy=$path.$newname;
                $path_link="upload/".$newname;
    
                move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy); 
                
            } else {
                echo "<script>alert('ลงทะเบียนไม่สำเร็จ')</script>";
            }
    

            
            


           
            if (count($errors) == 0) { //ถ้านับแล้ว = 0 
                
                $fetchid = new DB_con();
                $objQuery = $fetchid->fetchid();
                $id = $_SESSION["id"];

            
                    
                    $result = $fetchid->upload($id,$document_no,$topic,$el,$newname);
                
               
                    
                 echo "<script>alert('อัพโหลดสำเร็จแล้ว')</script>";
                 echo "<script>window.location.href='document_2.php'</script>";

            } else {
                echo "<script>alert('อัพโหลดไม่สำเร็จ')</script>";
                echo "<script>window.location.href='upload.php'</script>";
            }



        

        }
       

       

    
        

?>

