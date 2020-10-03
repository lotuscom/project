<?php
                 session_start();
                if ($_SESSION['id'] == "") {
                    header("location: login.php");
                } else {

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
        <form action="/action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>


    <section>
        <div class="container">
        <table id="customers">
                        <tr>
                          <th>ID</th>
                          <th>sender_id</th>
                          <th>เลขที่เอกสาร</th>
                          <th>หัวเรื่อง</th>
                          <th>เนื้อหา</th>
                          
                          
                         
                        </tr>

                        <tbody>
                          <?php 
      
                          include_once('functions.php');
                          $fetchdocument = new DB_con();
                          $result = $fetchdocument->fetchdocument();
                          while($row = mysqli_fetch_array($result)) {
                      ?>
      
                              <tr>
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['sender_id']; ?></td>
                                  <td><?php echo $row['document_no']; ?></td>
                                  <td><?php echo $row['topic']; ?></td>
                                  <td><?php echo $row['detail']; ?></td>
                                  
                                
                            
                              </tr>
      
                      <?php
      
                           }
      
                      ?>
      
                      </tbody>
                       
                      </table>
        </div>
    </section>



    <footer class="footer">
        © Copyright 2020. All right

    </footer>




    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

    
</body>
</html>

<?php

                }
                ?>