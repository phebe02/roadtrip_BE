<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Thema;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="Thema",
 *     type="object",
 *     title="Thema",
 *     required={"id", "thema"},
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="thema", type="string", example="verkeer"),
 *         @OA\Property(property="woorden", type="array", @OA\Items(ref="#/components/schemas/Woord"))
 *     }
 * )
 */
class ApiThemaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/themas",
     *     summary="Haal alle themas op",
     *     @OA\Response(
     *         response=200,
     *         description="Een lijst van themas",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Thema"))
     *     )
     * )
     */
    public function index()
    {
        $themas = Thema::all(['id', 'thema']);
        return response()->json($themas);
    }

    /**
     * @OA\Get(
     *     path="/api/themas/{id}",
     *     summary="Haal een specifiek thema op",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Een specifiek thema",
     *         @OA\JsonContent(ref="#/components/schemas/Thema")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Thema niet gevonden"
     *     )
     * )
     */
    public function show($id)
    {
        $thema = Thema::with('woorden')->findOrFail($id);
        return response()->json($thema);
    }
}
