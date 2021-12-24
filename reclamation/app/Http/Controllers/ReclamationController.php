<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReclamationRequest;
use App\Models\Reclamation;

class ReclamationController extends Controller
{
    /**
     * Get list of reclamations
     *
     * @OA\Get(
     *     path="/api/reclamations",
     *     tags={"Reclamations"},
     *     operationId="listReclamations",
     *     summary="Get list of reclamations",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/listReclamationResponse"
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
        $reclamations = Reclamation::get();

        return responseApiReturn(200, $reclamations);
    }

    /**
     * Add a reclamation
     *
     * @OA\POST(
     *     path="/api/reclamations",
     *     tags={"Reclamations"},
     *     operationId="AddReclamation",
     *     summary="Add a reclamation",
     *     @OA\RequestBody(
     *         description="Add a reclamation",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="subject",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="message",
     *                      type="string",
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
    public function store(ReclamationRequest $request)
    {
        Reclamation::create($request->all());

        return responseApiReturn(200, [], 'Reclamation créer avec succées');
    }

    /**
     * Get reclamation details
     *
     * @OA\Get(
     *     path="/api/reclamations/{id}",
     *     tags={"Reclamations"},
     *     operationId="reclamationDetail",
     *     summary="Get reclamation details",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Reclamation id",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *              type="object",
     *              ref="#/components/schemas/detailReclamationResponse"
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
        $reclamation = Reclamation::find($id);

        if ($reclamation) {
            return responseApiReturn(200, $reclamation);
        }

        return responseApiReturn(404, [], 'Reclamation non trouvée');
    }

    /**
     * Update a reclamation
     *
     * @OA\PUT(
     *     path="/api/reclamations/{id}",
     *     tags={"Reclamations"},
     *     operationId="UpdateReclamation",
     *     summary="Update a reclamation",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Reclamation id",
     *     ),
     *     @OA\RequestBody(
     *         description="Update a reclamation",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="subject",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="message",
     *                      type="string",
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
    public function update($id, ReclamationRequest $request)
    {
        $reclamation = Reclamation::find($id);

        if ($reclamation) {
            $reclamation->update($request->all());

            return responseApiReturn(200, [], 'Mise à jour effectué avec succées');
        }

        return responseApiReturn(404, [], 'Reclamation non trouvée');
    }

    /**
     * Delete a reclamation
     *
     * @OA\DELETE(
     *     path="/api/reclamations/{id}",
     *     tags={"Reclamations"},
     *     operationId="deleteUser",
     *     summary="Delete a reclamation",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Reclamation id",
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
        $reclamation = Reclamation::find($id);

        if ($reclamation) {
            $reclamation->delete();

            return responseApiReturn(200, [], 'Reclamation supprimer avec succées');
        }

        return responseApiReturn(404, [], 'Reclamation non trouvée');
    }
}
