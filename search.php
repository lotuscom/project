
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
    
    <table id="customers">
    <tr>
        
        <th>เลขที่เอกสาร</th>
        <th>หัวเรื่อง</th>
        <th>ผู้เกี่ยวข้อง</th>
        <th>แก้ไข</th>
        <th>ดูเนื้อหา</th>
        
    </tr>
    
 ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
   <tr>

        <td>' . $row["document_no"] . '</td>
        <td>' . $row["topic"] . '</td>
        <td>' . $row["detail"] . '</td>
        <td> <a class="update-btn" href="update_document.php?update=' .  $row["id"] . ' ">Update</a></td>
        <td> <a class="open-btn" href="upload/' . $row["file"] . ' ">เปิดไฟล์</a></td>
        
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