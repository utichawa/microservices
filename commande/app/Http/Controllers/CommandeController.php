<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Models\Commande;

class CommandeController extends Controller
{
    /**
     * Get list of commandes
     *
     * @OA\Get(
     *     path="/api/commandes",
     *     tags={"Commandes"},
     *     operationId="listCommandes",
     *     summary="Get list of commandes",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/listCommandeResponse"
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
        $commandes = Commande::get();

        return responseApiReturn(200, $commandes);
    }

    /**
     * Add a commande
     *
     * @OA\POST(
     *     path="/api/commandes",
     *     tags={"Commandes"},
     *     operationId="AddCommande",
     *     summary="Add a commande",
     *     @OA\RequestBody(
     *         description="Add a commande",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Nom",
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="Description",
     *                  ),
     *                  @OA\Property(
     *                      property="product_id",
     *                      type="integer",
     *                  ),
     *                  @OA\Property(
     *                      property="quantity",
     *                      type="string",
     *                  )
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
    public function store(CommandeRequest $request)
    {
        Commande::create($request->all());

        return responseApiReturn(200, [], 'Commande cr??er avec succ??es');
    }

    /**
     * Get commande details
     *
     * @OA\Get(
     *     path="/api/commandes/{id}",
     *     tags={"Commandes"},
     *     operationId="commandeDetail",
     *     summary="Get commande details",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Commande id",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/detailCommandeResponse"
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
        $commande = Commande::find($id);

        if ($commande) {
            return responseApiReturn(200, $commande);
        }

        return responseApiReturn(404, [], 'Commande non trouv??e');
    }

    /**
     * Update a commande
     *
     * @OA\PUT(
     *     path="/api/commandes/{id}",
     *     tags={"Commandes"},
     *     operationId="UpdateCommande",
     *     summary="Update a commande",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Commande id",
     *     ),
     *     @OA\RequestBody(
     *         description="Update a commande",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Nom",
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="Description",
     *                  ),
     *                  @OA\Property(
     *                      property="product_id",
     *                      type="integer",
     *                  ),
     *                  @OA\Property(
     *                      property="quantity",
     *                      type="integer",
     *                  )
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
    public function update($id, CommandeRequest $request)
    {
        $commande = Commande::find($id);

        if ($commande) {
            $commande->update($request->all());

            return responseApiReturn(200, [], 'Mise ?? jour effectu?? avec succ??es');
        }

        return responseApiReturn(404, [], 'Commande non trouv??e');
    }

    /**
     * Delete a commande
     *
     * @OA\DELETE(
     *     path="/api/commandes/{id}",
     *     tags={"Commandes"},
     *     operationId="deleteUser",
     *     summary="Delete a commande",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Commande id",
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
        $commande = Commande::find($id);

        if ($commande) {
            $commande->delete();

            return responseApiReturn(200, [], 'Commande supprimer avec succ??es');
        }

        return responseApiReturn(404, [], 'Commande non trouv??e');
    }
}
