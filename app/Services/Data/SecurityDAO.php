<?php


namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;

class SecurityDAO {
    private $db = NULL;

    public function __construct($db){
        $this->db = $db;
    }

    public function findByUser(UserModel $user){
        try {

            $name = $user->getUsername();
            $password = $user->getPassword();

            $stmt = $this->db->prepare("SELECT ID, USERNAME, PASSWORD FROM USERS WHERE USERNAME = :username AND PASSWORD = :password");


            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $password);
            $r = $stmt->execute();

            if ($stmt->rowCount() == 1){
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function updateUser(UserModel $user){
        try {
            $id = $user->getId();
            $firstname = $user->getFirstname();
            $lastname = $user->getLastname();
            $username = $user->getUsername();
            $phone = $user->getPhone();
            $about = $user->getAbout();
            $jobtitle = $user->getJobtitle();
            $isAdmin = $user->getIsAdmin();
            $skills = $user->getSkills();
            $jobhistory = $user->getJobhistory();
            $education = $user->getEducation();
            $updatedAt = now();

            $stmt = $this->db->prepare('UPDATE users
                                        SET firstname = :firstname,
                                            lastname = :lastname,
                                            username = :username,
                                            phone = :phone,
                                            about = :about,
                                            jobtitle = :jobtitle,
                                            isAdmin = :isAdmin,
                                            skills = :skills,
                                            jobhistory = :jobhistory,
                                            education = :education,
                                            updated_at = :updatedAt
                                        WHERE ID = :id');
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':about', $about);
            $stmt->bindParam(':jobtitle', $jobtitle);
            $stmt->bindParam(':isAdmin', $isAdmin);
            $stmt->bindParam(':skills', $skills);
            $stmt->bindParam(':jobhistory', $jobhistory);
            $stmt->bindParam(':education', $education);
            $stmt->bindParam(':updatedAt', $updatedAt);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() == 1){
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            throw new PDOException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function findByUserID($id){
        Log::info("Entering SecurityDAO.findByUser()");
        try {
            $stmt = $this->db->prepare("SELECT * FROM USERS WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() == 0){
                return null;
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user = new UserModel($row["username"], $row["password"]);
                $user->setId($row["id"]);
                $user->setFirstname($row['firstname']);
                $user->setLastname($row['lastname']);
                $user->setUsername($row['username']);
                $user->setEmail($row['email']);
                $user->setPhone($row['phone']);
                $user->setAbout($row['about']);
                $user->setJobtitle($row['jobtitle']);
                $user->setIsAdmin($row['isAdmin']);
                $user->setSkills($row['skills']);
                $user->setJobhistory($row['jobhistory']);
                $user->setEducation($row['education']);
                $user->setCreatedAt($row['created_at']);
                $user->setUpdatedAt($row['updated_at']);
                return $user;
            }
        } catch (PDOException $e) {
            Log::error("Exception: ", array("message"  => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function findAllUsers(){
        Log::info("Entering SecurityDAO.findByUser()");
        try {
            $stmt = $this->db->prepare("SELECT * FROM USERS");
            $stmt->execute();

            if ($stmt->rowCount() == 0){
                return array();
            } else {
                $index = 0;
                $users = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $user = new UserModel($row["username"], $row["password"]);
                    $user->setId($row["id"]);
                    $user->setFirstname($row['firstname']);
                    $user->setLastname($row['lastname']);
                    $user->setUsername($row['username']);
                    $user->setEmail($row['email']);
                    $user->setPhone($row['phone']);
                    $user->setAbout($row['about']);
                    $user->setJobtitle($row['jobtitle']);
                    $user->setIsAdmin($row['isAdmin']);
                    $user->setSkills($row['skills']);
                    $user->setJobhistory($row['jobhistory']);
                    $user->setEducation($row['education']);
                    $user->setCreatedAt($row['created_at']);
                    $user->setUpdatedAt($row['updated_at']);
                    $users[$index++] = $user;
                }
                return $users;
            }

        } catch (PDOException $e) {
            Log::error("Exception: ", array("message"  => $e->getMessage()));
            throw new PDOException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }


}
