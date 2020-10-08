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
 ";
    } else {
        $query = "
  SELECT * FROM tb_document ORDER BY id
 ";
    }
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
    
    <table id="customers">
    <tr>
        
        <th>เลขที่เอกสาร</th>
        <th>หัวเรื่อง</th>
        <th>เนื้อหา</th>
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