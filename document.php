<?php

            session_start();
            if ($_SESSION['id'] == "") {
                header("location: login.php");
            } else {


                $id = $_SESSION['id'];


?>





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/document.css">
        <title>Document</title>

    </head>

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
                            <li><a href="upload3.php">Upload</a></li>
                            <div class="btn">
                                <a href="logout.php" class="button">Logout</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="search-container">
            <form action="" name="searchform" id="searchform">
                <input type="text" placeholder="Search.." name="search_text" id="search_text">
                <button type="submit" id=btnSearch><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div id="result"></div>


        <section>
            <div class="container">
                <table id="customers">
                    <tr>
                        <th>ID</th>
                        <th>เลขที่เอกสาร</th>
                        <th>หัวเรื่อง</th>
                        <th>เนื้อหา</th>
                        <th>แก้ไข</th>
                        <th>ดูเนื้อหา</th>





                    </tr>

                    <tbody>
                        <?php

                        include_once('functions.php');
                        $fetchdocument = new DB_con();
                        $result = $fetchdocument->fetchdocument($id);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <tr>
                                <td><?php echo $row['id']; ?></td>

                                <td><?php echo $row['document_no']; ?></td>
                                <td><?php echo $row['topic']; ?></td>
                                <td><?php echo $row['detail']; ?></td>
                                <td><a class="update-btn" href="update_document.php?update=<?php echo $row['id']; ?>" class="update-btn">Update</a></td>

                                <td><a class="open-btn" href="upload/<?= $row["file"]; ?>">เปิดไฟล์</a></td>


                            </tr>

                        <?php

                        }

                        ?>

                    </tbody>


                </table>
                <br>&nbsp</br> <br>&nbsp</br>
            </div>
        </section>



        <footer class="footer">
            © Copyright 2020. All right

        </footer>




        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>




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