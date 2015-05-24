<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return redirect('modul2');

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

        //var_dump($execstring);

        $file = public_path() . '\export.json';
        $this->readJson($file);
    }

    public function readJson($filePath){
        $string = file_get_contents($filePath);
        $json_a = json_decode($string, true);
        $queryId = $this->genQuerryId();
        foreach ($json_a as $pubs){
            foreach($pubs as $pub){
                //var_dump($pub);
                $publication = $pub;
                $author_pub = Auth::user()->id;
                $unique = $this->checkIfExist($publication, $author_pub);
                //var_dump($unique);
                if($unique == 2){
                    $public = Publication::create(array(
                        'usr_id' => $author_pub,
                        'title' => $pub['title'] ,
                        'year' => $pub['year'],
                        'location' => $pub['location'],
                        'isbn' => $pub['isbn'],
                        'issn' => $pub['issn'],
                        'querry_id' => $queryId
                    ));
                    foreach ($pub['autori'] as $author){
                        PubAuthor::create(array(
                            'pub_id' => $public->id,
                            'name' => $author
                        ));
                    }
               }else if($unique == 1){
                    $query = 'title = \''.$publication['title'].'\' and usr_id = \''.$author_pub.'\' and year = \''.$publication['year'].'\'';
                    $outdatedPub = Publication::whereRaw($query)->firstOrFail();
                    $outdatedPubID = $outdatedPub->id;
                    $outdatedPub->delete();
                    $public = Publication::create(array(
                        'usr_id' => $author_pub,
                        'title' => $pub['title'] ,
                        'year' => $pub['year'],
                        'location' => $pub['location'],
                        'isbn' => $pub['isbn'],
                        'issn' => $pub['issn'],
                        'querry_id' => $queryId
                    ));
                    foreach ($pub['autori'] as $author){
                        $uniqueAuthor = $this->checkIfAuthExist($author, $public->id);
                        if($uniqueAuthor == 0){
                            $query = 'pub_id = \''.$outdatedPubID.'\'  and name = \''.$author.'\'';
                            //var_dump($query);
                            $outdatedAuth = PubAuthor::whereRaw($query)->firstOrFail();
                            $outdatedAuth->delete();
                            PubAuthor::create(array(
                                'pub_id' => $public->id,
                                'name' => $author
                            ));
                        }

                    }
                }else if($unique == 0){
                    $public = Publication::create(array(
                        'usr_id' => $author_pub,
                        'title' => $pub['title'] ,
                        'year' => $pub['year'],
                        'location' => $pub['location'],
                        'isbn' => $pub['isbn'],
                        'issn' => $pub['issn'],
                        'querry_id' => $this->$queryId
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
    public function checkIfExist($pub, $author){
        $publications = DB::table('publications')->where('usr_id', $author)->get();
        //var_dump($publications);
        if(count($publications)==0){
            return 2;
        }
        foreach($publications as $public){
            //var_dump($public['title']);
            //var_dump($pub['title']);
            if (($public->title == $pub['title']) && ($public->year == $pub['year'])){
                return 1;
            }
        }
        return 0;
    }
    public function checkIfAuthExist($author, $pubId){
        $authors = DB::table('pubauthors')->where('pub_id', $pubId)->get();
        if(count($authors)==0){
            return 0;
        }
        foreach($authors as $auth){
            if (($auth->name == $author)){
                return 1;
            }
        }
        return 0;
    }
    public function genQuerryId(){
        $max = 0;
        $publications = DB::table('publications')->get();
        if(count($publications)==0){
            $max = 1;
        }else{
            $max = DB::table('publications')->max('querry_id') + 1;
        }
        return $max;
    }


}
