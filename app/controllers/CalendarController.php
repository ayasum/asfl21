<?php

use Carbon\Carbon;

class CalendarController extends \BaseController {

	// 1 jour = 86400 secondes

	private $events = [
		0 => [
			'date'  => 0,
			'title' => 'Conception',
			'desc'  => '',
			'icon'  => 'fa fa-venus-mars',
			'class' => 'calendar-conception',
			'week'	=> false
		],
		1 => [
			'date'  => 6,
			'title' => 'Consultation précoce du début de grossesse',
			'desc'  => '',
			'icon'  => 'fa fa-stethoscope',
			'class' => 'calendar-consultation',
			'week'	=> true
		],
		2 => [
			'date'  => 10,
			'title' => '1ère échographie',
			'desc'  => 'Datation de la grossesse',
			'icon'  => 'fa fa-user-md',
			'class' => 'calendar-medical',
			'week'	=> true
		],
		3 => [
			'date'  => 10,
			'title' => 'Éventuel dépistage de la trisomie 21',
			'desc'  => '',
			'icon'  => 'fa fa-user-md',
			'class' => 'calendar-medical',
			'week'	=> true
		],
		4 => [
			'date'  => 11,
			'title' => 'Consultation du 3ème mois',
			'desc'  => '',
			'icon'  => 'fa fa-stethoscope',
			'class' => 'calendar-consultation',
			'week'	=> true
		],
		5 => [
			'date'  => 11,
			'title' => 'Déclaration de grossesse',
			'desc'  => '',
			'icon'  => 'fa fa-calendar',
			'class' => 'calendar-administratif',
			'week'	=> true
		],
		6 => [
			'date'  => 14,
			'title' => 'Éventuel dépistage (tardif) de la trisomie 21',
			'desc'  => '',
			'icon'  => 'fa fa-user-md',
			'class' => 'calendar-medical',
			'week'	=> true
		],
		7 => [
			'date'  => 15,
			'title' => 'Entretien pré-natal avec la sage femme pour la préparation à la naissance',
			'desc'  => '',
			'icon'  => 'fa fa-stethoscope',
			'class' => 'calendar-consultation',
			'week'	=> true
		],
		8 => [
			'date'  => 16,
			'title' => 'Reconnaissance anticipée du père',
			'desc'  => '',
			'icon'  => 'fa fa-calendar',
			'class' => 'calendar-administratif',
			'week'	=> true
		],
		9 => [
			'date'  => 16,
			'title' => 'Consultation du 4ème mois',
			'desc'  => '',
			'icon'  => 'fa fa-stethoscope',
			'class' => 'calendar-consultation',
			'week'	=> true
		],
		10 => [
			'date'  => 18,
			'title' => 'Début de prise en charge 100% médical',
			'desc'  => '',
			'icon'  => 'fa fa-calendar',
			'class' => 'calendar-administratif',
			'week'	=> true
		],
		11 => [
			'date'  => 20,
			'title' => 'Consultation 5ème mois',
			'desc'  => '',
			'icon'  => 'fa fa-stethoscope',
			'class' => 'calendar-consultation',
			'week'	=> true
		],
		12 => [
			'date'  => 20,
			'title' => '2ème échographie, échographie morphologique',
			'desc'  => '',
			'icon'  => 'fa fa-user-md',
			'class' => 'calendar-medical',
			'week'	=> true
		],
		13 => [
			'date'  => 23,
			'title' => 'Biologie du 6ème mois',
			'desc'  => '',
			'icon'  => 'fa fa-user-md',
			'class' => 'calendar-medical',
			'week'	=> true
		],
		14 => [
			'date'  => 24,
			'title' => 'Consultation 6ème mois',
			'desc'  => '',
			'icon'  => 'fa fa-stethoscope',
			'class' => 'calendar-consultation',
			'week'	=> true
		],
		15 => [
			'date'  => 29,
			'title' => 'Consultation 7ème mois (Hopital)',
			'desc'  => '',
			'icon'  => 'fa fa-h-square',
			'class' => 'calendar-hopital',
			'week'	=> true
		],
		16 => [
			'date'  => 30,
			'title' => '3ème échographie',
			'desc'  => '',
			'icon'  => 'fa fa-stethoscope',
			'class' => 'calendar-consultation',
			'week'	=> true
		],
		17 => [
			'date'  => 32,
			'title' => 'Consultation 8ème mois',
			'desc'  => '',
			'icon'  => 'fa fa-h-square',
			'class' => 'calendar-hopital',
			'week'	=> true
		],
		18 => [
			'date'  => 32,
			'title' => 'Début éventuel de congés pathologique',
			'desc'  => '',
			'icon'  => 'fa fa-calendar',
			'class' => 'calendar-administratif',
			'week'	=> true
		],
		19 => [
			'date'  => 33,
			'title' => 'Consultation anesthésiste (dans la maternité choisie)',
			'desc'  => '',
			'icon'  => 'fa fa-h-square',
			'class' => 'calendar-hopital',
			'week'	=> true
		],
		20 => [
			'date'  => 33,
			'title' => 'Début de congés maternité officiel',
			'desc'  => '',
			'icon'  => 'fa fa-calendar',
			'class' => 'calendar-administratif',
			'week'	=> true
		],
		21 => [
			'date'  => 33,
			'title' => 'Réalisation de prélèvement vaginal',
			'desc'  => '',
			'icon'  => 'fa fa-user-md',
			'class' => 'calendar-medical',
			'week'	=> true
		],
		22 => [
			'date'  => 36,
			'title' => 'Consultation 9ème mois',
			'desc'  => '',
			'icon'  => 'fa fa-h-square',
			'class' => 'calendar-hopital',
			'week'	=> true
		],
		23 => [
			'date'  => 39,
			'title' => 'Date présumée de l\'accouchement',
			'desc'  => '',
			'icon'  => 'fa fa-h-square',
			'class' => 'calendar-hopital',
			'week'	=> true
		],
	];


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('calendar.index', ['events' => null]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	/*public function store()
	{
		$date = '';
		if(Input::get('date1')){
			$date = strtotime(Input::get('date1'));
		}elseif(Input::get('date2')){
			$date = strtotime(Input::get('date2')) + (15 * 86400);
		}

		foreach ($this->events as $key => $event) {
			$this->events[$key]['date'] += $date;
			$this->events[$key]['date'] = date('d-m-Y', $this->events[$key]['date']);
		}

		return View::make('calendar.index',[
			'events' => $this->events
			]);

	}*/


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$date = '';
		$d = '';
		setlocale (LC_TIME, 'fr_FR.utf8','fra');
		if(Input::get('date1')){
			$date = Carbon::createFromTimestamp(strtotime(Input::get('date1')))->addDays(14);
		}elseif(Input::get('date2')){
			$date = Carbon::createFromTimestamp(strtotime(Input::get('date2')));
		}

		foreach ($this->events as $key => $event) {
			$d = clone($date);
			if($event['week']){
				$this->events[$key]['date'] = "du " . $d->addWeeks($this->events[$key]['date'])->format('d/m/Y') . " au " . $d->addWeeks(1)->format('d/m/Y');
			} else {
				$this->events[$key]['date'] = $d->addWeeks($this->events[$key]['date'])->format('d / m / Y');
			}			
		}

		return View::make('calendar.index',[
			'events' => $this->events
			]);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}