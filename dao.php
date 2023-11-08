<?php
class Dao {

  public function getConnection () {
    return new PDO("sqlsrv:server = tcp:projectstudios-db.database.windows.net,1433; Database = object-oriented-writing", "verdantAdminOfficial", "curtisIsIncrediblyCute!");
  }

  public function deleteObject ($id) {

  }

  public function getObject () {

  }

  public function saveObject($title, $type, $labels, $descriptors, $lore, $externalLinks, $additionalInfo, $username)
  {
      try {
          $conn = $this->getConnection();
          $saveQuery = "INSERT INTO ObjectMetadata (title, type, labels, descriptors, lore, externalLinks, additionalInfo) 
                        VALUES (:title, :type, :labels, :descriptors, :lore, :externalLinks, :additionalInfo)";
          $q = $conn->prepare($saveQuery);
          $q->bindParam(":title", $title);
          $q->bindParam(":type", $type);
          $q->bindParam(":labels", $labels);
          $q->bindParam(":descriptors", $descriptors);
          $q->bindParam(":lore", $lore);
          $q->bindParam(":externalLinks", $externalLinks);
          $q->bindParam(":additionalInfo", $additionalInfo);
  
          $result = $q->execute();

          $objectID = $conn->lastInsertId();

          $query = $conn->prepare("SELECT userID FROM users WHERE username = :username");
          $query->bindParam(':username', $username);
          $query->execute();
          $user = $query->fetch(PDO::FETCH_ASSOC);


          if ($user) {
            $userID = $user['userID'];
            
            $ownerQuery = $conn->prepare("INSERT INTO ObjectOwners (userID, objectID) VALUES (:userID, :objectID)");
            $ownerQuery->bindParam(":userID", $userID);
            $ownerQuery->bindParam(":objectID", $objectID);
            $success = $ownerQuery->execute();

            if ($result && $success) {
                return true;
            }
        }
      } catch (PDOException $e) {
          return false;
      }
  }


  public function saveUser($username, $password)
  {
      try {
          $conn = $this->getConnection();
  
          $checkQuery = "SELECT COUNT(*) FROM users WHERE username = :username";
          $checkStmt = $conn->prepare($checkQuery);
          $checkStmt->bindParam(":username", $username);
          $checkStmt->execute();
  
          $userCount = $checkStmt->fetchColumn();
  
          if ($userCount > 0) {
              $_SESSION['error_message'] = "Username already in use";
              return false;
          }
          if (strlen($username) > 25)
          {
            $_SESSION['error_message'] = "Username must be 25 characters or less.";
            return false;
          }
  
          // Check password length
          if (strlen($password) < 6) {
              $_SESSION['error_message'] = "Password must be at least 6 characters long";
              return false;
          }
  
          $saveQuery = "INSERT INTO users (username, password) VALUES (:username, :password)";
          $q = $conn->prepare($saveQuery);
          $q->bindParam(":username", $username);
          $q->bindParam(":password", $password);
          $result = $q->execute();
  
          if ($result) {
              return true;
          } else {
              $_SESSION['error_message'] = "Error adding new user";
              return false;
          }
      } catch (PDOException $e) {
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