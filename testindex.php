<?php
                session_start();
                if ($_SESSION['id'] == "") {
                    header("location: admin_login.php");
                } else {


                    $id = $_SESSION['id'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css">
    
    <link rel="stylesheet" href="css/document.css">
</head>
<body>

        <!-- START Header -->
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

                <!-- END Header -->
            
        <div class="container">
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                          
                <thead>

                    <tr>
                    <th>เลขที่เอกสาร</th>
                    <th>หัวเรื่อง</th>
                    <th>ผู้เกี่ยวข้อง</th>
                    <th>แก้ไข</th>
                    <th>เปิดเอกสาร</th>
                    
                   
                    
                    </tr>
                </thead>

                <tbody>
                <?php 
      
                        include_once('functions.php');
                        $fetchdata = new DB_con();
                        $result = $fetchdata->fetchdocument($id);
                        while($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        
                        <td data-label="เลขที่เอกสาร"><?php echo $row['document_no']; ?></td>
                        <td data-label="หัวเรื่อง"><?php echo $row['topic']; ?></td>
                        <td data-label="ผู้เกี่ยวข้อง"><?php echo $row['detail']; ?></td>
                        <td><a class="update-btn" href="update_document.php?update=<?php echo $row['id'] ?>">Update</a></td>
                        <td><a class="open-btn" href="upload/<?php echo $row['file']; ?>">เปิดเอกสาร</a></td>
                       
                    </tr>

                    <?php
                        }

                        ?>
                   
                </tbody>
                
            </table>

                        </div>



          <!-- START Footer -->

          <footer class="footer">
            <div class="footer-p">
                 <p> © Copyright 2020. All right</p>
            </div>

        </footer>

        <!-- END Footer -->



    <script src="js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
       $(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );

    </script>

<script>
            $(document).ready(function() {

                load_data();

                function load_data(query) {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#result').html(data);
                        }
                    });
                }
                $('#search_text').keyup(function() {
                    var search = $(this).val();
                    if (search != '') {
                        load_data(search);
                    } else {
                        load_data();
                    }
                });
            });
        </script>

</body>
</html>


<?php 

                }

                ?>