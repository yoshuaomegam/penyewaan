    			

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Barang extends CI_Controller {
	function __Construct()
	{
		parent ::__construct();
		$this->load->library('cart');
	}
	public function cart($id_barang){

		if ($this->session->userdata('username') == FALSE){
			redirect('controller_member');
		}

		else {
			$this->load->model('model_barang');
			$ambildata = $this->model_barang->get_data_cart($id_barang);
			$data = array(
				'id'=>$ambildata->id_barang,
				'name'=>$ambildata->nama,
				'price' =>$ambildata->harga,
				'qty'=> 1
				);
			$this->cart->insert($data);
			redirect('controller_barang/katalog');
		}
	}
	public function showcart(){
		
		$lihatcart=$this->cart->contents();
		$this->load->view('view_cart');
	}
	public function hapus_barang_cart($rowid){
		$data=array('rowid' => $rowid, 'qty' =>0);
		$this->cart->update($data);
		$this->load->view('view_cart');
	}
	public function update(){
		$i=1;
		foreach ($this->cart->contents() as $produk) {
			$this->cart->update(array('rowid'=>$produk['rowid'],'qty'=>$_POST['qty'.$i]));
			$i++;}
			$this->load->view('view_cart');


		}
		function deskripsi_barang($id_barang){
			$data['judul']='Update Data Barang';
			$this->load->model('model_barang');
			$data['daftar_barang']=$this->model_barang->get_barang_where($id_barang);
			$this->load->view('view_deskripsi', $data);
		}
		function katalog(){
			$this->load->model('model_barang');
			$data['judul'] = 'Menampilkan Data dari Database Menggunakan Codeigniter';
			$data['daftar_barang'] = $this->model_barang->get_barang_all();
			$this->load->view('view_katalog',$data);
		}
		function barang()
		{
			$data['judul'] = 'Insert Data Barang';
			$this->load->view('view_tambahbarang', $data);
		}
		function simpan_barang()
		{
			$this->load->model('model_barang');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
			$this->form_validation->set_rules('harga', 'harga', 'required');
			$this->form_validation->set_rules('stok', 'stok', 'required');
			$data['gambar'] = $this->model_barang->get_barang_all();
			if ($this->form_validation->run() == FALSE)
			{

				$this->load->view('view_tambahbarang');

			} else {

				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|png|jpeg|';
				$config['max_size'] = '3000'; // MB
				$config['max_width'] = '2000'; // dalam pixel
				$config['max_height'] = '2000'; // dalam pixel
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('gambar')) // tadi belom di masukkin name input file (gambar)
				{
					$this->load->view('view_tambahbarang', $data);
					$error = array('error' => $this->upload->display_errors()); // nyimpen output error saat upload
					var_dump($error); // nampilin error
				} else {
					$gambar = $this->upload->data();
					$simpan_data=array(
						'nama'      => set_value('nama'),
						'deskripsi'      => set_value('deskripsi'),
						'harga'        => set_value('harga'),
						'gambar'      => $gambar['file_name'],
						'stok'        => set_value('stok')
						);
					$this->model_barang->simpan_barang($simpan_data);
					$data['notifikasi'] = 'Data berhasil disimpan';
					$data['judul']='Insert Data Berhasil';
					redirect('Controller_Barang/tampil_barang');

				}
			}
		}

		function tampil_barang()
		{
			$this->load->model('model_barang');
			$data['judul'] = 'Menampilkan Data dari Database Menggunakan Codeigniter';
			$data['daftar_barang'] = $this->model_barang->get_barang_all();
			$this->load->view('view_barang',$data);
		}

		function delete_barang($id_barang)
		{
			$this->load->model('model_barang');
			$username = $this->model_barang->delete_barang($id_barang);
			redirect('controller_barang/tampil_barang');

		}

		function edit_barang($id_barang)
		{
			$data['judul']='Update Data Barang';
			$this->load->model('model_barang');
			$data['edit']=$this->model_barang->edit_barang($id_barang);
			$this->load->view('view_editbarang', $data);
		}

		function simpan_edit_barang()
		{
			$id_barang = $this->input->post('id_barang');
			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$harga = $this->input->post('harga');
			$stok = $this->input->post('stok');

			$data['judul'] = 'Update Data Codeigniter';
			$this->load->model('model_barang');
			$data['edit'] = $this->model_barang->simpan_edit_barang($id_barang, $nama, $deskripsi, $harga, $stok);
			$data['notifikasi'] = 'Data telah berhasil disimpan';
			//$this->load->view('notifikasi', $data);
			redirect('controller_barang/tampil_barang');
		}
	}
