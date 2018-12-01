<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_Member extends CI_Controller {


	public function index()
	{
		$this->load->library('session');
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');


		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_login');
		} else {
			$this->load->model('model_users');
			$valid_user = $this->model_users->check_credential();

			if($valid_user == FALSE)
			{
				$this->session->set_flashdata('error','Wrong Username / Password!');
				redirect('controller_Member');
			} else {
				// if the username and password is a match
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('group', $valid_user->group);

				switch($valid_user->group){
					case 1 : //admin
					$authUser['auth'] = $valid_user->group;
								redirect('Controller_Barang/tampil_barang',$authUser);
								break;
					case 2 : //member
								redirect(base_url());
								break;
					case 3 ://kurir
					redirect('Controller_Pemesanan/home_kurir',$authUser);
								break;
					default: break;
				}
			}
		}
	}

	public function belomLogin(){

		if (!isset($_SESSION['username'])){
  		//redirect('login');
			$this->load->view(form_login);



	}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
