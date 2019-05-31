<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('events_model');
	}

	public function index_get()
	{
		$date = $this->input->get('date');
		if (empty($date)) {
			$this->response(['Please specify the date!'], 412);
			return;
		}

		$events = $this->events_model->getDailyEvents($date);

		$this->response(['events' => $events], 200);
	}

	private function response(array $data, int $httpStatus)
	{
		$this->output->set_content_type('application/json');
		$this->output->set_status_header($httpStatus);
		$this->output->set_output(json_encode($data));
	}
}
