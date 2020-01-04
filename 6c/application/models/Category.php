<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {
	public $name;
	
	public function setup(){
		$this->load->dbforge();
		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			)
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id',true);
		return $this->dbforge->create_table('category',true);
	}
	
	public function read(){
		$query = $this->db->get('category', 10);
		return $query->result();
	}
	
	public function create(){
		$r = new stdClass;
		$r->status = 0;
		$r->message = [];
		
		if(preg_match("/^[a-zA-Z0-9\h]{3,100}$/",$this->name) !== 1) {
			$r->status |= 0x1;
			$r->message []= "Invalid category name";
		}
		
		if($r->status == 0) $this->db->insert('category', $this);
		return $r;
	}
	
	public function update($id){
		$r = new stdClass;
		$r->status = 0;
		$r->message = [];
		
		if(preg_match("/^[0-9]{1,9}$/",$id) !== 1) {
			$r->status |= 0x1;
			$r->message []= "Invalid ID";
		}
		if(preg_match("/^[a-zA-Z0-9\h]{3,100}$/",$this->name) !== 1) {
			$r->status |= 0x2;
			$r->message []= "Invalid category name";
		}
		
		if($r->status == 0) $this->db->update('category', $this, array('id' => $id));
		return $r;
	}
	
	public function delete($id){
		$r = new stdClass;
		$r->status = 0;
		$r->message = [];
		
		if(preg_match("/^[0-9]{1,9}$/",$id) !== 1) {
			$r->status |= 0x1;
			$r->message []= "Invalid ID";
		}
		if($r->status == 0) $this->db->delete('category', array('id' => $id));
		return $r;
	}
}
