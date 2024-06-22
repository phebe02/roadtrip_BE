<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Roadtrip Game API",
 *     description="API-documentatie voor de Roadtrip Game App",
 *     @OA\Contact(
 *         email="support@roadtripgame.com"
 *     )
 * ),
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="API Server"
 * )
 */
class ApiDocumentationController extends Controller
{
    // Dit bestand bevat alleen de algemene API-documentatie.
}

