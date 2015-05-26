<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Publication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class modul3Controller extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $userId = Auth::user()->id;
        //$querry = Publication::find($userId);
        $var = DB::table('publications')->where('usr_id', '=', $userId)->get();
        return view('pages.modul3')->with('var', $var);
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
    public function redirectModul3(){
        return redirect('modul3Compiled');
    }
    public function redirectModul4(){
        return redirect('modul4');
    }
    public function displayPoints()
    {
        $path=public_path(). '\jar\\input.json';

        $this->execJar($path);

        $filePath = public_path() . '\jar\\input_out.json';
        $string = file_get_contents($filePath);
        $json_a = json_decode($string, true);
        //$json_a;

        foreach ($json_a['Publication'] as $pub){
            //var_dump($pub);
             DB::table('publications')
                ->where('title', $pub['title'])
                ->update([
                    'SpScore' => $pub['SpScore'],
                    'IrScore' => $pub['IrScore']
                ]);
        }
        $max = DB::table('publications')->max('querry_id');
        $pubFromDB = DB::table('publications')->where('usr_id','=',Auth::user()->id)->where('querry_id','=',$max)->get();

        //var_dump($json_a);
        DB::table('score_querry')->insert([
            'pub_q_id'=> $max,
            'sumSPScore' => $json_a['sumSPScore'],
            'sumIRScore' => $json_a['sumIRScore'],

            'sumByCategoryIRA' => $json_a['sumByCategoryIR']['A'],
            'sumByCategoryIRB' => $json_a['sumByCategoryIR']['B'],
            'sumByCategoryIRC' => $json_a['sumByCategoryIR']['C'],
            'sumByCategoryIRD' => $json_a['sumByCategoryIR']['D'],

            'sumByCategorySPA' => $json_a['sumIRScore']['A'],
            'sumByCategorySPB' => $json_a['sumIRScore']['B'],
            'sumByCategorySPC' => $json_a['sumIRScore']['C'],
            'sumByCategorySPD' => $json_a['sumIRScore']['D'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //var_dump($pubFromDB);
        $score_db = DB::table('score_querry')->where('pub_q_id','=',$max)->get();
        return view('pages.modul3output')->with('pubFromDB',$pubFromDB )->with('score_db',$score_db);

    }

    public function execJar($path)
    {
        $jar = public_path() . '\jar\IP.jar ';
        $execstring = 'java -jar ' . $jar . ' ' . $path;
        exec($execstring);
    }

}
