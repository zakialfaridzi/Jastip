<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kota_model');
	}

	public function index()
	{
		$data['kota'] = $this->Kota_model->getKota();

		$this->load->view('index', $data);
	}

	public function hasilAjax($value)
	{

		$data['arr'] = $this->Kota_model->getUniv($value);
		$this->load->view('ubah', $data);
	}

	public function tambahMemo()
	{

		$data = [
			'nama_kota' => $this->input->post('pilih'),
			'nama_univ' => $this->input->post('univ')
		];

		$this->db->insert('backup', $data);

		redirect('welcome');
	}
}
