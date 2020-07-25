<?php

namespace App\Models;

/**
 * Class JobModels
 *
 *
 * @author  Roman Parkhomenko
 * @package Model
 * @OA\Schema(
 *     description="Job Posts Model.",
 *     title="Job Posts Model",
 *     required={"companyname", "jobtitle"}
 * )
 */
class JobModels {
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
     *     description="Company Name",
     *     title="companyname",
     * )
     *
     * @var string
     */
    public $companyname;
    /**
     * @OA\Property(
     *     description="Job Title",
     *     title="jobtitle",
     * )
     *
     * @var string
     */
    public $jobtitle;
    /**
     * @OA\Property(
     *     description="Salary",
     *     title="salary",
     * )
     *
     * @var integer
     */
    public $salary;
    /**
     * @OA\Property(
     *     description="description",
     *     title="description",
     * )
     *
     * @var string
     */
    public $description;
    /**
     * @OA\Property(
     *     description="City",
     *     title="city",
     * )
     *
     * @var string
     */
    public $city;
    /**
     * @OA\Property(
     *     description="Posted Date",
     *     title="createdAt",
     * )
     *
     * @var string
     */
    public $createdAt;
    /**
     * @OA\Property(
     *     description="Updated Date",
     *     title="updatedAt",
     * )
     *
     * @var string
     */
    public $updatedAt;
    /**
     * @OA\Property(
     *     description="Deleted At",
     *     title="deletedAt",
     * )
     *
     * @var string
     */
    public $deletedAt;

    public function __construct($companyname, $jobtitle) {
        $this->companyname = $companyname;
        $this->jobtitle = $jobtitle;
    }


    /// GETTERS AND SETTERS

    /**
     * @return mixed
     */
    public function getCompanyname()
    {
        return $this->companyname;
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
    public function getDeletedAt()
    {
        return $this->deletedAt;
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
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getJobtitle()
    {
        return $this->jobtitle;
    }


    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @param mixed $companyname
     */
    public function setCompanyname($companyname): void
    {
        $this->companyname = $companyname;
    }

    /**
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @param mixed $jobtitle
     */
    public function setJobtitle($jobtitle): void
    {
        $this->jobtitle = $jobtitle;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

}
