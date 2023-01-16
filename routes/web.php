<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use GuzzleHttp\Client;

Route::get('/', function () {
    $access_token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjEiLCJleHAiOjE2NzM5ODE1NzEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6MjIxOC8iLCJhdWQiOiJodHRwOi8vbG9jYWxob3N0OjIyMTgvIn0.jisdRhy4Olr0j58WT8gGtt2cctTS3Y1yY4B3CpcHqqo";
    $client = new GuzzleHttp\Client();
    $res = $client->request('get', 'https://gstruckapi.azurewebsites.net/api/usuarios/1', [
        ['headers' => 
        [
            'Authorization' => "Bearer {$access_token}"
        ]
    ]
    ])->getBody()->getContents();
    
});
Route::resource('client', ClientController::class);
Route::resource('pet', PetController::class);
