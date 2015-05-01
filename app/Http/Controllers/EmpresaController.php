<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateEmpresaRequest;
use App\Empresa;
use Session;
use Input;

class EmpresaController extends Controller {

	private $paginacao = 30; //total de items por pagina
	private $paginationPath = 'empresa'; // Customizando a url da paginacao

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$empresas = Empresa::orderBy('nome')->paginate($this->paginacao);

		
		/* ajustando url da paginacao */
		$empresas->setPath($this->paginationPath); 

		return view('empresa.index',compact('empresas'));
			//->with('message', 'Nova empresa criada!');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('empresa.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param CreateEmpresaRequest $request
	 * @return Response
	 */
	public function store(CreateEmpresaRequest $request)
	{
		Empresa::create($request->all());	

		Session::flash('success_message','Nova empresa criada com sucesso!');

		return redirect('empresa');			
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
		$empresa = Empresa::findOrFail($id);
		return view('empresa.edit',compact('empresa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateEmpresaRequest $request)
	{
		$empresa = Empresa::findOrFail($id);

		$empresa->update($request->all());

		Session::flash('success_message','Empresa atualizada com sucesso!');

		return redirect('empresa');
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

	public function postSearch()
	{
		$q = Input::get('query');

		// se a busca for vazia traz todas empresas
		if(empty($q))
		{
			return redirect('empresa');
		}else{
			/* $q.'*' // concatena a string com * para buscar o termo igual o uso do % */
			$empresas = Empresa::whereRaw("MATCH(nome,email) AGAINST(? IN BOOLEAN MODE)", array($q.'*'))->paginate($this->paginacao);	
		}

		
		/* ajustando url da paginacao */
		$empresas->setPath($this->paginationPath); 

		return view('empresa.index', compact('empresas'));
	}

}
