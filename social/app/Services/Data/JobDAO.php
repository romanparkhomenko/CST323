<?php


namespace App\Services\Data;

use App\Models\JobModels;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;

class JobDAO {
    private $db = NULL;

    public function __construct($db){
        $this->db = $db;
    }

    public function addJob(JobModels $job){
        try {
            $companyname = $job->getCompanyname();
            $jobtitle = $job->getJobtitle();
            $salary = $job->getSalary();
            $description = $job->getDescription();
            $city = $job->getCity();
            $createdAt = now();
            $updatedAt = now();

            $stmt = $this->db->prepare("INSERT INTO jobpostings (companyname, jobtitle, salary, description, city, created_at, updated_at) VALUES ('$companyname', '$jobtitle', '$salary', '$description', '$city', '$createdAt', '$updatedAt')");


            $r = $stmt->execute();

            if ($stmt->rowCount() == 1){
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            throw new PDOException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function updateJob(JobModels $job){
        try {
            $id = $job->getId();
            $companyname = $job->getCompanyname();
            $jobtitle = $job->getJobtitle();
            $salary = $job->getSalary();
            $description = $job->getDescription();
            $city = $job->getCity();
            $updatedAt = now();

            $stmt = $this->db->prepare('UPDATE jobpostings
                                        SET companyname = :companyname,
                                            jobtitle = :jobtitle,
                                            salary = :salary,
                                            description = :description,
                                            city = :city,
                                            updated_at = :updatedAt
                                        WHERE ID = :id');

            $stmt->bindParam(':companyname', $companyname);
            $stmt->bindParam(':jobtitle', $jobtitle);
            $stmt->bindParam(':salary', $salary);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':city', $city);
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


}
