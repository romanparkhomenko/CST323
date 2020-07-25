<?php

namespace App\Models;

/**
 * Class AffinityGroupModel
 *
 *
 * @author  Roman Parkhomenko
 * @package Model
 * @OA\Schema(
 *     description="Affinity Groups that users can join based on interest similiarities",
 *     title="Affinity Groups Model",
 *     required={"groupname", "descriptiono"}
 * )
 */
class AffinityGroupModel {
    /**
     * @OA\Property(
     *     format="int64",
     *     description="ID",
     *     title="ID",
     * )
     *
     * @var integer
     */
    public $id;

    /**
     * @OA\Property(
     *     description="Group Name",
     *     title="groupname",
     * )
     *
     * @var string
     */
    public $groupname;
    /**
     * @OA\Property(
     *     description="Group City",
     *     title="city",
     * )
     *
     * @var string
     */
    public $city;
    /**
     * @OA\Property(
     *     description="Group Description",
     *     title="description",
     * )
     *
     * @var string
     */
    public $description;
    /**
     * @OA\Property(
     *     description="Group Skills",
     *     title="skills",
     * )
     *
     * @var string
     */
    public $skills;

    /**
     * @OA\Property(
     *     description="Group education",
     *     title="education",
     * )
     *
     * @var string
     */
    public $education;

    public function __construct($groupname, $description) {
        $this->groupname = $groupname;
        $this->description = $description;
    }

    /// GETTERS AND SETTERS

    /**
     * @return mixed
     */
    public function getGroupname()
    {
        return $this->groupname;
    }

    /**
     * @param mixed $groupname
     */
    public function setGroupname($groupname): void
    {
        $this->groupname = $groupname;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @return mixed
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @param mixed $education
     */
    public function setEducation($education): void
    {
        $this->education = $education;
    }

}
