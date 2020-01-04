<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("product");
		$this->load->model("cashier");
		$this->load->model("category");
		$this->load->library('form_validation');
		$this->load->helper('url');
	}
	
	public function index() {
		$this->product();
	}
	
	public function product() {
		$this->load->view('product');
	}
	
	public function cashier() {
		$this->load->view('cashier');
	}
	
	public function category() {
		$this->load->view('category');
	}
	
	public function add_product() {
		$this->product->name = $this->input->post('name');
		$this->product->price = $this->input->post('price');
		$this->product->id_category = $this->input->post('category');
		$this->product->id_cashier = $this->input->post('cashier');
		
		$r = $this->product->create();
		echo json_encode($r);
	}
	
	public function edit_product() {
		$this->product->name = $this->input->post('name');
		$this->product->price = $this->input->post('price');
		$this->product->id_category = $this->input->post('category');
		$this->product->id_cashier = $this->input->post('cashier');
		
		$r = $this->product->update($this->input->post('id'));
		echo json_encode($r);
	}
	
	public function delete_product() {
		$r = $this->product->delete($this->input->post('id'));
		echo json_encode($r);
	}
	
	public function add_cashier() {
		$this->cashier->name = $this->input->post('name');
		
		$r = $this->cashier->create();
		echo json_encode($r);
	}
	
	public function edit_cashier() {
		$this->cashier->name = $this->input->post('name');
		$r = $this->cashier->update($this->input->post('id'));
		echo json_encode($r);
	}
	
	public function delete_cashier() {
		$r = $this->cashier->delete($this->input->post('id'));
		echo json_encode($r);
	}
	
	public function add_category() {
		$this->category->name = $this->input->post('name');
		
		$r = $this->category->create();
		echo json_encode($r);
	}
	
	public function edit_category() {
		$this->category->name = $this->input->post('name');
		$r = $this->category->update($this->input->post('id'));
		echo json_encode($r);
	}
	
	public function delete_category() {
		$r = $this->category->delete($this->input->post('id'));
		echo json_encode($r);
	}
}
