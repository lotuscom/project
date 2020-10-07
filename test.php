<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/test.css">

    
</head>
<body>

            <div class="container">
            <?php 
        
        include('functions.php');
        $personal = new DB_con();
        $result = $personal->fetch_personal();
        ?>

                <form action="db_adminmail.php" method="post">
                    <table id="myTbl" class="table">
                                            <tr id="firstTr">
                                                <td>


                                                    <div class="form-group">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <label id="lblSurnameT" class="col-md-2 control-label font-noraml">ชื่ออาจารย์:</label>
                                                                <div class="col-md-3">
                                                                    <select class="form-control m-b" id="name[]" name="name[]" required="">
                                                                        <option value="">---กรุณาเลือก---</option>
                                                                        <?php while($row = mysqli_fetch_array($result)):;
                
                
                ?>

                                                                        <option value="<?php echo $ro1["personal_name"] ;
                                                                                            echo "&nbsp;&nbsp;&nbsp;";
                                                                                            echo $row["personal_lastname"];?>">
                                                                            <?php echo $row["personal_name"];
                                                                                            echo "&nbsp;&nbsp;&nbsp;";
                                                                                            echo $row["personal_lastname"];?>
                                                                        </option>
                                                                        <?php endwhile;?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        

                                        </table>
                                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    <button id="addRow" type="button" class="btn btn-info btn-xs ">+</button>
                                                    &nbsp;
                                                    <button id="removeRow" type="button" class="btn btn-info btn-xs ">-</button>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </table><br>
                                    <div class="form-group">
                                                <input type="submit" name="actionm" value="ส่งข้อมูลเป็นEmail" id="dataModal" class="btn btn-info btn-xs " />

                                    </div>
                </form>
                
            
            
            
            </div>



    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

 <script type="text/javascript">
        $(function() {
            $("#addRow").click(function() {
                $("#myTbl").append($("#firstTr").clone());
                
            });
            

            $("#removeRow").click(function() {
                if ($("#myTbl tr").size() > 2) {
                    $("#myTbl tr:last").remove();
                    $("#myTbl tr:last").remove();
                } else {
                    alert("ต้องมีรายการข้อมูลอย่างน้อย 2 รายการ");
                }
            });
            
        
           
        });

    </script>
    
</body>
</html>