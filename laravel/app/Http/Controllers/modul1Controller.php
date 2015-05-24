<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Url;
use Auth;

use App\Publication;
use App\PubAuthor;
class modul1Controller extends Controller {

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
	public function store(Request $request)
	{
        $input = $request->All();
        if($input['file_url'] == 'url'){
            Url::create(array(
               'usr_id' => Auth::user()->id,
                'url' => $input['url'],
                'type_url' => 'url'
            ));
            $this->toModul2($input['url']);
        }else{
            $file = $request->file('file');
            $fileName =Auth::user()->fname .'_'. Auth::user()->lname .'_' . Carbon::parse(Carbon::now())->format('d_m_Y_H_i_s') . '_' . $file->getClientOriginalName();
            $file->move(public_path().'/uploads', $fileName );
            $path = public_path().'\uploads\\'. $fileName;
            Url::create(array(
                'usr_id' => Auth::user()->id,
                'url' => $path,
                'type_url' => 'file'
            ));

            $this->toModul2($path);
        }

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        return view('pages.modul1');
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

    public function toModul2($input){
        $jar = public_path() . '\jar\Modul1.jar ';
        $execstring = 'java -jar ' . $jar . $input;
        exec($execstring , $output,$ret);

        var_dump($execstring);

        $file = public_path() . '\export.json';
        $this->readJson($file);
    }

    public function readJson($filePath){
        $string = file_get_contents($filePath);
        $json_a = json_decode($string, true);
        foreach ($json_a as $pubs){
            foreach($pubs as $pub){
                $public = Publication::create(array(
                    'usr_id' => Auth::user()->id,
                    'title' => $pub['title'] ,
                    'year' => $pub['year'],
                    'location' => $pub['location'],
                    'isbn' => $pub['isbn'],
                    'issn' => $pub['issn']
                ));
                foreach ($pub['autori'] as $author){
                    PubAuthor::create(array(
                        'pub_id' => $public->id,
                        'name' => $author
                    ));
                }
            }
        }
    }



}
