
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Proctor</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS-->
    <link href="startbootstrap-sb-admin-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="startbootstrap-sb-admin-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="startbootstrap-sb-admin-gh-pages/css/sb-admin.css" rel="stylesheet">
    <link href="css/style0.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">


    </script>

    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

</head>

<body id="page-top">
   
        <div class="container">
        <?php 
        
        include('functions.php');
        $personal = new DB_con();
        $result = $personal->fetch_personal();
        ?>

            <form action="">
                    <table id="myTbl">

                    <tr id="firstTr">
                        <td>
                                <label for="">ชื่ออาจารย์</label>
                                <select name=""  id="form-control">
                                <option value="">---กรุณาเลือก---</option>
                                <?php while($row = mysqli_fetch_array($result)):;
                
                
                ?>

                                                                        <option value="<?php echo $row["personal_name"] ;
                                                                                            echo "&nbsp;&nbsp;&nbsp;";
                                                                                            echo $row["personal_lastname"];?>">
                                                                            <?php echo $row["personal_name"];
                                                                                            echo "&nbsp;&nbsp;&nbsp;";
                                                                                            echo $row["personal_lastname"];?>
                                                                        </option>
                                                                        <?php endwhile;?>
                                                                        </select>

                                                   
                        
                        
                        
                        </td>




                    </tr>
                    
                    
                    
                    
                    
                    
                    </table>

                    <button id="addRow" type="button" class="btn btn-info btn-xs ">+</button>
                    &nbsp;
                    <button id="removeRow" type="button" class="btn btn-info btn-xs ">-</button>

                  
                                       
            
            
            
            
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
                    $("#myTbl tr:last").remove();
            });
            
            
        
           
        });

    </script>
    
  

</body>

</html>
