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
	public function index($language = 'ar')
	{
		// Loading the brands.
		$this->load->model('brand');

		$brands = $this->brand->getAll();

		// Loading the language's helper.
		$this->load->helper('language');
		$this->lang->load($language, $language);

		$data = [
			"lang" => $language,
			"brands" => $brands
		];

		$this->load->view('templates/header');
		$this->load->view('car_man', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * Saving the sent data to the database.
	 */
	public function save() {
		
		// Getting the data.
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$brand = $this->input->post('brand');
		$model = $this->input->post('model');
		$plateNumber = $this->input->post('plateNumber');
		$year = $this->input->post('year');
		$motive = $this->input->post('motive');
		$observations = $this->input->post('observations');
		$language = $this->input->post('language');
		$image = '';
		$errors = [];

		// Setting up the upload configurations.
		$config['upload_path'] ="./uploads/";
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = 1024 * 2;
		
		// Loading the upload library.
		$this->load->library('upload', $config);

		// Loading the record model.
		$this->load->model('record');
		
		// Loading the language's helper.
		$this->load->helper('language');
		$this->lang->load($language, $language);

		if($this->upload->do_upload("image")) {
	
			// Uploading the image.
			$this->upload->data();

			// Getting the image name.
			$image = $this->upload->data('file_name');
		}

		if (strlen($name) > 50) {
			$errors[] = lang('ERROR_LENGTH_NAME');
		}

		if (strlen($email) > 50) {
			$errors[] = lang('ERROR_LENGTH_EMAIL');
		}

		if (strlen($plateNumber) > 8) {
			$errors[] = lang('ERROR_LENGTH_PLATE_NUMBER');
		}

		if (strlen($year) > 4) {
			$errors[] = lang('ERROR_LENGTH_YEAR');
		}

		if ($_FILES['image']['size'] > 1024 * 1024) {
			$errors[] = lang('ERROR_IMAGE_SIZE');
		}
		
		if (count($errors) == 0) {

			// Inserting the data in the database.
			$this->record->insert($name, $email, $brand, $model, $plateNumber, $year, $motive, $observations, $image);

			// Sending email.
			$emailConfig = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'car.man.codeigniter',
				'smtp_pass' => 'carmancodeigniter',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $emailConfig);
			$this->email->set_newline("\r\n");
			
			$this->email->from('car.man.codeigniter@gmail.com', 'Car-Man');
			$this->email->to($email);
			$this->email->cc($email);
			$this->email->bcc($email);

			$this->email->subject('Car Management');

			$msg = "Name: $name<br>";
			$msg .= "Email: $email<br>";
			$msg .= "Brand: " . $brand . "<br>";
			$msg .= "Model: " . $model . "<br>";
			$msg .= "Plate Number: $plateNumber<br>";
			$msg .= "Year: $year<br>";
			$msg .= "Motive: " . $motive . "<br>";
			$msg .= "Observations: $observations";

			if ($image !== '') {
				$this->email->attach('./uploads/' . $image);
			} 

			$this->email->message($msg);
			$this->email->set_mailtype("html");
			
			$result = $this->email->send();
		}

		header('Content-Type: application/json');

		echo json_encode($errors);
	}

	/**
	 * Returns the models of a specific brand.
	 */
	public function updateModels($brandID) {

		// Loading the brands.
		$this->load->model('model');

		$models = $this->model->getBrandModels($brandID);

		header('Content-Type: application/json');

		echo json_encode($models);
	}
}
