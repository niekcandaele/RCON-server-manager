<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServerRequest;
use App\Http\Requests\UpdateServerRequest;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::all();

        return $servers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServerRequest $request)
    {
        $server = Server::create($request->all());
        return $server;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        return $server;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServerRequest $request, Server $server)
    {
        $fields = ["name", 'ip', 'owner', 'rcon_port', 'rcon_password'];

        foreach($fields as $field){
            if($request->has($field)){
                $server->$field = $request->$field;
            }
        }
       
        $server->save();
       
        return $server;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        $server->delete();
        return true;
    }
}
