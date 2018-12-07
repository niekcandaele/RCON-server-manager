<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServerRequest;
use App\Http\Requests\UpdateServerRequest;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    /**
     * Display a listing of the server.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::all();

        return $servers;
    }

    /**
     * Show the form for creating a new server.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('server.addServer');
    }

    /**
     * Store a newly created server in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServerRequest $request)
    {

        return Server::create([
            'owner' => Auth::user()->id,
            'name' => $request->get('name'),
            'ip' => $request->get('ip'),
            'rcon_port' => $request->get('port'),
            'rcon_password' => $request->get('rcon_password'),
        ]);
    }

    /**
     * Display the specified server.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show($serverId)
    {
        return Server::find($serverId);
    }

    /**
     * Show the form for editing the specified server.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        //
    }

    /**
     * Update the specified server in storage.
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
     * Remove the specified server from storage.
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
