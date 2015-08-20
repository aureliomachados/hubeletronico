<?php namespace App\Http\Controllers;

use App\Estado;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\TCLEService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class TCLEController extends Controller {

    private $service;

    public function __construct(TCLEService $service){
        $this->service = $service;
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $user_id = Auth::user()->id;

        $tcles = $this->service->findAllByUserId($user_id);

        return view('tcles.index')->with('tcles', $tcles)->with('paginado', true);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        //$estados = Estado::all(['id', 'nome', 'sigla'])->orderBy('sigla', 'asc')->get();

        $estados = DB::table('estados')->select(['id', 'sigla'])->orderBy('sigla', 'asc')->get();

		return view('tcles.create')->with('estados', $estados);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\TCLERequest $request)
	{
		$this->service->save($request->all());

        Flash::success("Novo registro inserido!");

        return redirect()->route('tcles.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tcle = $this->service->findById($id);


        return view('tcles.show')->with('tcle', $tcle);

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
        $tcle = $this->service->findById($id);

        //
        $estadosList = DB::table('estados')->select(['id', 'sigla'])->orderBy('sigla', 'asc')->get();

        $estados = array();

        foreach($estadosList as $e){
            $estados[$e->id] = $e->sigla;
        }


        return view('tcles.edit')->with('tcle', $tcle)->with('estados', $estados);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\TCLERequest $request, $id)
	{
		$tcle = $this->service->findById($id);

        $data = $request->all();

        //formatando a data.
        $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $data['data_nascimento']);

        $tcle->update($data, $id);

        Flash::warning("Registro atualizado!");

        return redirect()->route('tcles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->service->delete($id);

        Flash::error("Registro excluido!");

        return redirect()->route('tcles.index');
	}


    public function busca(Request $request){
        $paciente = null;
        if($request->has('paciente')){
            $paciente = $request->get('paciente');
        }

        $tcles = $this->service->findByNome($paciente);

        return view('tcles.index')->with('tcles', $tcles)->with('paginado', false);
    }

}
