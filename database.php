<?php
require('sqlcreator.php');
error_reporting(E_ERROR | E_PARSE);
/**
 * 
 * create a database connection and do database operations
 * 
 * @author Subroto Saha
 */
class Database{
    /**
     * @var string $dbhost  
     */
    private $dbhost;
    /**
     * @var string $dbusername
     */
    private $dbusername;
    /**
     * @var string $dbpassword
     */
    private $dbpassword;
    /**
     * @var string $dbname
     */
    private $dbname;
    /**
     * @var CreateSQL $sqlcteate
     */
    private $sqlcteate;

    /**
     * @param string $host Databade Host name
     * @param string $username Database User Name
     * @param string $password Database Password
     * @param string $name Database Name
     * @return Database Database Connection
     */
    function __construct($host,$username,$password,$name)
    {
        $this->dbhost=$host;
        $this->dbusername=$username;
        $this->dbpassword=$password;
        $this->dbname=$name;
        $this->sqlcteate=new CreateSQL();
    }


        
    
    /**
     * 
     * 
     * its took some value from user and send it to database to update those values
     * with some conditions and table name it select the specific row of specific table
     * 
     * 
     * @param string $tablename provide database table name
     * @param string[] $updatedata data with[KEY=>VALUE] pair for update data
     * @param string[] $condition  data with[KEY=>VALUE] pair for select the data for update of table
     * @return string  updated if success
     */
    public function updateDB($tablename,$updatedata,$condition){
        $con=mysqli_connect($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
        $con->set_charset("utf8");
        $sql=$this->sqlcteate->update($tablename,$updatedata,$condition);
        if(!$con){
            die("Connection Failed".mysqli_connect_error());
        }else{
            if(mysqli_query($con,$sql)){
                return "updated";
            }else{
                return "Error : ". $sql . "<br>" . mysqli_error($con);
            }
        }
    }
    /**
     * 
     * its take some values and table name and insert those to database
     * 
     * @param  string $tablename provide database table name
     * @param string[] $data data with[KEY=>VALUE] pair for insert data
     * @return string inserted for success
     */
    public function insertDb($tablename,$data)
        {
            $con=mysqli_connect($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
            $sql=$this->sqlcteate->insert($tablename,$data);
            $con->set_charset("utf8");
            if (!$con) {
                die("Connection failed : " . mysqli_connect_error());
            }
            if(mysqli_query($con, $sql)) {
                return "inserted";
            }
            else{
                return " Error : " . $sql . "<br>" . mysqli_error($con);
            }
        }

        /**
        *  @author Subroto Saha
        *  @param string $table table name of database
        *  @param string[] $data array for select column
        *  @param string[] $condition With [KEY=>VALUE] pair for update and delete operation
        *  @return string|false — a JSON encoded string on success or FALSE on failure.
        *  @access public
        */ 
        public function selectDbAsJson($table,$data,$condition=null,$Wherecolumnformat=null,$selectcolmnformat=null)
        {
            $con=mysqli_connect($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
            $sql=$this->sqlcteate->select($table,$data,$condition,$Wherecolumnformat,$selectcolmnformat);
            $con->set_charset("utf8");
            if (!$con) {
                die(" Connection failed : " . mysqli_connect_error());
            }
            else{
                $result = mysqli_query($con, $sql)or die(mysqli_error($con));
                $arr=array();
                while($row = mysqli_fetch_assoc($result)) {
                    $arr[]=$row;
                }
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }

        }



        /**
        *  @author Subroto Saha
        *  @param string $table table name of database
        *  @param string[] $data array for select column
        *  @param string[] $condition With [KEY=>VALUE] pair for update and delete operation
        *  @return array
        *  @access public
        */ 
        public function selectDbAsArray($table,$data,$condition=null,$Wherecolumnformat=null,$selectcolmnformat=null)
        {
            $con=mysqli_connect($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
            $sql=$this->sqlcteate->select($table,$data,$condition,$Wherecolumnformat,$selectcolmnformat);
            $con->set_charset("utf8");
            if (!$con) {
                die("Connection failed : " . mysqli_connect_error());
            }
            else{
                $result = mysqli_query($con, $sql)or die(mysqli_error($con));
                $arr=array();
                while($row = mysqli_fetch_assoc($result)) {
                    $arr[]=$row;
                }
                return $arr;
            }

        }

        /**
        *  @author Subroto Saha
        *  @param string[] $tables multiple table 
        *  @param string[] $collumns array With [TABLE_NAME => COLUMN_NAME] pair for select collumn for specific table
        *  @param string[][] $joiningcondition With 2D [[TABLE1_NAME=>TABLE1_COLUMN_NAME,TABLE2_NAME=>TABLE2_COLUMN_NAME],[TABLE2_NAME=>TABLE2_COLUMN_NAME,TABLE3_NAME=>TABLE3_COLUMN_NAME],etc...] pair for joining tables
        *  @param string[][] $condition  With 2D [[TABLE_NAME,TABLE_COLUMN_NAME,COLUMN_VALUE],[TABLE_NAME,TABLE_COLUMN_NAME,COLUMN_VALUE]] for select specific some rows
        *  @return json
        *  @access public
        */
        public function selectwithjoiningDbAsJson($tables,$collumns,$joiningcondition,$condition,$Wherecolumnformat=null,$selectcolmnformat=null)
        {
            $con=mysqli_connect($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
            $con->set_charset("utf8");
            $sql=$this->sqlcteate->Mustitableselect($tables,$collumns,$joiningcondition,$condition,$Wherecolumnformat,$selectcolmnformat);
            if (!$con) {
                die(" Connection failed : " . mysqli_connect_error());
            }
            else{
                $result = mysqli_query($con, $sql)or die(mysqli_error($con));
                $arr=array();
                while($row = mysqli_fetch_assoc($result)) {
                    $arr[]=$row;
                }
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }

        }

        /**
        *  @author Subroto Saha
        *  @param string[] $tables multiple table 
        *  @param string[] $collumns array With [TABLE_NAME => COLUMN_NAME] pair for select collumn for specific table
        *  @param string[][] $joiningcondition With 2d [[TABLE1_NAME=>TABLE1_COLUMN_NAME,TABLE2_NAME=>TABLE2_COLUMN_NAME],[TABLE2_NAME=>TABLE2_COLUMN_NAME,TABLE3_NAME=>TABLE3_COLUMN_NAME],etc...] pair for joining tables
        *  @param string[] $condition  With [TABLE_NAME,TABLE_COLUMN_NAME,COLUMN_VALUE] for select specific some rows
        *  @return array
        *  @access public
        */

        public function selectwithjoiningDbAsArray($tables,$collumns,$joiningcondition,$condition,$Wherecolumnformat=null,$selectcolmnformat=null)
        {
            $con=mysqli_connect($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
            $con->set_charset("utf8");
            $sql=$this->sqlcteate->Mustitableselect($tables,$collumns,$joiningcondition,$condition,$Wherecolumnformat,$selectcolmnformat);
            if (!$con) {
                die("Connection failed :  " . mysqli_connect_error());
            }
            else{
                $result = mysqli_query($con, $sql)or die(mysqli_error($con));
                $arr=array();
                while($row = mysqli_fetch_assoc($result)) {
                    $arr[]=$row;
                }
                return $arr;
            }

        }



         /**
        *  @author Subroto Saha
        *  @param string $table table name of database
        *  @param string[] $condition With [KEY=>VALUE] pair for delete operation
        *  @return string deleted if done
        *  @access public
        */ 
        public function deleteDb($table,$condition){
            $con=mysqli_connect($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
            $con->set_charset("utf8");
            $sql=$this->sqlcteate->delete($table,$condition);
            if (!$con) {
                die(" Connection failed: " . mysqli_connect_error());
            }
            if(mysqli_query($con, $sql)) {
                return "deleted";
            }
            else{
                return " Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
        public function CustomSelectionAsArray($sql)
        {
            $con=mysqli_connect($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
            $con->set_charset("utf8");
            if (!$con) {
                die("Connection failed :  " . mysqli_connect_error());
            }
            else{
                $result = mysqli_query($con, $sql)or die(mysqli_error($con));
                $arr=array();
                while($row = mysqli_fetch_assoc($result)) {
                    $arr[]=$row;
                }
                return $arr;
            }
        }

}
?>