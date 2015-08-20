<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\PDF;
use Laracasts\Flash\Flash;

class MedicoController extends Controller {


    private $service;

    public function __construct(UserService $service){
        $this->service = $service;
        $this->middleware('auth');
        $this->middleware("administrativa");
    }

    public function index(){
        $medicos = $this->service->findAll();

        return view('medicos.index')->with('medicos', $medicos);
    }

    public function create(){
        return view('medicos.create');
    }

    public function save(UserRequest $request){
        $this->service->save($request->all());

        Flash::success("Novo usuário adicionado!");

        return redirect()->route('medicos.index');
    }

    public function edit($id){
         $user = $this->service->findById($id);

         return view('medicos.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
        $this->service->update($request->all(), $id);

        Flash::warning("Usuário atualizado!");

        return redirect()->route('medicos.index');
    }

    public function destroy($id){

        $this->service->delete($id);

        Flash::error("Usuário removido!");

        return redirect()->route('medicos.index');
    }



    //teste para relatórios pdf
    public function pdf(){
        $medicos = $this->service->findAll();
        $pdf = App::make('dompdf.wrapper');

        $pdf->loadView('medicos.create', $medicos);

        return $pdf->stream();
    }

    public function busca(Request $request){
        $crm = null;
        if($request->has('crm')){
            $crm = $request->get('crm');
        }
        $user = $this->service->findByCRM($crm);

        return view('medicos.index')->with('medicos', $user);
    }

}
