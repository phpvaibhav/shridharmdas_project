<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Common Model
 * version: 1.0 (03-03-2020)
 * Common DB queries used in app
 */
class Common_model extends CI_Model {
    
    /* INSERT RECORD FROM SINGLE TABLE */
    function insertData($table, $dataInsert) {
        $this->db->insert($table, $dataInsert);
        return $this->db->insert_id();
    }//end function
    /* INSERT RECORD FROM batch TABLE */
    function insertBatch($table, $dataInsert) {
        $insert = $this->db->insert_batch($table, $dataInsert);
        return $insert;
    }//end function
    /* UPDATE RECORD FROM SINGLE TABLE */
    function updateFields($table, $data, $where){
        $update = $this->db->update($table, $data, $where);
    //    if($this->db->affected_rows() > 0){
        if($update){
            return true;
        }else{
            return false;
        }
    }//end function
    /* UPDATE RECORD FROM TABLE */
    function deleteData($table,$where){
        $this->db->where($where);
        $this->db->delete($table); 
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }   
    }//end function
    /* Delete RECORD FROM TABLE */
    function deleteDataJobType($table,$where,$where_in){
        $this->db->where($where);
        $this->db->where_not_in('questionId',$where_in);
        $this->db->delete($table); 
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }   
    }//end function
    /* GET SINGLE RECORD 
     * Modified in ver 2.0
     */
    function getsingle($table, $where = '', $fld = NULL, $order_by = '', $order = '') {
        if ($fld != NULL) {
            $this->db->select($fld);
        }
        $this->db->limit(1);

        if ($order_by != '') {
            $this->db->order_by($order_by, $order);
        }
        if ($where != '') {
            $this->db->where($where);
        }

        $q = $this->db->get($table);
        return $q->row_array();
    }//end function
    /* GET MULTIPLE RECORD 
     * Modified in ver 2.0
     */
    function getAll($table,$where = '', $order_fld = '', $order_type = '', $select = 'all', $limit = '', $offset = '',$group_by='') {
        $data = array();
        if ($select == 'all') {
            $this->db->select('*');
        } else {
            $this->db->select($select);
        }
        if($group_by !=''){
            $this->db->group_by($group_by);
        }
        $this->db->from($table);
        if ($where != '') {
            $this->db->where($where);
        }
        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }
        if ($order_fld != '' && $order_type != '') {
            $this->db->order_by($order_fld, $order_type);
        }
        $q = $this->db->get();
        return $q->result(); //return multiple records
    }//end function
    /* get single record using join 
     * Modified in ver 2.0
     */
    function GetSingleJoinRecord($table, $field_first, $tablejointo, $field_second,$field_val='',$where="") {
        $data = array();
        if(!empty($field_val)){
            $this->db->select("$field_val");
        }else{
            $this->db->select("*");
        }
        $this->db->from("$table");
        $this->db->join("$tablejointo", "$tablejointo.$field_second = $table.$field_first","inner");
        if(!empty($where)){
            $this->db->where($where);
        }
        $q = $this->db->get();
        return $q->row();  //return only single record
    }//end function
    /* Get mutiple records using join 
     * Modified in ver 2.0
     */ 
    function GetJoinRecord($table, $field_first, $tablejointo, $field_second,$field_val='',$where="",$group_by='',$order_fld='',$order_type='', $limit = '', $offset = '') {
        $data = array();
        if(!empty($field_val)){
            $this->db->select("$field_val");
        }else{
            $this->db->select("*");
        }
        $this->db->from("$table");
        $this->db->join("$tablejointo", "$tablejointo.$field_second = $table.$field_first","inner");
        if(!empty($where)){
            $this->db->where($where);
        }
        if(!empty($group_by)){
            $this->db->group_by($group_by);
        }

        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }
        if(!empty($order_fld) && !empty($order_type)){
            $this->db->order_by($order_fld, $order_type);
        }
        $q = $this->db->get();
        return $q->result();
    }//end function
    /* Get records joining 3 tables 
     * Modified in ver 2.0
     */
    function GetJoinRecordThree($table, $field_first, $tablejointo, $field_second,$tablejointhree,$field_three,$table_four,$field_four,$field_val='',$where="" ,$group_by="",$order_fld='',$order_type='', $limit = '', $offset = '') {
        $data = array();
        if(!empty($field_val)){
            $this->db->select("$field_val");
        }else{
            $this->db->select("*");
        }
        $this->db->from("$table");
        $this->db->join("$tablejointo", "$tablejointo.$field_second = $table.$field_first",'inner');
        $this->db->join("$tablejointhree", "$tablejointhree.$field_three = $table_four.$field_four",'inner');
        if(!empty($where)){
            $this->db->where($where);
        }

        if(!empty($group_by)){
            $this->db->group_by($group_by);
        }
        
        if ($limit != '' && $offset != '') {
            $this->db->limit($limit, $offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }
        
        if(!empty($order_fld) && !empty($order_type)){
            $this->db->order_by($order_fld, $order_type);
        }
        $q = $this->db->get();
        return $q->result();
    }//end function
    /* Exceute a custom build query by query binding- Useful when we are not able to build queries using CI DB methods
     * Prefreably to be used in SELECT queries
     * The main advantage of building query this way is that the values are automatically escaped which produce safe queries.
     * See example here: https://www.codeigniter.com/userguide3/database/queries.html#query-bindings
     * Modified in ver 2.0
     */
    public function custom_query($myquery, $bind_data=array()){
        $query = $this->db->query($myquery, $bind_data);
        return $query->result();
    }//end function

    /* check if any value exists in and return row if found */
    public function is_id_exist($table,$key,$value){
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($key,$value);
        $ret = $this->db->get()->row();
        if(!empty($ret)){
            return $ret;
        }
        else
            return FALSE;
    }//end function
    
    /* Get single value based on table field */
    public function get_field_value($table, $where, $key){ 
        $this->db->select($key);
        $this->db->from($table);
        $this->db->where($where);
        $ret = $this->db->get()->row();
        if(!empty($ret)){
            return $ret->$key;
        }
        else
            return FALSE;
    }//end function
    
    /* Get total records of any table */
    function get_total_count($table, $where=''){
        $this->db->from($table);
        if(!empty($where))
            $this->db->where($where);
        
        $query = $this->db->get();
        return $query->num_rows(); //total records
    }//end function 
    /* Check if given data exists in table and return record if exist- Very useful fn
     * Modified in ver 2.0
     */
    function is_data_exists($table, $where){
        $this->db->from($table);
        $this->db->where($where);
        $query      = $this->db->get();
        $rowcount   = $query->num_rows();
        if($rowcount==0){
            return FALSE; //record not found
        }else{
            return $query->row(); //return record if found (In preveious versions, this use to return TRUE(bool) only)
        }
    } //end function
    function userInfo($where){
        $userPath    = base_url().USER_AVATAR_PATH.'thumb/';
        $userDefault = base_url().USER_DEFAULT_AVATAR;
        $this->db->select('id,
            id as userId,
            fullName,
            email,
            authToken,
            userType,
            (case when (profileImage = "") 
            THEN "'.$userDefault.'" ELSE
            concat("'.$userPath.'",profileImage) 
            END) as profileImage,
            (case when (userType = 1) 
            THEN "Super Admin" when (userType = 2) 
            THEN "Customer" when (userType = 3) 
            THEN "Employee" ELSE
            "Unknown" 
            END) as userRole');
        $this->db->from(USERS);
        $this->db->where($where);
        $sql = $this->db->get();

        if($sql->num_rows()):
            return $sql->row_array();
        endif;
        return false;
    } //End Function usersInfo 
    function adminInfo($where){
        $userPath    = base_url().ADMIN_AVATAR_PATH.'thumb/';
        $userDefault = base_url().ADMIN_DEFAULT_AVATAR;
        $this->db->select('id,
            id as userId,
            fullName,
            email,
            authToken,
            userType,
            (case when (profileImage = "") 
            THEN "'.$userDefault.'" ELSE
            concat("'.$userPath.'",profileImage) 
            END) as profileImage,
            (case when (userType = 1) 
            THEN "Super Admin" when (userType = 2) 
            THEN "Customer" when (userType = 3) 
            THEN "Employee" ELSE
            "Unknown" 
            END) as userRole');
        $this->db->from(ADMIN);
        $this->db->where($where);
        $sql= $this->db->get();

        if($sql->num_rows()):
            return $sql->row_array();
        endif;
        return false;
    } //End Function usersInfo 
    /**
     * Generate auth token for API users
     * Modified in version 2.0
    */
    function generate_token(){
        $this->load->helper('security');
        $res = do_hash(time().mt_rand());
        $new_key = substr($res,0,config_item('rest_key_length'));
        return $new_key;

    }//end function
    /**
    *
    *
    ****/
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }//end function
    
} //end of class
/* Do not close php tags */
/* IMP: Do not add any new method in this file */