<?php

namespace App\Http\Controllers;

use App\AffinityGroups;
use App\Http\Resources\AffinityGroupsCollection;
use App\Http\Resources\AffinityGroups as GroupResource;
use App\Http\Resources\JobPostsCollection;
use App\JobPosts;
use App\Models\DTO;
use http\Exception;
use Illuminate\Http\Request;

class GroupsRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * @OA\Get(
     *      path="/groups/",
     *      operationId="index",
     *      tags={"Groups"},
     *      summary="Get all affinity Groups",
     *      description="Returns an array of all groups",
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/AffinityGroupModel")
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
            // Get All Groups from Resource Collection
            $allGroups = new AffinityGroupsCollection(AffinityGroups::all());

            //Create DTO
            $dto = new DTO(200, "OK", $allGroups);
            return response()->json($dto, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $e1) {
            $dto = new DTO(404, $e1->getMessage(), "Cannot find all jobs");
            return response()->json($dto, 404, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * @OA\Post(
     *     path="/groups/store",
     *     tags={"Groups"},
     *     summary="Add a new group",
     *     operationId="store",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"petstore_auth": {"write:jobs", "read:jobs"}}
     *     },
     *     @OA\RequestBody(
     *         request="AffinityGroupModel",
     *         description="Group object that needs to be added to the app",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AffinityGroupModel"),
     *         @OA\Schema(ref="#/components/schemas/AffinityGroupModel")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $group = new AffinityGroups;
        $group->groupname = $request->input('groupname');
        $group->city = $request->input('city');
        $group->description = $request->input('description');
        $group->skills = $request->input('skills');
        $group->education = $request->input('education');

        try {
            $group->save();

            //Create DTO
            $dto = new DTO(200, "Successfully Added group", $group);
            return response()->json($dto, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $e1) {
            $dto = new DTO(404, $e1->getMessage(), "Could not add group");
            return response()->json($dto, 401, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string $affinityGroups
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/groups/{id}",
     *      operationId="show",
     *      tags={"Groups"},
     *      summary="Get specific group by group id",
     *      description="Returns specific group data.",
     *      @OA\Parameter(
     *          name="id",
     *          description="The id of the group",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/AffinityGroupModel")
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
    public function show($affinityGroups)
    {
        // Get Groups from Resource
        $result = new GroupResource(\App\AffinityGroups::find($affinityGroups));

        if ($result) {
            //Create DTO
            $dto = new DTO(200, "OK", $result);
            return response()->json($dto, 200, [], JSON_PRETTY_PRINT);
        }

        $dto = new DTO(404, "NO Group exists under that id", "Cannot find job");
        return response()->json($dto, 404, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AffinityGroups  $affinityGroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AffinityGroups $affinityGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AffinityGroups  $affinityGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(AffinityGroups $affinityGroups)
    {
        //
    }
}
