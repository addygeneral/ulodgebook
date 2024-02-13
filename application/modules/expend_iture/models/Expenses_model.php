<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses_model extends CI_Model {
	
	private $table = 'expensesmesurement';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('mesurementid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('mesurementid',$data["mesurementid"])
			->update($this->table, $data);
	}

    public function read($limit = null, $start = null)
	{
	    $this->db->select('expensesmesurement.*,expenditureytype.categorytypetitle');
        $this->db->from($this->table);
		$this->db->join('expenditureytype','expenditureytype.categorytypeid=expensesmesurement.categorytypeid','left');
        $this->db->order_by('expensesmesurement.mesurementid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('mesurementid',$id) 
			->get()
			->row();
	} 

public function countlist()
	{
		$this->db->select('expensesmesurement.*,expenditureytype.categorytypetitle');
        $this->db->from($this->table);
		$this->db->join('expenditureytype','expenditureytype.categorytypeid=expensesmesurement.categorytypeid','left');
        $this->db->order_by('expensesmesurement.mesurementid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
	public function allcategorytype()
	{
		$data = $this->db->select("*")
			->from('expenditureytype')
			->get()
			->result();

		$list[''] = 'Select Category Type';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->categorytypeid] = $value->categorytypetitle;
			return $list;
		} else {
			return false; 
		}
	}
    
}
