<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\bill;
use App\empresa;
use App\Http\Requests\CreateBillRequest;

use Request;
use Input;
use Session;
use Carbon\Carbon;

class BillController extends Controller {

	private $paginacao = 30; //total de items por pagina
	private $paginationPath = 'bill'; // Customizando a url da paginacao

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
				
		if (Input::get('filter')=='close') 
		{
			// pagamentos confirmados
			$bills = Bill::where('status','=',1)->orderBy('payment_date','desc')->paginate($this->paginacao);

		}else{
			// pagamentos abertos
			$bills = Bill::where('status','=',0)->orderBy('payment_date','asc')->paginate($this->paginacao);
		}

		/* ajustando url da paginacao */
		$bills->setPath($this->paginationPath); 

		return view('bills.index', compact('bills', 'empresas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//incluindo a opcao default
		$default = [''=>'selecione'];
		$empresas = $default + Empresa::orderBy('nome')->lists('nome','id');

		return view('bills.create', compact('empresas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateBillRequest $request)
	{
		Bill::create($request->all());

		Session::flash('success_message','Agendamento criado!');

		return redirect('bill');		
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
		$bill = Bill::findOrFail($id);

		//incluindo a opcao default
		$default = [''=>'selecione'];
		$empresas = $default + Empresa::orderBy('nome')->lists('nome','id');

		return view('bills.edit',compact('bill','empresas'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateBillRequest $request)
	{
		// se status for null aplica o valor 0
		$inputStatus = Request::input('status','0');
		
		$bill = Bill::findOrFail($id);

		// se a bill está sendo paga entao salva paid_date com a data atual
		if($bill->status <> $inputStatus AND $inputStatus==1)
		{
			$bill->paid_date = Carbon::now();
		}

		//se a bill estava paga e mudou para nao paga zera paid_date
		if($bill->status <> $inputStatus AND $inputStatus==0)
		{
			$bill->paid_date = "0000-00-00 00:00:00";
		}

		$bill->status = $inputStatus;

		$bill->update($request->all());
		return redirect('bill');
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
