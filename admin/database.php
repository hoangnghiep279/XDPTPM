<?php
class Database {
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->link->connect_error) {
            $this->error = "Connection failed: " . $this->link->connect_error;
            return false;
        } else {
            return true;
        }
    }

     // Select or Read data
   public function select($query) {
    $result = $this->link->query($query);
    if ($result) {
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;  // No rows found
        }
    } else {
        $this->error = $this->link->error;
        return false;
    }
}

// Insert data
public function insert($query) {
    $insert_row = $this->link->query($query);
    if ($insert_row) {
        return $this->link->insert_id;  // Return the last inserted ID
    } else {
        $this->error = $this->link->error;
        return false;
    }
}
// Update data
public function update($query) {
    if ($stmt = $this->link->prepare($query)) {
        if ($stmt->execute()) {
            $affected_rows = $stmt->affected_rows;
            $stmt->close();
            return $affected_rows;
        } else {
            $this->error = $stmt->error;
            $stmt->close();
            return false;
        }
    } else {
        $this->error = $this->link->error;
        return false;
    }
}

// Delete data
public function delete($query) {
    if ($stmt = $this->link->prepare($query)) {
        if ($stmt->execute()) {
            $affected_rows = $stmt->affected_rows;
            $stmt->close();
            return $affected_rows;
        } else {
            $this->error = $stmt->error;
            $stmt->close();
            return false;
        }
    } else {
        $this->error = $this->link->error;
        return false;
    }
}

}
    

  