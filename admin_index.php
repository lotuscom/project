<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="admin">

        <header class="admin__header">
            <a href="#" class="logo">
            <h1>Admim</h1>
        </a>
            <div class="toolbar">
                <button class="btn btn--primary">Add New </button>
                <a href="admin_logout.php" class="logout">logout</a>
            </div>
        </header>

        <nav class="admin__nav">

            <ul class="menu">

                <li class="menu__item">
                    <a href="admin_index.php" class="menu__link">สมาชิก</a>
                </li>

                <li class="menu__item">
                    <a href="admin_document.php" class="menu__link">เอกสารทั้งหมด</a>

                </li>

                <li class="menu__item">
                    <a href="admin_manage.php" class="menu__link">จัดการสมาชิก</a>

                </li>

                <li class="menu__item">
                    <a href="" class="menu__link">ตั้งค่า</a>

                </li>
            </ul>
        </nav>

        <main class="admin__main">
            <h2>Dashboard</h2>
            <div class="dashboard">
                <div class="dashboard__item">
                    <div class="card">
                        <?php 

                                include_once('functions.php');

                                $fetchdata = new DB_con();
                                $result = $fetchdata->sumuser();
                                
                                echo  mysqli_num_rows($result). 'สมาชิก' ; 
                            ?>
                        


                        

                    </div>
                </div>

                <div class="dashboard__item">
                    <div class="card">

                        <?php 

                                include_once('functions.php');

                                $fetchdata = new DB_con();
                                $result = $fetchdata->sumdoc();

                                echo  mysqli_num_rows($result). 'เอกสาร' ; 
                        ?>
                        
                    </div>
                </div>

                <div class="dashboard__item dashboard__item--full">
                    <table id="customers">
                        <tr>
                          <th>ID</th>
                          <th>Username</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Status</th>
                          
                          
                         
                        </tr>

                        <tbody>
                          <?php 
      
                          include_once('functions.php');
                          $fetchdata = new DB_con();
                          $result = $fetchdata->fetchdata();
                          while($row = mysqli_fetch_array($result)) {
                      ?>
      
                              <tr>
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['username']; ?></td>
                                  <td><?php echo $row['firstname']; ?></td>
                                  <td><?php echo $row['lastname']; ?></td>
                                  <td><?php echo $row['status']; ?></td>
                                
                            
                              </tr>
      
                      <?php
      
                           }
      
                      ?>
      
                      </tbody>
                       
                      </table>
                </div>

              
            </div>
        </main>

        <footer class="admin__footer">
            © Copyright 2020. All right

        </footer>



    </div>

   


</body>
</html>