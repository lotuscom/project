<?php 

    include_once('functions.php');

    $updatedata = new DB_con();

    if (isset($_POST['btn_insert'])) {

        $id = $_GET['update'];
        $document_no =  $_POST['docid'];
        $topic =  $_POST['topic'];
        $detail =  $_POST['detail'];
        $el = implode(' ', $detail);

        $sql = $updatedata->updatedocument($document_no, $topic, $el, $id);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='document.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='update_document.php'</script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/upload.css">
</head>


<style>
    
    .btn-confirm {
    border: 0;
    border-radius: 0.4rem;
    background: green;
    padding: 10px 10px;
    transition: .3s ease-in-out;
    
    cursor: pointer;
    
    }

    .btn-cancel {
    border: 0;
    border-radius: 0.4rem;
    background: red;
    padding: 10px 10px;
    transition: .3s ease-in-out;
    
    cursor: pointer;
    
    }

    .btn-confirm a , .btn-cancel a {
        text-decoration: none;
        color: white;
    }

    .btn--doc{
        display: grid;
        grid-template-columns: 60px 60px;
        margin: 0px 10px;
        list-style: none;
        
    }
</style>

<body>

    <header>
        <nav>
            <div class="container">
                <div class="nav-grid">
                    <div class="logo">
                        <img src="https://eng.rmutp.ac.th/web2558/wp-content/uploads/2018/08/eng-logo.png" alt="">
                    </div>
                    <button class="hamburger" id="hamburger">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="menu" id="menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="document.php">Document</a></li>
                        <li><a href="upload.php">Upload</a></li>
                        <div class="btn">
                        <a href="logout.php" class="button">Logout</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-form">

                <?php 

                    $id = $_GET['update'];
                    $update_document = new DB_con();
                    $result = $update_document->fetch_personal();
                    $sql = $update_document->fetchonerecord_document($id);
                    while($row = mysqli_fetch_array($sql)) {
                ?>

        <form action="" id="form-upload" method="post" enctype="multipart/form-data">
            <h1>รายละเอียดของ เอกสาร</h1>


            <div class="item-form">
                <label for="">เลขที่เอกสาร</label>
                <input type="text"  name="docid" value="<?php echo $row['document_no']; ?>" required>
                <span class="fa-stack">
                    <span class="fa fa-square-o fa-stack-2x"></span>
                    <strong class="fa-stack-1x">
                        123    
                    </strong>
                </span> 
            </div>

            <div class="item-form">
                <label for="">เรื่อง</label>
                <input type="text" value="<?php echo $row['topic']; ?>" name="topic" required>
                <i class="fa fa-file" aria-hidden="true"></i>
            </div>
           
                
            <div class="table-responsive">
                    <table id="myTbl">

                        <tr id="firstTr">
                            <td>
                                <label for="">ชื่ออาจารย์ที่เกี่ยวข้อง</label>
                                <select name="detail[]" id="form-control">
                                    <option value="">---กรุณาเลือก---</option>

                                    <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                        <option value="<?php echo $row["personal_name"];
                                                        echo "&nbsp;";
                                                        echo $row["personal_lastname"]; ?>">
                                            <?php echo $row["personal_name"];
                                            echo "&nbsp;";
                                            echo $row["personal_lastname"]; ?>

                                        </option>

                                    <?php endwhile; ?>

                                </select>
                            </td>

                        </tr>
                    </table>
                    <div class="btn-addremove">
                        <button id="addRow" class="btn-add">+</button>

                        <button id="removeRow" class="btn-remove">-</button>
                    </div>

                </div>


            

            
              <?php } ?>
            
            <div class="btn--doc">
                <div>
                    <button class="btn-confirm" name="btn_insert">ตกลง</button>
                </div>

                <div>
                    <button class="btn-cancel"><a href="document.php">ยกเลิก</a></button>
                </div>
            </div>









        </form>
    </div>








    <footer class="admin__footer">
        <p>© Copyright 2020. All right</p> 

    </footer>






    <script src="js/jquery.js"></script>
        <script src="js/upload.js"></script>

        <script type="text/javascript">
            $(function() {
                $("#addRow").click(function() {
                    $("#myTbl").append($("#firstTr").clone());

                });


                $("#removeRow").click(function() {
                    $("#myTbl tr:last").remove();
                });




            });
        </script>


</body>

</html>
