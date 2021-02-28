<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
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
        $this->load->model('ModelBarang');
    }

    public function index()
    {
        $data['title'] = "Daftar Barang";
        $data['allUser'] = $this->ModelBarang->getUserData();

        $dats['barang'] = $this->ModelBarang->tampilBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/v_barang', $dats);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('foto', 'Foto', 'required');

        $owner = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $kategori = $this->input->post('kategori');
        $foto = $_FILES['foto'];
        if ($foto = "") {
            # code...
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "FAILED";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama' => $nama,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'stok' => $stok,
            'kategori' => $kategori,
            'foto' => $foto,
            "owner" => $owner,
        );

        $this->ModelBarang->input_data($data, 'barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully</strong> Inserted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Barang/index');
    }

    public function detail($id)
    {
        // $this->load->model('m_mhs');
        $data['title'] = "Detail Barang";
        $data['allUser'] = $this->ModelBarang->getUserData();
        $data['detail'] = $this->ModelBarang->detail_data($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/detail_barang', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $where = array(
            'idbarang' => $id,
        );

        $this->ModelBarang->hapus_data($where, 'barang');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Successfully</strong> Deleted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Barang/index');
    }

    public function edit($id)
    {
        $where = array(
            'idbarang' => $id,
        );

        $data['title'] = "Edit Data Barang";
        $data['allUser'] = $this->ModelBarang->getUserData();
        $data['barang'] = $this->ModelBarang->edit_data($where, 'barang')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/edit_barang', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('idbarang');
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $kategori = $this->input->post('kategori');
        $foto = $_FILES['foto'];
        if ($foto = "") {
            # code...
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gagal Upload Foto";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama' => $nama,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'stok' => $stok,
            'kategori' => $kategori,
            'foto' => $foto,
        );

        $where = array(
            'idbarang' => $id,
        );

        $this->ModelBarang->update_data($where, $data, 'barang');
        $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Successfully</strong> Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Barang/index');
    }
}
