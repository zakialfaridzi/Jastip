<?php
class Konsumen_model extends CI_model
{
    public function getKonsumenData()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT * FROM konsumen join user using(username) where username = '$username'");

        return $query->result();
    }

    public function editProfile($data, $data2)
    {
        $this->db->set($data);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('konsumen');

        $this->db->set($data2);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('user');
    }

    public function tampilBarang()
    {
        $query = $this->db->query('SELECT * FROM barang');
        return $query->result();
    }

    public function getPesanan()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT * FROM Pesanan where namakonsumen = '$username' and statuspemesanan = 'Pending' or statuspemesanan = 'Proses' order by idpesanan desc");
        return $query->result();
    }

    public function getHistoryPesanan()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT * FROM Pesanan where namakonsumen = '$username' order by idpesanan desc");
        return $query->result();
    }

    public function getPesananDetail()
    {
        $query = $this->db->query(' SELECT * FROM pesanan where idpesanan = ' . $this->uri->segment('3'));
        return $query->result();
    }

    public function detail_data()
    {
        $query = $this->db->query(' SELECT * from barang where idbarang = ' . $this->uri->segment('3'));
        return $query->result();
    }

    public function tambahPesanan($data)
    {
        return $this->db->insert('pesanan', $data);
    }

    public function batalkanPesanan($id)
    {
        $this->db->where('idpesanan', $id);
        $this->db->delete('pesanan');
    }
}
