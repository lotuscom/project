<?php

            session_start();
            if ($_SESSION['id'] == "") {
                header("location: login.php");
            } else {


                $id = $_SESSION['id']; // เก็บ ID ที่ login เข้ามา


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

        <!-- START Search -->
                <div class="container">
                    <div class="search-container">
                        <form action="" name="searchform" id="searchform">
                            <input type="text" placeholder="Search.." name="search_text" id="search_text">
                        
                        </form>
                    </div>
                </div>


        <!-- END Search -->


      
        <!-- START Table -->


        <div class="container">
            <div id="result"></div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- END Table -->

       

        <!-- START Footer -->

        <footer class="footer">
            © Copyright 2020. All right

        </footer>

        <!-- END Footer -->




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