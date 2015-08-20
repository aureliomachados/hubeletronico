<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReportController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
	}

    //mostra a tela com o botão de ação para o relatório
    public function index(){
        return view('report.report');
    }

    //executa o relatório.
    public function post(Request $request)
    {
            $database = \Config::get("database.connections.mysql");

            $output = public_path() . '/report/' . time() . '_hubeletronico';

            $ext = 'pdf';

        \JasperPHP::process(
            public_path() . '/report/hubeletronico.jasper',
            $output,
            array($ext),
            array('id' => $request->get('id')),
            $database,
            false,
            false
        )->execute();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.time().'_hubeletronico.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext); // deletes the temporary file

        return Redirect::to('/reporting');
    }

}
