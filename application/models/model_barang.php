
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barang extends CI_Model {

    function simpan_barang($simpan_data)
    {
        $simpan = $this->db->insert('barang', $simpan_data);
        return $simpan;
    }

    function delete_barang($id_barang)
    {
        $query=$this->db->query("DELETE FROM barang WHERE id_barang='$id_barang'");
    }

    function get_barang_all()
      {
          $query=$this->db->query("SELECT * FROM barang ORDER BY id_barang DESC");
          return $query->result();
      }
        function get_barang_where($id_barang)
      {
          $query=$this->db->query("SELECT * FROM barang where id_barang='$id_barang'");
          return $query->result();
      }
        function get_data_cart($id_barang)
      {
          $query=$this->db->query("SELECT * FROM barang where id_barang='$id_barang'");
          return $query->row();
      }
      function edit_barang($id_barang)
      {
          $q="SELECT * FROM  barang WHERE id_barang='$id_barang'";
          $query=$this->db->query($q);
          return $query->row();
      }

      function simpan_edit_barang($id_barang, $nama, $deskripsi, $harga, $stok)
      {
          $data = array(
              'id_barang'       	=> $id_barang,
              'nama'   						=> $nama,
              'deskripsi' 	      => $deskripsi,
              'harga'       			=> $harga,
              'stok'          		=> $stok,

          );
          $this->db->where('id_barang', $id_barang);
          $this->db->update('barang', $data);
      }
}
