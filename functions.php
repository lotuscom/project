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

        public function usernameavailable($username) { //เช็คว่า user ที่สมัคร ซ้ำกับใน database หรือไม่
            $checkuser = mysqli_query($this->dbcon, "SELECT * FROM tb_user WHERE username = '$username'");
            return $checkuser;
        }

        
    

        public function registration($username,$password,$firstname,$lastname){ // เพิ่มข้อมูลลงใน database
            $reg = mysqli_query($this->dbcon,"INSERT INTO tb_user(username,password,firstname,lastname)
            VALUES('$username','$password','$firstname','$lastname')");
            return $reg;
        }

       

        public function login($username,$password) { //เช็ค user pass ว่าตรงกับ database มั้ย
            $loginquery = mysqli_query($this->dbcon,"SELECT id, firstname,lastname,status
            FROM tb_user WHERE username = '$username' AND password = '$password'");
            return $loginquery;
        }

        public function loginadmin($username,$password) { //เช็ค user pass ว่าตรงกับ database มั้ย
            $loginadmin = mysqli_query($this->dbcon,"SELECT id, firstname,lastname
            FROM tb_admin WHERE username = '$username' AND password = '$password'");
            return $loginadmin;
        }
    

        public function fetch_personal() {
            $result = mysqli_query($this->dbcon,"SELECT * FROM tb_personal");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user");
            return $result;
        }

        public function fetchid() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user WHERE id = '".$_SESSION["id"]."'");
            return $result;
        }

        public function fetchdocument($id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document WHERE sender_id = '$id'");
            return $result;
        }

        public function fetchdocument_admin() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document ");
            return $result;
        }




        public function fetchonerecord($userid){
            $result = mysqli_query($this->dbcon,"SELETE * FROM tb_user WHERE id = '$userid' ");
            return $result;
        }

        public function updatedocument($document_no, $topic, $detail, $id) {
            $result = mysqli_query($this->dbcon, "UPDATE tb_document SET 
                document_no = '$document_no',
                topic = '$topic',
                detail = '$detail'
                WHERE id = '$id'
            ");
            return $result;
        }


        public function delete($userid)
    {
        $deleterecord = mysqli_query($this->dbcon,"DELETE FROM tb_user WHERE id ='$userid'");
        return $deleterecord;
    }

    public function deletedoc($docid)
    {
        $deleterecord = mysqli_query($this->dbcon,"DELETE FROM tb_document WHERE id ='$docid'");
        return $deleterecord;
    }

        public function sumuser() {
        $sumuser = mysqli_query($this->dbcon,"SELECT  * from tb_user");
        return $sumuser;
    }

    public function sumdoc() {
        $sumdoc = mysqli_query($this->dbcon,"SELECT  * from tb_document");
        return $sumdoc;
    }

        public function upload($id,$document_no,$topic,$el,$newname){
            $upload = mysqli_query($this->dbcon,"INSERT INTO tb_document (sender_id,document_no,topic,detail,file) 
            VALUES('$id','$document_no','$topic','$el','$newname')");
            return $upload;
        }

        public function upload_array($el){
            $upload_array = mysqli_query($this->dbcon,"INSERT INTO tb_document (detail) 
            VALUES('$el')");
            return $upload_array;
        }

        public function fetchonerecord_document($id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document WHERE id = '$id'");
            return $result;
        }

        public function serach() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_document WHERE detail like '%{$_POST['itemname']}%'");
            return $result;
        }


    }

?>