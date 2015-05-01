<?php namespace App\Providers;

use App\bill;
use Auth;
use DB;
use Request;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		// Log all updated event on bill model	
		Bill::updated(function($bill)
		{
			$operation = "update";
			$query = e(str_replace('"', '', $bill->toJson()));
			DB::insert('
				insert into query_events (query,operation,created_at,user_id,ip) 
				values ("'.$query.'","'.$operation.'","'.date("Y-d-m h:i:s").'",'.Auth::user()->id.',"'.Request::getClientIp().'")
				');
		});

		// Log all created event on bill model
		Bill::created(function($bill)
		{
			$operation = "create";
			$query = e(str_replace('"', '', $bill->toJson()));
			DB::insert('
				insert into query_events (query,operation,created_at,user_id,ip) 
				values ("'.$query.'","'.$operation.'","'.date("Y-d-m h:i:s").'",'.Auth::user()->id.',"'.Request::getClientIp().'")
				');
		});
	}



}
