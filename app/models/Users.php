<?php
class user
{
    // Connection
    private $conn;
    // Table
    private $db_table = "user";
    // Columns
    public $user_id;
    public $user_token;
    public $user_firstname;
    public $user_lastname;
    public $user_birthdate;
    public $user_nationality;
    public $family_situation;
    public $user_adresse;
    public $visa_type;
    public $Date_of_departure;
    public $arrival_date;
    public $voyage_document_type;
    public $voyage_document_number;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // GET ALL
    public function getUsers()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    // CREATE
    public function createUser()
    {
        $sqlQuery = "INSERT INTO user (user_token, user_firstname, user_lastname, user_birthdate, user_nationality, 
        family_situation, user_adresse, visa_type, Date_of_departure, arrival_date, voyage_document_type, voyage_document_number) VALUES
         (:user_token, :user_firstname, :user_lastname, :user_birthdate, :user_nationality, :family_situation, :user_adresse, 
         :visa_type, :Date_of_departure, :arrival_date, :voyage_document_type, :voyage_document_number)";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->user_token = htmlspecialchars(strip_tags($this->user_token));
        $this->user_firstname = htmlspecialchars(strip_tags($this->user_firstname));
        $this->user_lastname = htmlspecialchars(strip_tags($this->user_lastname));
        $this->user_birthdate = htmlspecialchars(strip_tags($this->user_birthdate));
        $this->user_nationality = htmlspecialchars(strip_tags($this->user_nationality));
        $this->family_situation = htmlspecialchars(strip_tags($this->family_situation));
        $this->user_adresse = htmlspecialchars(strip_tags($this->user_adresse));
        $this->visa_type = htmlspecialchars(strip_tags($this->visa_type));
        $this->Date_of_departure = htmlspecialchars(strip_tags($this->Date_of_departure));
        $this->arrival_date = htmlspecialchars(strip_tags($this->arrival_date));
        $this->voyage_document_type = htmlspecialchars(strip_tags($this->voyage_document_type));
        $this->voyage_document_number = htmlspecialchars(strip_tags($this->voyage_document_number));

        // bind data
        $stmt->bindParam(":user_token", $this->user_token);
        $stmt->bindParam(":user_firstname", $this->user_firstname);
        $stmt->bindParam(":user_lastname", $this->user_lastname);
        $stmt->bindParam(":user_birthdate", $this->user_birthdate);
        $stmt->bindParam(":user_nationality", $this->user_nationality);
        $stmt->bindParam(":family_situation", $this->family_situation);
        $stmt->bindParam(":user_adresse", $this->user_adresse);
        $stmt->bindParam(":visa_type", $this->visa_type);
        $stmt->bindParam(":Date_of_departure", $this->Date_of_departure);
        $stmt->bindParam(":arrival_date", $this->arrival_date);
        $stmt->bindParam(":voyage_document_type", $this->voyage_document_type);
        $stmt->bindParam(":voyage_document_number", $this->voyage_document_number);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    // READ single
    public function getSingleUser()
    {
        $sqlQuery = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->user_id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->user_firstname = $dataRow['user_firstname'];
        $this->user_lastname = $dataRow['user_lastname'];
        $this->user_birthdate = $dataRow['user_birthdate'];
        $this->user_nationality = $dataRow['user_nationality'];
        $this->family_situation = $dataRow['family_situation'];
        $this->user_adresse = $dataRow['user_adresse'];
        $this->visa_type = $dataRow['visa_type'];
        $this->Date_of_departure = $dataRow['Date_of_departure'];
        $this->arrival_date = $dataRow['arrival_date'];
        $this->voyage_document_type = $dataRow['voyage_document_type'];
        $this->voyage_document_number = $dataRow['voyage_document_number'];
    }
    // UPDATE
    public function updateUser()
    {
        $sqlQuery = "UPDATE user SET user_firstname = :user_firstname, user_lastname = :user_lastname, 
        user_birthdate = :user_birthdate, user_nationality = :user_nationality, family_situation = :family_situation, user_adresse = :user_adresse, 
        visa_type = :visa_type, Date_of_departure = :Date_of_departure, arrival_date = :arrival_date, voyage_document_type = :voyage_document_type, 
        voyage_document_number = :voyage_document_number WHERE user_token = :user_token";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->user_token = htmlspecialchars(strip_tags($this->user_token));
        $this->user_firstname = htmlspecialchars(strip_tags($this->user_firstname));
        $this->user_lastname = htmlspecialchars(strip_tags($this->user_lastname));
        $this->user_birthdate = htmlspecialchars(strip_tags($this->user_birthdate));
        $this->user_nationality = htmlspecialchars(strip_tags($this->user_nationality));
        $this->family_situation = htmlspecialchars(strip_tags($this->family_situation));
        $this->user_adresse = htmlspecialchars(strip_tags($this->user_adresse));
        $this->visa_type = htmlspecialchars(strip_tags($this->visa_type));
        $this->Date_of_departure = htmlspecialchars(strip_tags($this->Date_of_departure));
        $this->arrival_date = htmlspecialchars(strip_tags($this->arrival_date));
        $this->voyage_document_type = htmlspecialchars(strip_tags($this->voyage_document_type));
        $this->voyage_document_number = htmlspecialchars(strip_tags($this->voyage_document_number));
        // $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        // bind data
        $stmt->bindParam(":user_token", $this->user_token);
        $stmt->bindParam(":user_firstname", $this->user_firstname);
        $stmt->bindParam(":user_lastname", $this->user_lastname);
        $stmt->bindParam(":user_birthdate", $this->user_birthdate);
        $stmt->bindParam(":user_nationality", $this->user_nationality);
        $stmt->bindParam(":family_situation", $this->family_situation);
        $stmt->bindParam(":user_adresse", $this->user_adresse);
        $stmt->bindParam(":visa_type", $this->visa_type);
        $stmt->bindParam(":Date_of_departure", $this->Date_of_departure);
        $stmt->bindParam(":arrival_date", $this->arrival_date);
        $stmt->bindParam(":voyage_document_type", $this->voyage_document_type);
        $stmt->bindParam(":voyage_document_number", $this->voyage_document_number);
        // $stmt->bindParam(":user_id", $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    // DELETE
    function deleteUser()
    {
        $sqlQuery = "DELETE FROM user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        $stmt->bindParam(1, $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function login($token)
    {
        $fetch_user_by_token = "SELECT * FROM `user` WHERE `user_token`=:token";
        $query_stmt = $this->conn->prepare($fetch_user_by_token);
        $query_stmt->bindValue(':token', $token, PDO::PARAM_STR);
        $query_stmt->execute();
        $result = $query_stmt->fetch(PDO::FETCH_ASSOC);
        if ($query_stmt->rowCount()) {
            return $result;
        } else {
            return false;
        }
    }
    function book($date, $user_id)
    {
        // $fetch_reservation = "SELECT * FROM `reservation` WHERE `reservation_date`=:date AND `09:15`=0 OR `10:15`=0 OR `11:15`=0 OR `14:15`=0 OR `15:15`=0 ";
        // $query_stmt = $this->conn->prepare($fetch_reservation);
        // $query_stmt->bindValue(':date', $date, PDO::PARAM_STR);
        // $query_stmt->execute();
        $fetch_reservation = "SELECT * FROM `reservation` WHERE `reservation_date`=:date AND (`09:15`=0 OR `10:15`=0 OR `11:15`=0 OR `14:15`=0 OR `15:15`=0)";
        $query_stmt = $this->conn->prepare($fetch_reservation);
        $query_stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $query_stmt->execute();
        $result = $query_stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return $result;
        } else {
            $sqlQuery = "INSERT INTO `reservation` (`reservation_date`, `user_id`, `09:15`, `10:15`, `11:15`, `14:15`, `15:15`) 
              VALUES (:date, '$user_id', 0, 0, 0, 0, 0)";
            $query_stmt = $this->conn->prepare($sqlQuery);
            $query_stmt->bindValue(':date', $date, PDO::PARAM_STR);
            $query_stmt->execute();
        }
    }
}
