<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarMan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($lang = 'ar')
	{
		// Loading the brands.
		$this->load->model('brand');

		$brands = $this->brand->getAll();

		// Loading the language's helper.
		$this->load->helper('language');
		$this->lang->load($lang, $lang);

		$data = [
			"lang" => $lang,
			"brands" => $brands
		];

		$this->load->view('templates/header');
		$this->load->view('car_man', $data);
		$this->load->view('templates/footer');
	}

	public function updateModels($brandID) {

		// Loading the brands.
		$this->load->model('model');

		$models = $this->model->getBrandModels($brandID);

		echo json_encode($models);
	}
}
