<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventByDay extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('events_model');
	}

	public function index_get()
	{
		if (empty($this->input->get['date'])) {
			$this->response(['Please specify the date!'], 412);
			return;
		}

		$this->response(['events' => $this->events_model->getDailyEvents($this->input->get['date'])], 200);
	}
}
