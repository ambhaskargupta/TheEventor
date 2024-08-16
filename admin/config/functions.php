<?php
class myfunctions{
    function unique_number($length_of_string){
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $unique_id = substr(str_shuffle($str_result),0, $length_of_string);
        return $unique_id;
    }
    
    function login($users,$u_name,$p_word){
        $sql = "SELECT * FROM $users WHERE username = '$u_name' AND status = 1";
        $sqlRs = $this->sql_query($sql);
        if(!empty($p_word)){
            if($sqlRs->rowCount() > 0){
                   $userData = $sqlRs->Fetch();
                   $dbPass = $userData['password'];
                   $pass_verify = password_verify($p_word,$dbPass);
                   if($pass_verify){
                           $_SESSION['u_id'] = $userData['id'];
                           $_SESSION['u_name'] = $userData['username'];
                           $_SESSION['name'] = $userData['name'];
                           return true;
                   }
                   else{
                       return false;
                    }
            }    
        }
    }
        
    function sql_query($sql){
        global $pdocon;
        $result = $pdocon->prepare($sql);
        $result->execute();
        return $result;
    }
    
    function fetch_data($sql, $single = false){
        $res = $this->sql_query($sql);
        $result = $res->fetchAll();
        return $result;
    }
    
    function fetch_data_single($sql){
        $res = $this->sql_query($sql);
        $result = $res->fetch();
        return $result;
    }
    
    function make_link($section='', $page=''){
        $page_link = $_SERVER['PHP_SELF'].'?sub='.$section.'&page='.$page;
        return $page_link;
    }
    
    function single_value($sql){
        $quer = $this->sql_query($sql);
        $one_val = $quer->fetch();
        if(!empty($one_val)){
            return $one_val[0]; 
        }
        else{
            return $one_val[0]=''; 
        }
    }
    
}
$function = new myfunctions();
?>
