<?php

namespace App\Http\Controllers;

use App\JobPosts;
use App\Http\Resources\JobPostsCollection;
use App\Http\Resources\JobPosts as JobResource;
use App\Models\DTO;
use App\Services\Business\SecurityService;
use http\Exception;
use Illuminate\Http\Request;

class JobsRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * @OA\Get(
     *      path="/jobs/",
     *      operationId="index",
     *      tags={"Jobs"},
     *      summary="Get all jobs",
     *      description="Returns an array of all jobs",
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/JobModels")
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
            // Get All Jobs from Resource Collection
            $allJobs = new JobPostsCollection(JobPosts::all());

            //Create DTO
            $dto = new DTO(200, "OK", $allJobs);
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
     *     path="/jobs/store",
     *     tags={"Jobs"},
     *     summary="Add a new job",
     *     operationId="store",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"petstore_auth": {"write:jobs", "read:jobs"}}
     *     },
     *     @OA\RequestBody(
     *         request="JobModels",
     *         description="Job object that needs to be added to the app",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/JobModels"),
     *         @OA\Schema(ref="#/components/schemas/JobModels")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $jobPost = new JobPosts;
        $jobPost->companyname = $request->input('companyname');
        $jobPost->jobtitle = $request->input('jobtitle');
        $jobPost->salary = $request->input('salary');
        $jobPost->description = $request->input('description');
        $jobPost->city = $request->input('city');
        $jobPost->setCreatedAt(now());
        $jobPost->setUpdatedAt(now());

        try {
            $jobPost->save();

            //Create DTO
            $dto = new DTO(200, "Successfully Added Job", $jobPost);
            return response()->json($dto, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $e1) {
            $dto = new DTO(404, $e1->getMessage(), "Could not add job");
            return response()->json($dto, 401, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $string $jobPosts
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * @OA\Get(
     *      path="/jobs/{id}",
     *      operationId="show",
     *      tags={"Jobs"},
     *      summary="Get specific job by job id",
     *      description="Returns specific job data.",
     *      @OA\Parameter(
     *          name="id",
     *          description="The id of the job",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/JobModels")
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
    public function show($jobPosts)
    {
        try {
            // Get Jobs from Resource
            $result = new JobResource(\App\JobPosts::find($jobPosts));

            //Create DTO
            $dto = new DTO(200, "OK", $result);
            return response()->json($dto, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $e1) {
            $dto = new DTO(404, $e1->getMessage(), "Cannot find job");
            return response()->json($dto, 404, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobPosts  $jobPosts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPosts $jobPosts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobPosts  $jobPosts
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPosts $jobPosts)
    {
        //
    }
}
