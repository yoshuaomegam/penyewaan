<?php
	class Model_pemesanan extends CI_Model{
    function simpan_pemesanan(){
        $this->load->library('cart');
//create new invoice
        $invoice = array(
            'tanggal'      => date('Y-m-d H:i:s'),
            'id_user'   => $this->get_logged_user_id(),
            'status'    => 'belum dibayar'
        );
        $this->db->insert('pemesanan', $invoice);
        $invoice_id = $this->db->insert_id();
        
        // put ordered items in orders table
        foreach($this->cart->contents() as $items){
            $data = array(
                'id_user'        => $this->get_logged_user_id(),
                'id_barang'        => $items['id'],
                'qty'               => $items['qty'],
                'harga'             => $items['price']
            );
            $this->db->insert('memesan_barang', $data);
    }
    return true;
}
        function get_pemesanan_where()
      {
        $id_user=$this->get_logged_user_id();
          $query=$this->db->query("SELECT *, sum(m.harga*m.qty) as total FROM memesan_barang m join pemesanan p on p.id_user=m.id_user join barang b on b.id_barang=m.id_barang join users s on s.id_user=p.id_user where s.id_user='$id_user'");
          return $query->result();
      }
    public function get_logged_user_id()
    {
        $hasil = $this->db
                        ->select('id_user')
                        ->where('username',$this->session->userdata('username'))
                        ->limit(1)
                        ->get('users');
        if($hasil->num_rows() > 0){
            return $hasil->row()->id_user;
        } else {
            return 0;
        }
    }
    public function pembayaran($namapenerima,$alamat,$notelp,$foto){
$a = $this->session->userdata('idpemesanan');
$query=$this->db->query("UPDATE pemesanan SET nama_penerima = '$namapenerima', alamat='$alamat',notelp='$notelp',bukti='$foto' where id_pemesanan='$a'");
    }
        public function daftar_pemesanan(){
        $query=$this->db->query("SELECT * FROM memesan_barang m join pemesanan p on p.id_user=m.id_user join barang b on b.id_barang=m.id_barang join users s on s.id_user=p.id_user");
                return $query->result();
    }
            function get_barangdibeli($username)
      {
          $query=$this->db->query("SELECT * FROM memesan_barang m join pemesanan p on p.id_user=m.id_user join barang b on b.id_barang=m.id_barang join users s on s.id_user=p.id_user where username='$username'");
          return $query->result();
      }


      public function update_status($username)
      {
        $query=$this->db->query("UPDATE pemesanan SET status = 'SUDAH BAYAR' WHERE id_user = (SELECT id_user FROM users where username = '$username')");
      }
      public function get_kurir(){
        $query=$this->db->query("SELECT * FROM users where `group`='3'");
        return $query->result();
      }
      public function update_kurir($username){
        $a = $this->session->userdata('idpemesanan');
        $query=$this->db->query("UPDATE pemesanan SET nama_kurir = '$username' where id_pemesanan='$a'");

      }
      public function get_bagiankurir(){
        $user=$this->session->userdata('username');
         $query=$this->db->query("SELECT * FROM memesan_barang m join pemesanan p on p.id_user=m.id_user join barang b on b.id_barang=m.id_barang join users s on s.id_user=p.id_user where nama_kurir='$user'");
                return $query->result();
      }
      public function getiduser($id_pemesanan){
       $query=$this->db->query("SELECT id_user from pemesanan where id_pemesanan='$id_pemesanan'");
       return $query->result();
      }
      public function validasi($id_user){
      $query=$this->db->query("DELETE from memesan_barang where id_user='$id_user'");        
      }
}
?>