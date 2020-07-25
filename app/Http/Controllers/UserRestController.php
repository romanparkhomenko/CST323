<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Models\DTO;
use App\Models\UserModel;
use http\Exception;


class UserRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * @OA\Get(
     *      path="/users/",
     *      operationId="index",
     *      tags={"Users"},
     *      summary="Get all users",
     *      description="Returns an array of all users",
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/UserModel")
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {
     *             "oauth2_security_example": {"write:users", "read:users"}
     *         }
     *     },
     * )
     */
    public function index()
    {
        try {
            //Call Service to get all users
            $service = new SecurityService();
            $users = $service->getAllUsers();

            //Create DTO
            $dto = new DTO(200, "OK", $users);

            return response()->json($dto, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $e1) {
            $dto = new DTO(404, $e1->getMessage(), "Cannot find all users");
            return response()->json($dto, 404, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $user
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * @OA\Get(
     *      path="/users/{id}",
     *      operationId="show",
     *      tags={"Users"},
     *      summary="Get specific user by user id",
     *      description="Returns specific user data.",
     *      @OA\Parameter(
     *          name="id",
     *          description="The id of the user",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/UserModel")
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {
     *             "oauth2_security_example": {"write:users", "read:users"}
     *         }
     *     },
     * )
     */
    public function show($user)
    {

        try {
            //Call Service to get all users
            $service = new SecurityService();
            $users = $service->getUser($user);

            //Create DTO
            $dto = new DTO(200, "OK", $users);

            return response()->json($dto, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $e1) {
            $dto = new DTO(404, $e1->getMessage(), "User does not exist");
            return response()->json($dto, 404, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
