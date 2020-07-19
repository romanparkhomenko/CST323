<?php

namespace App\Services\Business;

use App\Models\JobModels;
use App\Services\Data\JobDAO;
use App\Services\Data\SecurityDAO;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use \PDO;

class SecurityService
{

    public function login(UserModel $user) {
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $port = config("database.connections.mysql.port");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");

        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $service = new SecurityDAO($db);
        $flag = $service->findByUser($user);

        $db = null;

        return $flag;
    }

    public function updateUser(UserModel $user) {
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $port = config("database.connections.mysql.port");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");

        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $service = new SecurityDAO($db);
        $flag = $service->updateUser($user);

        $db = null;

        return $flag;
    }

    public function addJob(JobModels $job) {
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $port = config("database.connections.mysql.port");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");

        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $service = new JobDAO($db);
        $flag = $service->addJob($job);

        $db = null;

        return $flag;
    }

    public function updateJob(JobModels $job) {
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $port = config("database.connections.mysql.port");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");

        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $service = new JobDAO($db);
        $flag = $service->updateJob($job);

        $db = null;

        return $flag;
    }

    public function getAllUsers() {
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $port = config("database.connections.mysql.port");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");

        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $service = new SecurityDAO($db);

        $db = null;
        return $service->findAllUsers();
    }

    public function getUser($id) {
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $port = config("database.connections.mysql.port");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");

        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $service = new SecurityDAO($db);

        $db = null;
        return $service->findByUserID($id);

    }

}
