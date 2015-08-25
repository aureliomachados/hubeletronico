<?php namespace App\Http\Controllers;

use App\Estado;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\PacienteRequest;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class PacienteController extends Controller {


    public function __construct(){
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $pacientes = Paciente::paginate(5);

        if($request->ajax()){
            return $pacientes;
        }
        else{
            return view('pacientes.index')->with('pacientes', $pacientes)->with('paginado', true);
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $estados = $this->estadosList();

		return view('pacientes.create')->with('estados', $estados);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PacienteRequest $request)
	{
        Paciente::create($request->all());

        Flash::success("Novo paciente adicionado!");

        return redirect()->route('pacientes.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $paciente = null;
        if(!is_null($id)){
            $paciente = Paciente::find($id);

            if($paciente){
                return view('pacientes.show')->with('paciente', $paciente);
            }
            else{
                abort(404);
            }
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $paciente = null;

        $estados = $this->estadosList();

		if(!is_null($id)){
            $paciente = Paciente::find($id);
            if($paciente){
                return view('pacientes.edit')->with('paciente', $paciente)->with('estados', $estados);
            }
            else{
                return abort(404);
            }
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{

        if(!is_null($id)){

            $paciente = Paciente::find($id);

            if($paciente){

                $data = $request->all();

                //formatando a data.
                $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $data['data_nascimento']);
                $paciente->update($data, $id);

                Flash::warning("Informações do paciente atualizadas!");

                return redirect()->route('pacientes.index');
            }
            else{
                Flash::warning("O paciente pode ter sido removido antes de você realizar esta ação.");

                return redirect()->route('pacientes.index');
            }
        }
        else{
            return abort(404);
        }

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	    if(!is_null($id)){
            $paciente = Paciente::find($id);

            if($paciente){

                $paciente->destroy($id);

                Flash::success("Paciente removido!");

                return redirect()->route('pacientes.index');
            }
            else{
                Flash::warning("Parece que o paciente já havia sido removido!");
                return redirect()->route('pacientes.index');
            }
        }
	}


    public function busca(Request $request){
        $prontuario = null;
        if($request->has('prontuario')){
            $prontuario = $request->get('prontuario');
        }

        $paciente = Paciente::where('prontuario', '=', $prontuario)->get();

        return view('pacientes.index')->with('pacientes', $paciente)->with('paginado', false);
    }

    public function buscaAjax(Request $request){

        $prontuario = null;

        if($request->has('prontuario')){
            $prontuario = $request->get('prontuario');
        }

        $paciente = Paciente::where('prontuario', '=', $prontuario)->get();

        return $paciente;

    }


    //retorna os estados preparand para formulario select.
    protected function estadosList(){
        $estadosList = DB::table('estados')->select(['id', 'sigla'])->orderBy('sigla', 'asc')->get();

        $estados = array();

        foreach($estadosList as $e){
            $estados[$e->id] = $e->sigla;
        }
        return $estados;
    }

}
