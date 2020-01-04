<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {
	public $name;
	public $price;
	public $id_category;
	public $id_cashier;
	
	function __construct(){
		parent::__construct(); // construct the Model class
	}
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
			),
			'price' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			),
			'id_category' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			),
			'id_cashier' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			)
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id',true);
		return $this->dbforge->create_table('product',true);
	}
	
	public function read(){
		$this->db->select("product.*,cashier.name as cashier,category.name as category");
		$this->db->join('cashier', 'product.id_cashier = cashier.id', 'left');
		$this->db->join('category', 'product.id_category = category.id', 'left');
		$query = $this->db->get('product', 10);
		return $query->result();
	}

	public function create(){
		$r = new stdClass;
		$r->status = 0;
		$r->message = [];
		
		if(strlen($this->name) <= 3) {
			$r->status |= 0x1;
			$r->message []= "Invalid name";
		}
		if(preg_match("/^[0-9]{1,9}$/",$this->price) !== 1) {
			$r->status |= 0x2;
			$r->message []= "Invalid price";
		}
		if(preg_match("/^[0-9]{1,9}$/",$this->id_category) !== 1) {
			$r->status |= 0x4;
			$r->message []= "Invalid category";
		}
		if(preg_match("/^[0-9]{1,9}$/",$this->id_cashier) !== 1) {
			$r->status |= 0x8;
			$r->message []= "Invalid cashier";
		}
		
		if($r->status == 0) $this->db->insert('product', $this);
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
		if(strlen($this->name) <= 3) {
			$r->status |= 0x2;
			$r->message []= "Invalid name";
		}
		if(preg_match("/^[0-9]{1,9}$/",$this->price) !== 1) {
			$r->status |= 0x4;
			$r->message []= "Invalid price";
		}
		if(preg_match("/^[0-9]{1,9}$/",$this->id_category) !== 1) {
			$r->status |= 0x8;
			$r->message []= "Invalid category";
		}
		if(preg_match("/^[0-9]{1,9}$/",$this->id_cashier) !== 1) {
			$r->status |= 0x20;
			$r->message []= "Invalid cashier";
		}
		if($r->status == 0) $this->db->update('product', $this, array('id' => $id));
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
		if($r->status == 0) $this->db->delete('product', array('id' => $id));
		return $r;
	}

}
