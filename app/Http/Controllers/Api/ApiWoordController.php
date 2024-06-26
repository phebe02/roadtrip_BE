<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Woord;
use Illuminate\Http\Request;
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

/**
 * @OA\Schema(
 *     schema="Woord",
 *     type="object",
 *     title="Woord",
 *     required={"id", "woord"},
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="woord", type="string", example="auto"),
 *         @OA\Property(property="themas", type="array", @OA\Items(ref="#/components/schemas/Thema"))
 *     }
 * )
 */
class ApiWoordController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/woorden",
     *     summary="Haal alle woorden op",
     *     @OA\Response(
     *         response=200,
     *         description="Een lijst van woorden",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Woord"))
     *     )
     * )
     */
    public function index()
    {
        $woorden = Woord::all(['id', 'woord']);
        return response()->json($woorden);
    }

    /**
     * @OA\Get(
     *     path="/api/woorden/{id}",
     *     summary="Haal een specifiek woord op",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Een specifiek woord",
     *         @OA\JsonContent(ref="#/components/schemas/Woord")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Woord niet gevonden"
     *     )
     * )
     */
    public function show($id)
    {
        $woord = Woord::with('themas')->findOrFail($id);
        return response()->json($woord);
    }

    /**
     * @OA\Get(
     *     path="/api/woorden/thema/{themaId}",
     *     summary="Haal woorden op per thema",
     *     @OA\Parameter(
     *         name="themaId",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Een lijst van woorden per thema",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Woord"))
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Thema niet gevonden"
     *     )
     * )
     */
    public function getWordsByThema($themaId)
    {
        $woorden = Woord::whereHas('themas', function ($query) use ($themaId) {
            $query->where('thema_id', $themaId);
        })->get(['id', 'woord']);

        return response()->json($woorden);
    }
}
