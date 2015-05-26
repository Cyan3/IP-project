<?php namespace App\Http\Controllers;

use App\Author;
use App\Citation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Publication;
use App\PubAuthor;
use Illuminate\Http\Request;
use Auth;
use DB;

class modul2Controller extends Controller
{

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show()
    {
        $userId = Auth::user()->id;
        //$querry = Publication::find($userId);
        $var = DB::table('publications')->where('usr_id', '=', $userId)->get();
        return view('pages.modul2')->with('var', $var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function pubsFromDBtoJson()
    {
        $dbPubs = \Illuminate\Support\Facades\DB::table('publications')->where('usr_id', '=', Auth::user()->id)->get();
        $json = array();
        foreach ($dbPubs as $pub) {
            $authors = \Illuminate\Support\Facades\DB::table('pubauthors')->where('pub_id', '=', $pub->id)->get();
            $jsnoAuthors = array();
            foreach ($authors as $author) {
                array_push($jsnoAuthors, $author->name);
            }
            $jsonPub = array(
                'year' => $pub->year,
                'title' => $pub->title,
                'isbn' => $pub->isbn,
                'issn' => $pub->issn,
                'authors' => $jsnoAuthors,
                'location' => $pub->location
            );
            array_push($json, $jsonPub);
        }

        $fp = fopen(public_path() . '\jar\m2\inputModul2.json', 'w');
        fwrite($fp, json_encode(array('publications' => $json)));
        fclose($fp);
        return public_path() . '\jar\m2\inputModul2.json';
    }

    public function execJar($path)
    {
        $jar = public_path() . '\jar\m2\VIVO.jar ';
        $execstring = 'java -jar ' . $jar . ' ' . $path . ' outputModul2.json';
        exec($execstring);
        return public_path() . '\jar\m3\outputModul2.json ';
    }

    public function showOutput()
    {
        $path = $this->pubsFromDBtoJson();
        $outputPath = $this->execJar($path);


        $filePath = $outputPath;
        $string = file_get_contents($filePath);
        $json_a = json_decode($string, true);
        foreach ($json_a as $cit) {
            //var_dump($cit);
            DB::table('publications')
                ->where('title', $cit['name'])
                ->update([
                    'i_CitiSeer' => $cit['isIndexedCitiSeer'],
                    'i_DBLP' => $cit['isIndexedDBLP'],
                    'i_Scholar' => $cit['isIndexedScholar'],
                    'i_Scopus' => $cit['isIndexedScopus']

                ]);
            $cit_id = DB::table('publications')->where('title', $cit['name'])->get();

            $this->addCitation($cit_id, $cit['citedByCitiSeer'], 'CitiSeer');
            $this->addCitation($cit_id, $cit['citedByDBLP'], 'DBLP');
            $this->addCitation($cit_id, $cit['citedByScholar'], 'Scholar');
            $this->addCitation($cit_id, $cit['citedByScopus'], 'Scopus');
        }
        //var_dump($json_a);

        return view('pages.modul2output')->with('json_a', $json_a);
    }

    public function addCitation($pub_id, $cits, $fromdb)
    {
        foreach ($cits as $cit) {
            $dbCit = Citation::create(array(
                'pub_id' => $pub_id,
                'name' => $cit['name'],
                'location' => $cit['place'],
                'fromdb' => $fromdb
            ));
            foreach ($cit['authors'] as $author) {
                Author::create(array(
                    'cit_id' => $dbCit->id,
                    'name' => $author
                ));
            }

        }
    }

    public function getPubFromBD(){
        $max = DB::table('publications')->max('querry_id');
        $pubFromDB = DB::table('publications')->where('usr_id','=',Auth::user()->id)->where('querry_id','=',$max)->get();
        return $pubFromDB;
    }

    public function getCitFromBD($pub,$typeDB){
        if  ($typeDB == 'CitiSeer'){
            $cit = DB::table('citations')->where('pub_id','=',$pub->id)->where('fromdb' ,'=',strtolower($typeDB))->get();
            return $cit;
        } elseif  ($typeDB == 'DBLP'){
            $cit = DB::table('citations')->where('pub_id','=',$pub->id)->where('fromdb' ,'=',strtolower($typeDB))->get();
            return $cit;
        } elseif  ($typeDB == 'Scholar'){
            $cit = DB::table('citations')->where('pub_id','=',$pub->id)->where('fromdb' ,'=',strtolower($typeDB))->get();
            return $cit;
        } elseif  ($typeDB == 'Scopus'){
            $cit = DB::table('citations')->where('pub_id','=',$pub->id)->where('fromdb' ,'=',strtolower($typeDB))->get();
            return $cit;
        }
    }

    public function getNrCit($pub,$typeDB){
        if  ($typeDB == 'CitiSeer'){
            $cit = DB::table('citations')->where('pub_id','=',$pub->id)->where('fromdb' ,'=',strtolower($typeDB))->get();
            return count($cit);
        } elseif  ($typeDB == 'DBLP'){
            $cit = DB::table('citations')->where('pub_id','=',$pub->id)->where('fromdb','=',strtolower($typeDB))->get();
            return count($cit);
        } elseif  ($typeDB == 'Scholar'){
            $cit = DB::table('citations')->where('pub_id','=',$pub->id)->where('fromdb','=',strtolower($typeDB))->get();
            return count($cit);
        } elseif  ($typeDB == 'Scopus'){
            $cit = DB::table('citations')->where('pub_id','=',$pub->id)->where('fromdb','=',strtolower($typeDB))->get();
            return count($cit);
        }
    }

    public function isInDB($bol){
        if($bol == true){
            return 'Yes';
        }
        return 'No';
    }

    public function getAuthors($pub_id){
        $authors = DB::table('pubauthors')->where('pub_id','=',$pub_id)->get();
        return $authors;
    }

    public function getCitAuthors($cit_id){
        $authors = DB::table('authors')->where('cit_id','=',$cit_id)->get();
    }


}


