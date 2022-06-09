<?php 
class CreateSQL{

     /**
        *  @author Subroto Saha
        *  @param string $table table name of database
        *  @param string[] $data array of collumn name
        *  @param string[] $condition With [COLUMN_NAME => COLUMN_VALUE] pair for update and delete operation
        *  @param string[] $selectcolmnformat With [COLUMN_NAME => FORMAT TYPE] pair for select column
        *  @return string build sql and return as string
        *  @access public
        */ 
        public function select($table,$data,$condition=null,$Wherecolumnformat=null,$selectcolmnformat=null)
        {
            $selcolumn=null;
            $selcondition=null;
            foreach($data as $key){
                if($selectcolmnformat==null){
                    $selcolumn.="`".$key."` ,";
                }
                else{
                    $selcolumn=$this->advancedSelection($data,$selectcolmnformat);
                }
            }
            $selcolumn=substr($selcolumn,0,strlen($selcolumn)-1);

            if($condition!=null){
                if($Wherecolumnformat==null){
                    foreach ($condition as $key=>$val) {
                        $selcondition.=" `".$key."` ='".$val."'  and";
                    }
                }
                else{
                    $selcondition=$this->advancedCondition($condition,$Wherecolumnformat);
                }
                $selcondition=substr($selcondition,0,strlen($selcondition)-4);
                return " SELECT ".$selcolumn." FROM `".$table."` WHERE ". $selcondition;
            }
            elseif($condition==null){
                    return "SELECT ".$selcolumn." FROM `".$table."`";
            }
        }
        /**
        *  @author Subroto Saha
        *  @param string[] $tables multiple table 
        *  @param string[] $collumns array With [TABLE_NAME => COLUMN_NAME] pair for select collumn for specific table
        *  @param string[][] $joiningcondition With 2d [[TABLE1_NAME=>TABLE1_COLUMN_NAME,TABLE2_NAME=>TABLE2_COLUMN_NAME],[TABLE2_NAME=>TABLE2_COLUMN_NAME,TABLE3_NAME=>TABLE3_COLUMN_NAME],etc...] pair for joining tables
        *  @param string[][] $condition  With [TABLE_NAME,TABLE_COLUMN_NAME,COLUMN_VALUE] for select specific some rows
        *  @return string build sql and return as string
        *  @access public
        */ 
        public function Mustitableselect($tables,$collumns,$joiningcondition,$condition,$Wherecolumnformat=null,$selectcolmnformat=null)
        {
            $selecttables=null;
            $selectcollumns=null;
            $selectjoiningcondition=null;
            $selectcondition=null;
            foreach($tables as $table)
            {
                $selecttables.=$table.',';
            }
            $selecttables=substr($selecttables,0,strlen($selecttables)-1);

            foreach($collumns as $collumn=>$collumnvalue){
                $selectcollumns.=$collumn.".".$collumnvalue." as ".$collumnvalue.",";
            }
            $selectcollumns=substr($selectcollumns,0,strlen($selectcollumns)-1);
            foreach ($joiningcondition as $joinconditions) {
                foreach($joinconditions as $join=>$col){
                    $selectjoiningcondition.=$join.".".$col." = ";
                }
                $selectjoiningcondition=substr($selectjoiningcondition,0,strlen($selectjoiningcondition)-3);
                $selectjoiningcondition.=" AND ";
            }
            $selectjoiningcondition=substr($selectjoiningcondition,0,strlen($selectjoiningcondition)-5);

            foreach($condition as $data){
                    $selectcondition.=$data[0].".".$data[1]." = '".$data[2]."' AND ";
            }
            $selectcondition=substr( $selectcondition,0,strlen( $selectcondition)-5);
            return "SELECT ".$selectcollumns." FROM ".$selecttables." WHERE ".$selectjoiningcondition ." AND ".$selectcondition;
        }
    /**
        *  @author Subroto Saha
        *  @param string $table table name of database
        *  @param string[] $data array With [KEY => VALUE] pair for insert value to database
        *  @return string build sql and return as string
        *  @access public
        */ 
        public function insert($table,$data)
        {
            $insertcollumn=null;
            $insertvalue=null;
            foreach($data as $key=>$val)
            {
                $insertcollumn.="`".$key."` ,";
                $insertvalue.="'".$val."' ,";
            }
            $insertcollumn=substr($insertcollumn,0,strlen($insertcollumn)-1);
            $insertvalue=substr($insertvalue,0,strlen($insertvalue)-1);
            return "INSERT INTO `".$table."`(".$insertcollumn.") VALUES (".$insertvalue.")";
        }

         /**
        *  @author Subroto Saha
        *  @param string $table table name of database
        *  @param string[] $data array With [KEY => VALUE] pair for update
        *  @param string[] $condition With [KEY => VALUE] pair for update an operation
        *  @return string build sql and return as string
        *  @access public
        */ 
        public function update($table,$data,$condition)
        {
            $updatedata=null;
            $updatecondition=null;
            foreach($data as $key=>$val){
                $updatedata.="`".$key."`='".$val."' ,";
            }
            $updatedata=substr($updatedata,0,strlen($updatedata)-1);
            foreach ($condition as $key=>$val) {
                $updatecondition.="`".$key."` ='".$val."' and ";
            }
            $updatecondition=substr($updatecondition,0,strlen($updatecondition)-4);
            return "UPDATE `".$table."` SET ".$updatedata." WHERE ".$updatecondition;
        }
          /**
        *  @author Subroto Saha
        *  @param string $table table name of database
        *  @param string[] $condition With [KEY => VALUE] pair for delete operation
        *  @return string build sql and return as string
        *  @access public
        */ 
        public function delete($table,$condition){
            $deletecondition=null;
            foreach ($condition as $key=>$val) {
                $deletecondition.="`".$key."` ='".$val."' and ";
            }
            $deletecondition=substr($deletecondition,0,strlen($deletecondition)-4);
            return "DELETE FROM `".$table."` WHERE ".$deletecondition;
        }
        private function advancedCondition($condition,$Wherecolumnformat){
            $selcondition=null;
                foreach($condition as $key1=>$val1){
                    if(array_key_exists($key1,$Wherecolumnformat)){
                        $selcondition.=$val1."(`".$key1."`) ='".$condition[$key1]."' and";
                    }else{
                        $selcondition.=" `".$key1."` ='".$val1."' and";
                    }
                    }
                return $selcondition;
            }
            private function advancedSelection($data,$selectcolmnformat){
                $selcolumn=null;
                    foreach($data as $key){
                        if(array_key_exists($key,$selectcolmnformat)){
                            $selcolumn.=$selectcolmnformat[$key]."(`".$key."`) as ".$key.",";
                        }
                        else{
                            $selcolumn.="`".$key."` ,";
                        }
                }
                return $selcolumn;
            }
}
?>