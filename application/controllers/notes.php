<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {


	public function index()
	{
		$this->load->model('note');
		$data['notes'] = $this->note->get_all();
		$this->load->view('index', $data);

	}
	public function in_json(){
		$this->load->model('note');
		$data['notes'] = $this->note->get_all();
		echo json_encode($data);
	}
	public function in_html()
	{
		$this->load->model('note');
		$data['notes'] = $this->note->get_all();
		$this->load->view('partials/notes', $data);
	}
	public function add_note()
	{
		$this->load->model('note');
		$this->note->add_note($this->input->post('note'));
		$data['new_one'] = $this->input->post('note');
		echo json_encode($data);
	}
}
