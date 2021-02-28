<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konsumen_model');
        $this->load->library('form_validation');
    }

    public function sessionLogin()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Login first!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
        redirect('auth');
    }

    public function index()
    {
        $data['title'] = 'Dashboard konsumen';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        $data['barang'] = $this->Konsumen_model->tampilBarang();


        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar', $data);
        $this->load->view('konsumen/index', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function detail($id)
    {
        // $this->load->model('m_mhs');
        $data['title'] = "Detail Barang";
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        $data['detail'] = $this->Konsumen_model->detail_data($id);
        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar');
        $this->load->view('Konsumen/detail_barang', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function pesanBarang()
    {
        $data = array(
            'idpesanan' => '',
            'namabarang' => $this->input->post('namabarang'),
            'jumlahbarang' => $this->input->post('jumlahbarang'),
            'hargabarang' => $this->input->post('hargabarang'),
            'totalharga' => $this->input->post('totalharga') * $this->input->post('jumlahbarang'),
            'kategoribarang' => $this->input->post('kategoribarang'),
            'keteranganbarang' => $this->input->post('keteranganbarang'),
            'alamat' => $this->input->post('alamat'),
            'namakonsumen' => $this->input->post('namakonsumen'),
            'idbarang' => $this->input->post('idbarang'),
            'statuspemesanan' => $this->input->post('statuspemesanan'),

        );
        $this->Konsumen_model->tambahPesanan($data);
        redirect("konsumen/statusPemesanan");
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();


        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar', $data);
        $this->load->view('konsumen/profile', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function editProfile()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->editProfile();
        } else {

            $name = htmlspecialchars($this->input->post('name', true));
            $email = htmlspecialchars($this->input->post('email', true));
            $birtdate = htmlspecialchars($this->input->post('tanggallahir', true));
            $gender = htmlspecialchars($this->input->post('jenis_kelamin', true));
            $city = htmlspecialchars($this->input->post('alamat', true));
            $username = htmlspecialchars($this->input->post('username', true));

            $data = [

                'nama_lengkap_konsumen' => $name,
                'tanggal_lahir' => $birtdate,
                'jenis_kelamin' => $gender,
                'alamat' => $city,
                'username' => $username,
            ];

            $data2 = [
                'email' => $email,
                'username' => $username,
            ];

            $username = $this->session->userdata('username');

            $datas = $this->db->query("SELECT * FROM user join konsumen using(username) where username ='$username'")->result();

            foreach ($datas as $d) {

                if ($d->email == $email) {

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <strong>Congratulastions!</strong> your profile is updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

                    $this->Konsumen_model->editProfile($data, $data2);

                    redirect('konsumen/Profile');
                } else {
                    $cekdulu = $this->db->query("select * from user where email ='$email'");

                    if ($cekdulu->num_rows() > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <strong>Sorry :( </strong>' . $email . ' email already used!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
                        redirect('konsumen/Profile');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                        <strong>Congratulastions </strong> your profile is updated <br> Please login again!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');

                        $this->Konsumen_model->editProfile($data, $data2);

                        $this->session->unset_userdata('email');
                        $this->session->unset_userdata('role_id');
                        $this->session->unset_userdata('id');

                        redirect('auth');
                    }
                }
            }
        }

        // $this->Profile_model->editBasicModel($data);
    }

    public function statusPemesanan()
    {
        $data['title'] = 'Status Pemesanan';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        $data['pesanan'] = $this->Konsumen_model->getPesanan();


        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar', $data);
        $this->load->view('konsumen/statusPemesanan', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function detailPesanan($id)
    {
        // $this->load->model('m_mhs');
        $data['title'] = "Detail Barang";
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        $data['detail'] = $this->Konsumen_model->detail_data($id);
        $data['pesanan'] = $this->Konsumen_model->getPesananDetail();

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar');
        $this->load->view('Konsumen/detail_Pesanan', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function batalkanPesanan($id)
    {

        $this->Konsumen_model->batalkanPesanan($id);
        redirect('konsumen/statusPemesanan');
    }

    public function historyPemesanan()
    {
        $data['title'] = 'Status Pemesanan';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        $data['pesanan'] = $this->Konsumen_model->getHistoryPesanan();


        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar', $data);
        $this->load->view('konsumen/historyPemesanan', $data);
        $this->load->view('templatesKonsumen/footer');
    }
}
