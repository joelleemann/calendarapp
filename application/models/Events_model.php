<?php

class Events_model extends CI_Model
{
	private $date_format = 'Y-m-d H:i:s';

	/**
	 * Initialize the database
	 * Events_model constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	/**
	 * Get all the events by day per passed in datetime
	 * @param $startDate
	 * @return mixed
	 * @throws Exception
	 */
	public function getWeeklyEvents($startDate)
	{
		$startDate = $this->getWeekStartDate($startDate);

		$weekStart = new DateTime($startDate);
		$weekStart = $weekStart->format($this->date_format);
		$weekEnd = new DateTime($startDate);
		$weekEnd = $weekEnd->add(new DateInterval('P7D'))->format($this->date_format);
		$this->db->from('sessions')->where([
				'start_time >=' => $weekStart,
				'start_time <=' => $weekEnd
			])->order_by('start_time asc')
			->join('events', 'events.id = sessions.event_id');
		$results = $this->db->get();

		$weeklyDates = $this->getWeekArray($weekStart);
		return $this->organizeEventsByDay($results, $weeklyDates);
	}

	/**
	 * Organize the events by the date
	 * @param $events
	 * @param array $weeklyDates
	 * @throws Exception
	 * @return array
	 */
	private function organizeEventsByDay($events, array $weeklyDates) : array
	{
		$organizedEvents = [];
		foreach($events->result() as $event) {
			$event->total_minutes = $this->getTimeDifferenceInMinutes($event->start_time, $event->end_time);
			$organizedEvents[date('Y-m-d', strtotime($event->start_time))][] = $event;
		}

		//check for any missing days
		foreach($weeklyDates as $date) {
			if (!isset($organizedEvents[$date])) {
				$organizedEvents[$date] = [];
			}
		}

		return $organizedEvents;
	}

	/**
	 * Prepare a full week of dates in case we have empty days without dates
	 */
	private function getWeekArray($startDate)
	{
		$weekArray = [];
		for($i=0; $i<7; $i++) {
			$weekArray[] = date('Y-m-d', strtotime($startDate . " + $i days"));
		}
		return $weekArray;
	}

	/**
	 * Get the total time between two timestamps in minutes
	 * @param $start
	 * @param $end
	 * @return int
	 * @throws Exception
	 */
	private function getTimeDifferenceInMinutes($start, $end) : string
	{
		return (strtotime($end) - strtotime($start)) / 60;
	}

	/**
	 * Get the date of the previous sunday
	 * @param $date
	 * @return mixed
	 * @throws Exception
	 */
	private function getWeekStartDate($date) : string
	{
		if (date('N', strtotime($date)) >= 7) {
			return $date;//already on sunday
		}
		$weekStart = new DateTime($date);
		$weekStart->modify('last Sunday');
		return $weekStart->format('Y-m-d');
	}

	public function getPreviousWeekStart($start) : string
	{
		return date('Y-m-d', strtotime($this->getWeekStartDate($start) . ' - 7 days'));
	}

	public function getNextWeekStart($start) : string
	{
		return date('Y-m-d', strtotime($this->getWeekStartDate($start) . ' + 7 days'));
	}

	/**
	 * Get all the events on a given day
	 * @param $date
	 * @return mixed
	 * @throws Exception
	 */
	public function getDailyEvents($date)
	{
		$startDate = new DateTime($date);
		$formattedDate = $startDate->format('Y-m-d');

		$this->db->from('sessions')->where([
			'start_time >=' => $formattedDate . ' 00:00:00',
			'start_time <=' => $formattedDate . ' 23:59:59'
		])->order_by('start_time asc')
			->join('events', 'events.id = sessions.event_id');
		return $this->db->get()->result_array();
	}
}
