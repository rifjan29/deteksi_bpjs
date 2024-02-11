<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
		// Load library PHPExcel (PhpSpreadsheet)
		// $this->load->library('PhpSpreadsheet');
    }

    public function index() {
        $this->load->view('upload_excel');
    }

	public function rules()
	{
		return [
			[
				'field' => 'file',
				'label' => 'File',
				'rules' => 'required'
			],
		];
	}
    public function upload() {
		$this->load->library('form_validation');

		if (empty($_FILES['file']['name']))
		{
			$this->form_validation->set_rules('file', 'Document', 'required');
			return $this->load->view('upload_excel');
		}
		$upload_file = $_FILES['file']['name'];
		$extension = pathinfo($upload_file,PATHINFO_EXTENSION);
		if ($extension == 'csv') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} elseif ($extension == 'xls') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} elseif ($extension = 'xlsx') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		} else {
			$data['error'] = 'File format is not supported. Please upload a CSV, XLS, or XLSX file.';
			$this->load->view('upload_excel', $data);
			return;
		}
		$excel = $reader->load($_FILES['file']['tmp_name']);
		$sheetData = $excel->getActiveSheet()->toArray(null, true, true, true);
		$duplicates = $this->findDuplicates($sheetData);
		$data['duplicates'] = $duplicates;
		$this->load->view('display_duplicates', $data);
    }

	private function findDuplicates($sheetData) {
        $duplicates = array();
		foreach ($sheetData as $key => $row) {
			// Cek apakah data sudah pernah diproses
			if(isset($row['processed'])) {
				continue;
			}
			$currentNokartu = $row['E'];
			$currentTglpulang = $row['D'];
			$foundDuplicates = array();
			foreach ($sheetData as $innerKey => $innerRow) {
				if($key != $innerKey && $currentNokartu == $innerRow['E'] && $currentTglpulang == $innerRow['D']) {
					$foundDuplicates[] = $innerRow;
					// Tandai data sebagai sudah diproses
					$sheetData[$innerKey]['processed'] = true;
				}
			}
			if(!empty($foundDuplicates)) {
				$duplicates[] = array_merge(array($row), $foundDuplicates);
			}
		}
		return $duplicates;
    }
  
}
