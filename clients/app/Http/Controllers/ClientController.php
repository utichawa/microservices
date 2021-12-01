<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::get();

        return responseApiReturn(200, $clients);
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->all());

        return responseApiReturn(200, [], 'Client créer avec succées');
    }

    public function show($id)
    {
        $client = Client::find($id);

        if ($client) {
            return responseApiReturn(200, $client);
        }

        return responseApiReturn(404, [], 'Client non trouvée');
    }

    public function update($id, UpdateClientRequest $request)
    {
        $client = Client::find($id);

        if ($client) {
            $client->update($request->all());

            return responseApiReturn(200, [], 'Mise à jour effectué avec succées');
        }

        return responseApiReturn(404, [], 'Client non trouvée');
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        if ($client) {
            $client->delete();

            return responseApiReturn(200, [], 'Client supprimer avec succées');
        }

        return responseApiReturn(404, [], 'Client non trouvée');
    }
}
