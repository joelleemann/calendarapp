<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller
{
	/** @var Events_model */
	public $events_model;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('events_model');
		$this->load->library('parser');
	}

	public function index()
	{
		$startDate = $this->input->get('start_date');
		if (empty($startDate)) {//in case we don't have a date passed, we can just set as the current day
			$startDate = date('Y-m-d');
		}

		$data = [
			'events' => $this->events_model->getWeeklyEvents($startDate),
			'previousWeekStart' => $this->events_model->getPreviousWeekStart($startDate),
			'nextWeekStart' => $this->events_model->getNextWeekStart($startDate),
		];

		$this->load->view('calendar', $data);
	}
}
