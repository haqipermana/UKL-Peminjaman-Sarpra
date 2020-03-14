<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman_model extends CI_Model {

  public function get_peminjaman()
    {
    return $this->db->join('Inventaris','Inventaris.id_inventaris=Inventaris.id_inventaris','Pegawai','Pegawai.id_pegawai=Peminjaman.id_pegawai')->get('Peminjaman')->result();
    }
  public function masuk_db()
  {
    $data_peminjaman=array(
      'id_peminjaman'=>$this->input->post('id_peminjaman'),
      'id_inventaris'=>$this->input->post('id_inventaris'),
      'tanggal_pinjam'=>$this->input->post('tanggal_pinjam'),
      'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
      'status_peminjaman'=>$this->input->post('status_peminjaman'),
      'id_pegawai'=>$this->input->post('id_pegawai'),
    );
    $ql_masuk=$this->db->insert('Peminjaman', $data_peminjaman);
    return $ql_masuk;
  }
  public function detail_peminjaman($id_peminjaman='')
{
  return $this->db->where('id_peminjaman', $id_peminjaman)->get('Peminjaman')->row();
  }

   public function update_peminjaman()
  {
    $dt_up_peminjaman=array(
        'tanggal_pinjam'=>$this->input->post('tanggal_pinjam'),
        'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
        'status_peminjaman'=>$this->input->post('status_peminjaman'),
        'id_inventaris'=>$this->input->post('id_inventaris'),
        'id_pegawai'=>$this->input->post('id_pegawai'),
    );
  return $this->db->where('id_peminjaman',$this->input->post('id_peminjaman'))->update('Peminjaman', $dt_up_peminjaman);
  }
  public function hapus_peminjaman($id_peminjaman)
  {
    $this->db->where('id_peminjaman', $id_peminjaman);
     return $this->db->delete('Peminjaman');
  }  
}

