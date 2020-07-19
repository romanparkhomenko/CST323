<?php

namespace App\Models;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class User
 *
 *
 * @author  Roman Parkhomenko
 * @package App\Models
 * @OA\Schema(
 *     description="DTO with status, errors, and data",
 *     title="DTO"
 * )
 */
class DTO implements \JsonSerializable
{

    /**
     * @OA\Property(
     *     description="Status Code",
     *     title="errorCode",
     * )
     *
     * @var integer
     */
    private $errorCode;
    /**
     * @OA\Property(
     *     description="Error Message",
     *     title="errorMessage",
     * )
     *
     * @var string
     */
    private $errorMessage;
    /**
     * @OA\Property(
     *     description="Data being returned from app",
     *     title="data",
     * )
     *
     * @var object
     */
    private $data;

    public function __construct($errorCode, $errorMessage, $data)
    {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->data = $data;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
