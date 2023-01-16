<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client as clientguz;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ci' => 'required|integer',
            'age' => 'required|max:99|integer',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $result = Client::create($request->all());
        if ($result) {
            return redirect()->route('client.index')->with('success', 'Student created successfully.');
            //return back()->with('fail', 'Something went wrong, try again later.');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $access_token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjEiLCJleHAiOjE2NzM5ODE1NzEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6MjIxOC8iLCJhdWQiOiJodHRwOi8vbG9jYWxob3N0OjIyMTgvIn0.jisdRhy4Olr0j58WT8gGtt2cctTS3Y1yY4B3CpcHqqo";
        $client = new clientguz(['base_uri' => 'https://gstruckapi.azurewebsites.net/api/usuarios/'.$client->id]);
        $headers = ['Authorization' => 'Bearer ' . $access_token, 'Accept' => 'application/json',];
        $client = $client->request('GET', 'bar', ['headers' => $headers])->getBody()->getContents();
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $client = Client::find($client->id);
        return View('client.create', compact('client'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $result = $client->update($request->all());
        if (true) {
            return redirect()->route('client.index')->with('success', 'client updated successfully.');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $res = DB::table('pets')->where('client_id', $client->id)->delete();
        $result = $client->delete();

        if ($result) {
            return redirect()->route('client.index')->with('success', 'Student deleted successfully.');
            //return back()->with('fail', 'Something went wrong, try again later.');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }
}
