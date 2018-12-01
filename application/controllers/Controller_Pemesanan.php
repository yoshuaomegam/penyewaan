<?php 
class Controller_Pemesanan extends CI_Controller {
	function __Construct()
	{
		parent ::__construct();
		$this->load->model('model_pemesanan');
		$this->load->library('session');
	}
	function konfirmasi(){
		$is_processed = $this->model_pemesanan->simpan_pemesanan();
		if($is_processed){
			$this->cart->destroy();
			$data['daftar_barang']=$this->model_pemesanan->get_pemesanan_where();
			$this->load->view('view_invoice',$data);
		} else {
			$this->session->set_flashdata('error','Failed to processed your order, please try again!');
			$this->load->view('view_cart');
		}
	}
	function form_pembayaran($idpemesanan){
		$this->session->set_userdata('idpemesanan', $idpemesanan);
		$this->load->view('view_pembayaran');
	}
	function daftarpembelian(){
					$data['daftar_barang']=$this->model_pemesanan->get_pemesanan_where();
					$this->load->view('view_pembelian',$data);
	}
	function pembayaran(){
			$this->form_validation->set_rules('penerima', 'Penerima', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('notelp', 'No Telp', 'required');
			if ($this->form_validation->run() == FALSE)
			{

				$this->load->view('view_pembayaran');

			} else {

				$config['upload_path'] = './assets/pembayaran';
				$config['allowed_types'] = 'jpg|png|jpeg|';
				$config['max_size'] = '3000'; // MB
				$config['max_width'] = '2000'; // dalam pixel
				$config['max_height'] = '2000'; // dalam pixel
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('gambar')) // tadi belom di masukkin name input file (gambar)
				{
					$this->load->view('view_pembayaran', $data);
					$error = array('error' => $this->upload->display_errors()); // nyimpen output error saat upload
					var_dump($error); // nampilin error
				}	 else {
					$gambar = $this->upload->data();
					$namapenerima=$this->input->post('penerima');
					$alamat=$this->input->post('alamat');
					$notelp=$this->input->post('notelp');
					$foto=$gambar['file_name'];

					$this->model_pemesanan->pembayaran($namapenerima,$alamat,$notelp,$foto);
					$data['notifikasi'] = 'Data berhasil disimpan';
					$data['judul']='Insert Data Berhasil';
					redirect('Controller_Pemesanan/daftarpembelian');

				}
			}
		}
	function daftar_pemesanan(){
			$data['daftar_barang'] = $this->model_pemesanan->daftar_pemesanan();
			$this->load->view('view_daftarpemesanan',$data);
	}
	function lihatbarang($username){
		$data['daftar_barang'] = $this->model_pemesanan->get_barangdibeli($username);
			$this->load->view('view_daftarbarangyangdibeli',$data);
	}

	function validasi_bukti($username){
			$data['daftar_barang'] = $this->model_pemesanan->update_status($username);
			redirect('Controller_Pemesanan/daftar_pemesanan');
	}

	function daftar_kurir($idpemesanan){
		$data['kurir'] = $this->model_pemesanan->get_kurir();
		$this->session->set_userdata('idpemesanan', $idpemesanan);
		$this->load->view('view_daftarkurir',$data);
	}
		function ambil_idpemesanan($id_pemesanan){
		$data['kurir'] = $this->model_pemesanan->get_kurir();
		$this->load->view('view_daftarkurir',$data);
	}


	function pilih_kurir($username){
		$a = $this->session->userdata('idpemesanan');
		$data['kurir'] = $this->model_pemesanan->update_kurir($username);
		redirect('Controller_Pemesanan/daftar_pemesanan');
		$this->session->unset_userdata('idpemesanan'); 
	}

	function home_kurir(){
		$data['daftar_barang'] = $this->model_pemesanan->get_bagiankurir();
		$this->load->view('view_kurir',$data);
	}
	function barang_kurir(){
		$data['daftar_barang'] = $this->model_pemesanan->get_bagiankurir();
		$this->load->view('view_barangkurir',$data);
	}
	function validasi_pengembalian($id_user){
		$id_user=$this->model_pemesanan->validasi(
			$id_user);
		redirect('controller_Pemesanan/home_kurir');
	}
}
?>