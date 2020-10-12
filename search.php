
<?php

session_start();
if ($_SESSION['id'] == "") {
    header("location: login.php");
} else {


    $iduser = $_SESSION['id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    //fetch.php
    $connect = mysqli_connect("localhost", "root", "", "project");
    $output = '';
    if (isset($_POST["query"])) {
        
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query = "
  SELECT * FROM tb_document 
  WHERE document_no LIKE '%" . $search . "%'
  OR topic LIKE '%" . $search . "%' 
  OR detail LIKE '%" . $search . "%'
  AND sender_id =   $iduser  
  
 ";
    } else {
        $query = "
  SELECT * FROM tb_document WHERE sender_id = '$iduser'
 ";
    }
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
    
    <table class="table">
    <thead>
        
        <th>เลขที่เอกสาร</th>
        <th>หัวเรื่อง</th>
        <th>ผู้เกี่ยวข้อง</th>
        <th>แก้ไข</th>
        <th>ดูเนื้อหา</th>
        
    </thead>
    
 ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
   <tr>

        <td data-label="เลขที่เอกสาร">' . $row["document_no"] . '</td>
        <td data-label="หัวเรื่อง">' . $row["topic"] . '</td>
        <td data-label="ผู้เกี่ยวข้อง">' . $row["detail"] . '</td>
        <td data-label="แก้ไข"> <a class="update-btn" href="update_document.php?update=' .  $row["id"] . ' ">Update</a></td>
        <td data-label="ดูเนื้อหา"> <a class="open-btn" href="upload/' . $row["file"] . ' ">เปิดไฟล์</a></td>
        
   </tr>
  ';
        
        }
        echo $output;
    } else {
        echo 'Data Not Found';
    }

    ?>

    
  

</body>

</html>


<?php

}

?>