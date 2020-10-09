<?php 


    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS','');
    define('DB_NAME','project');

    



    

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {

                echo "Failed to connect to MySQL :" . mysqli_connect_error();

            }
        }
        // ฟังก์ชั่น เช็ค ว่า username ซ้ำกับในระบหรือไม่
        public function usernameavailable($username) { 
            $checkuser = mysqli_query($this->dbcon, "SELECT * FROM tb_user WHERE username = '$username'");
            return $checkuser;
        }

        
    
        // ฟังก์ชั่น insert ข้อมูลลงฐานข้อมูล
        public function registration($username,$password,$firstname,$lastname){ 
            $reg = mysqli_query($this->dbcon,"INSERT INTO tb_user(username,password,firstname,lastname)
            VALUES('$username','$password','$firstname','$lastname')");
            return $reg;
        }

       
        // ฟังก์ชั่น เช็ค login ว่าตรงกับฐานข้อมูลหรือไม่
        public function login($username,$password) { 
            $loginquery = mysqli_query($this->dbcon,"SELECT id, firstname,lastname,status
            FROM tb_user WHERE username = '$username' AND password = '$password'");
            return $loginquery;
        }

        // ฟังก์ชั่น เช็ค login จาก admin ว่าตรงกับฐานข้อมูลหรือไม่
        public function loginadmin($username,$password) { 
            $loginadmin = mysqli_query($this->dbcon,"SELECT id, firstname,lastname
            FROM tb_admin WHERE username = '$username' AND password = '$password'");
            return $loginadmin;
        }
    
        // ฟังก์ชั่น ค้นหาข้อมูลจาก ตาราง tb_personal
        public function fetch_personal() {
            $result = mysqli_query($this->dbcon,"SELECT * FROM tb_personal");
            return $result;
        }

        // ฟังก์ชั่น ค้นหาข้อมูลจาก ตาราง tb_user
        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user");
            return $result;
        }

        // ฟังก์ชั่น ค้นหา id ที่รับเข้ามาตรงกับ ฐานข้อมูล tb_user หรือไม่
        public function fetchid() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user WHERE id = '".$_SESSION["id"]."'");
            return $result;
        }

         // ฟังก์ชั่น ค้นหา id ที่รับเข้ามาตรงกับ ฐานข้อมูล tb_document หรือไม่
        public function fetchdocument($id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document WHERE sender_id = '$id'");
            return $result;
        }

         // ฟังก์ชั่น ค้นหาข้อมูลจาก ตาราง tb_document
        public function fetchdocument_admin() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document ");
            return $result;
        }



        // ฟังก์ชั่น ค้นหาข้อมูล user 
        public function fetchonerecord($userid){
            $result = mysqli_query($this->dbcon,"SELETE * FROM tb_user WHERE id = '$userid' ");
            return $result;
        }


        public function update_user($userid){
            $result = mysqli_query($this->dbcon,"UPDATE tb_user SET status = '1' WHERE id = '$userid' ");
            return $result;
        }

        public function update_user2($userid){
            $result = mysqli_query($this->dbcon,"UPDATE tb_user SET status = '0' WHERE id = '$userid' ");
            return $result;
        }

        //  ฟังก์ชั่น update เอกสารเข้าฐานข้อมูล
        public function updatedocument($document_no, $topic, $el, $id) {
            $result = mysqli_query($this->dbcon, "UPDATE tb_document SET 
                document_no = '$document_no',
                topic = '$topic',
                detail = '$el'
                WHERE id = '$id'
            ");
            return $result;
        }

        // ฟังก์ชั่น ลบข้อมูล
        public function delete($userid){
        $deleterecord = mysqli_query($this->dbcon,"DELETE FROM tb_user WHERE id ='$userid'");
        return $deleterecord;
    }

    // ฟังก์ชั่น ลบเอกสาร
        public function deletedoc($docid) {
        $deleterecord = mysqli_query($this->dbcon,"DELETE FROM tb_document WHERE id ='$docid'");
        return $deleterecord;
    }

    // ฟังก์ชั่น นับ id ในตาราง tb_user
        public function sumuser() {
        $sumuser = mysqli_query($this->dbcon,"SELECT  * from tb_user");
        return $sumuser;
    }

    // ฟังก์ชั่น นับ เอกสาร ในตาราง tb_document
        public function sumdoc() {
        $sumdoc = mysqli_query($this->dbcon,"SELECT  * from tb_document");
        return $sumdoc;
    }
    // ฟังก์ชั่น upload เอกสาร
        public function upload($id,$document_no,$topic,$el,$newname){
            $upload = mysqli_query($this->dbcon,"INSERT INTO tb_document (sender_id,document_no,topic,detail,file) 
            VALUES('$id','$document_no','$topic','$el','$newname')");
            return $upload;
        }
    
       
    // ฟังก์ชั่น เอาเอกสารมาแสดง เฉพาะ user ที่ login เข้ามา
        public function fetchonerecord_document($id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document WHERE id = '$id'");
            return $result;
        }

    // ฟังก์ชั่น ค้นหาเอกสารในตาราง tb_document
        public function serach() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document WHERE detail like '%{$_POST['itemname']}%'");
            return $result;
        }


    }

?>