<?php
class Dao {

  public function getConnection () {
    return new PDO("sqlsrv:server = tcp:projectstudios-db.database.windows.net,1433; Database = object-oriented-writing", "verdantAdminOfficial", "curtisIsIncrediblyCute!");
  }

  public function deleteObject ($id) {
    /*$conn = $this->getConnection();
    $deleteComment =
        "DELETE FROM comments
        WHERE id = :id";
    $q = $conn->prepare($deleteComment);
    $q->bindParam(":id", $id);
    $q->execute();*/
  }

  public function saveObject ($name, $comment) {
      /*$conn = $this->getConnection();
      $saveQuery =
            "INSERT INTO comments
            (name, comment)
            VALUES
            (:name, :comment)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":name", $name);
        $q->bindParam(":comment", $comment);
        $q->execute();*/
  }

  public function getObject () {
    /*$conn = $this->getConnection();
    return $conn->query("SELECT name, comment, date_entered FROM comments ORDER BY date_entered desc")->fetchAll(PDO::FETCH_ASSOC);*/
  }

  public function saveUser ($username, $password)
  {
    try {
      $conn = $this->getConnection();
      $saveQuery =
          "INSERT INTO users
          (username, password)
          VALUES
          (:username, :password)";
      $q = $conn->prepare($saveQuery);
      $q->bindParam(":username", $username);
      $q->bindParam(":password", $password);
      $result = $q->execute();

      if ($result) {
          // Insertion was successful
          return true;
      } else {
          // Insertion failed
          return false;
      }
    } catch (PDOException $e) {
        // Handle any database connection or query errors here
        return false;
    }
  }

  public function authenticate ($username, $password) {
  
    try {
      $conn = $this->getConnection();

      $query = $conn->prepare("SELECT username, password FROM users WHERE username = :username");
      $query->bindParam(':username', $username);
      $query->execute();

      $row = $query->fetch(PDO::FETCH_ASSOC);

      if ($row !== false) {

        $storedPassword = $row['password'];

        if ($password === $storedPassword) {
            return true;
        }

        $_SESSION['error_message'] = "Incorrect Password";
        return false;

      }

      $_SESSION['error_message'] = "Incorrect Username";
      return false;

    } catch (PDOException $e) {
      $_SESSION['error_message'] = "Something went wrong";
      return false;
    }
  }
} 