<?php

namespace App\Models;

/**
 * Class UserModel
 *
 *
 * @author  Roman Parkhomenko
 * @package Authenticatable
 * @OA\Schema(
 *     description="User Model. Combination of Laravel's Auth extenstion and my own user attributes.",
 *     title="User Model",
 *     required={"email", "password"}
 * )
 */
class UserModel {
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
     *     description="User First Name",
     *     title="firstname",
     * )
     *
     * @var string
     */
    public $firstname;
    /**
     * @OA\Property(
     *     description="User Last Name",
     *     title="lastname",
     * )
     *
     * @var string
     */
    public $lastname;
    /**
     * @OA\Property(
     *     description="Username",
     *     title="username",
     * )
     *
     * @var string
     */
    public $username;
    /**
     * @OA\Property(
     *     description="User Password",
     *     title="password",
     * )
     *
     * @var string
     */
    public $password;
    /**
     * @OA\Property(
     *     description="User Email",
     *     title="email",
     * )
     *
     * @var string
     */
    public $email;
    /**
     * @OA\Property(
     *     description="User Phone",
     *     title="phone",
     * )
     *
     * @var string
     */
    public $phone;
    /**
     * @OA\Property(
     *     description="About User Snippet",
     *     title="about",
     * )
     *
     * @var string
     */
    public $about;
    /**
     * @OA\Property(
     *     description="User Job Title",
     *     title="jobtitle",
     * )
     *
     * @var string
     */
    public $jobtitle;
    /**
     * @OA\Property(
     *     description="User Admin Access",
     *     title="isAdmin",
     * )
     *
     * @var string
     */
    public $isAdmin;
    /**
     * @OA\Property(
     *     description="User Skills",
     *     title="skills",
     * )
     *
     * @var string
     */
    public $skills;
    /**
     * @OA\Property(
     *     description="User Job History",
     *     title="jobhistory",
     * )
     *
     * @var string
     */
    public $jobhistory;
    /**
     * @OA\Property(
     *     description="User Education",
     *     title="education",
     * )
     *
     * @var string
     */
    public $education;
    /**
     * @OA\Property(
     *     description="User Create at",
     *     title="createdAt",
     * )
     *
     * @var string
     */
    public $createdAt;
    /**
     * @OA\Property(
     *     description="User Updated At",
     *     title="updatedAt",
     * )
     *
     * @var string
     */
    public $updatedAt;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }


    /// GETTERS AND SETTERS
    /**
     * @return mixed
     */
    public function getAbout()
    {
        return $this->about;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
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
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * @return mixed
     */
    public function getJobhistory()
    {
        return $this->jobhistory;
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
    public function getIsAdmin()
    {
        return $this->isAdmin;
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
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $about
     */
    public function setAbout($about): void
    {
        $this->about = $about;
    }

    /**
     * @param mixed $education
     */
    public function setEducation($education): void
    {
        $this->education = $education;
    }

    /**
     * @param mixed $jobhistory
     */
    public function setJobhistory($jobhistory): void
    {
        $this->jobhistory = $jobhistory;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @param mixed $jobtitle
     */
    public function setJobtitle($jobtitle): void
    {
        $this->jobtitle = $jobtitle;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }
}
