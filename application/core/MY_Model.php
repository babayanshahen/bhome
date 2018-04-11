<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    public $table;
    public $pk = 'id';
    
    function __construct() 
    {
        parent::__construct();
    }
    
    
    
    public function getUser($where = array())
    {
        $this->db->where($where);
        $res = $this->db->get($this->table)->result_object();
        if(sizeof($res)){
            return $res['0'];
        }else{
            return FALSE;
        }
        // if(is_null($res)){
        //     return FALSE;
        // }else{
            // var_dump($res);
            // return $res['0'];
        // }
        // var_dump($res[0]);
    }

    public function isUserUniq($where = array())
    {
        $this->db->where($where);
        $res = $this->db->get($this->table)->result_object();
        // out(empty($res),'var_dump');
        // out(sizeof($res),'var_dump');
        if(sizeof($res) == 0 && empty($res) ){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getRecords($where = array())
    {
        $this->db->where($where);
        $res = $this->db->get($this->table)->result_object();
        if(sizeof($res)){
            return $res;
        }else{
            return FALSE;
        }
        // if(is_null($res)){
        //     return FALSE;
        // }else{
            // var_dump($res);
            // return $res['0'];
        // }
        // var_dump($res[0]);
    }
    
    public function getRecord($id)
    {
        return $this->db->where($this->pk, $id)->get($this->table)->row();
    }
    
    public function deleteRow($where)
    {
        if(is_numeric($where))
            $this->db->where($this->pk, $where);
        else
            $this->db->where($where);
        if($this->db->delete($this->table))
            return TRUE;
    }
    
    // public function countRows($vars = array())
    // {
    
    //     return $this->db->where($vars)->get($this->table)->num_rows();
    // }
    
    // /* Insert Function */
    
    public function insert($vars){
        // out($vars);
        
        $this->db->insert($this->table, $vars);
        return $this->db->insert_id();
    }
    
    // /* Update Function */
    
    public function update($id, $vars)
    {
        $this->db->where($this->pk, $id)->update($this->table, $vars);
    }

    public function UpdateByField($where, $vars) 
    {
        if(!empty($where))
        {
            return $this->db->where($where)->update($this->table, $vars);
        }       
    }

    public function getRecordByField($where)
    {
        if(!empty($where)){
            $this->db->where($where);
        }
         return $this->db->get($this->table)->row();
        
    }    
    
}