<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Get list of clients
     *
     * @OA\Get(
     *     path="/api/clients",
     *     tags={"Clients"},
     *     operationId="listClients",
     *     summary="Get list of clients",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/listClientResponse"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity (validation failed)",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseErrorValidation"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="General server error",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     )
     * )
     */
    public function index()
    {
        $clients = Client::get();

        return responseApiReturn(200, $clients);
    }

    /**
     * Add a client
     *
     * @OA\POST(
     *     path="/api/clients",
     *     tags={"Clients"},
     *     operationId="AddClient",
     *     summary="Add a client",
     *     @OA\RequestBody(
     *         description="Add a client",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                      property="first_name",
     *                      type="string",
     *                      description="Nom",
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      type="string",
     *                      description="Prénom",
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                      description="Email",
     *                  ),
     *                  @OA\Property(
     *                      property="login",
     *                      type="string",
     *                      description="Login",
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      description="Mot de passe",
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string",
     *                      description="Téléphone",
     *                  ),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/Basic"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity (validation failed)",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseErrorValidation"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="General server error",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     )
     * )
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->all());

        return responseApiReturn(200, [], 'Client créer avec succées');
    }

    /**
     * Get client details
     *
     * @OA\Get(
     *     path="/api/clients/{id}",
     *     tags={"Clients"},
     *     operationId="clientDetail",
     *     summary="Get client details",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Client id",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/detailClientResponse"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity (validation failed)",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseErrorValidation"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="General server error",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     )
     * )
     */
    public function show($id)
    {
        $client = Client::find($id);

        if ($client) {
            return responseApiReturn(200, $client);
        }

        return responseApiReturn(404, [], 'Client non trouvée');
    }

    /**
     * Update a client
     *
     * @OA\PUT(
     *     path="/api/clients/{id}",
     *     tags={"Clients"},
     *     operationId="UpdateClient",
     *     summary="Update a client",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Client id",
     *     ),
     *     @OA\RequestBody(
     *         description="Update a client",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                      property="first_name",
     *                      type="string",
     *                      description="Nom",
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      type="string",
     *                      description="Prénom",
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                      description="Email",
     *                  ),
     *                  @OA\Property(
     *                      property="login",
     *                      type="string",
     *                      description="Login",
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      description="Mot de passe",
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string",
     *                      description="Téléphone",
     *                  ),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/Basic"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity (validation failed)",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseErrorValidation"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="General server error",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     )
     * )
     */
    public function update($id, UpdateClientRequest $request)
    {
        $client = Client::find($id);

        if ($client) {
            $client->update($request->all());

            return responseApiReturn(200, [], 'Mise à jour effectué avec succées');
        }

        return responseApiReturn(404, [], 'Client non trouvée');
    }

    /**
     * Delete a client
     *
     * @OA\DELETE(
     *     path="/api/clients/{id}",
     *     tags={"Clients"},
     *     operationId="deleteUser",
     *     summary="Delete a client",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Client id",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/Basic"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity (validation failed)",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseErrorValidation"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="General server error",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/ApiResponseError"
     *         ),
     *     )
     * )
     */
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
