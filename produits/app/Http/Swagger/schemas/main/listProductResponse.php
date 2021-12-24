<?php

/**
 * @OA\Schema(
 *   schema="listProductResponse",
 *   required={"base_url", "status", "message", "data"},
 *   type="object",
 *   @OA\Property(
 *         property="base_url",
 *         type="string",
 *         format="url"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="boolean",
 *     ),
 *     @OA\Property(
 *          property="status_code",
 *          type="integer",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string"
 *     ),
 *     @OA\Property(
 *          property="data",
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/ProductModel")
 *     )
 * )
 */
