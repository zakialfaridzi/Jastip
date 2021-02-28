<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $data['head'] = "Login";
        $this->load->view('auth/header', $data);
        $this->load->view('auth/isi');
        $this->load->view('auth/footer');
    }

    public function register()
    {
        $data['head'] = "Regist";
        $this->load->view('auth/header', $data);
        $this->load->view('auth/registrasi');
        $this->load->view('auth/footer');
    }

    public function addNewUser()
    {
        $pilih = $this->input->post('pilih');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);

        $cekUname = $this->Auth_model->cekUname(strtolower($username));

        if ($cekUname['jml'] > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Username sudah ada!</strong> Silahkan register kembali
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');

            redirect('auth');
        }

        $data2 = [
            'username' => strtolower($username),
            'gambar' => 'default.jpg',
        ];

        if ($pilih == "Konsumen") {
            $role = 1;
        } elseif ($pilih == "Vendor") {
            $role = 2;
        } else {
            $role = 3;
        }

        $data = [
            'role_id' => $role,
            'username' => $username,
            'email' => $email,
            'password' => $pass,
            'created_at' => date('d-m-Y, H:i:s'),
        ];

        $this->Auth_model->addAktor(strtolower($pilih), $data2);
        $this->Auth_model->addUser($data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Akun telah dibuat!</strong> Silahkan login sekarang
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');

        redirect('auth');
    }

    public function cekLogin()
    {

        $username = $this->input->post('username');
        $pass = $this->input->post('pass');

        $user = $this->db->get_where('user', [
            'username' => $username,
        ])->row_array();

        if ($user) {

            if (password_verify($pass, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                ];

                $this->session->set_userdata($data);

                if ($user['role_id'] == 3) {
                    redirect('admin');
                } elseif ($user['role_id'] == 2) {
                    redirect('Barang');
                } else {
                    redirect('konsumen');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Wrong password!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');

                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Email is not registered
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           You have been logout!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('auth');
    }
}
