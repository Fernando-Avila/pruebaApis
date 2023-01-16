<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(20);
        return response()->json(['res' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json(['res' => '$res']);
        /* $request->validate([
            'name'=>'required',
            'ci'=>'required|max:2|integer',
            'email'=>'required|email',
            'password'=>'required|min:8',
        ]);
        return [
           // 'name' => 'required|integer|exists:cities,id',
            'name' => 'required'
        ];*/
        $res = Client::create($request->all());
        return response()->json(['res' => $res]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $res = Client::find($id)::with('pets');
        $res = Client::find($id);
        return response()->json(['res' => $res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $res = $client->update($request->all());
        return response()->json(['res' => $res]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('pets')->where('client_id', $id)->delete();
        if ($res) {
            $res2 = Client::destroy($id);
        }

        return response()->json(['res' => $res2]);
    }
    public function petsclient($id)
    {
        $res = Client::with('pets')->where('id', $id)->get();
        return response()->json(['res' => $res]);
    }
}
