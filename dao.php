<?php
class Dao {

  public function getConnection () {
    return new PDO("sqlsrv:server = tcp:projectstudios-db.database.windows.net,1433; Database = object-oriented-writing", "verdantAdminOfficial", "curtisIsIncrediblyCute!");
  }

public function deleteObject ($objectID) {
  try {
      $conn = $this->getConnection();

      $query = $conn->prepare("DELETE FROM ObjectMetadata WHERE objectID = :objectID");
      $query->bindParam(':objectID', $objectID);
      $success = $query->execute();

      $query = $conn->prepare("DELETE FROM ObjectOwners WHERE objectID = :objectID");
      $query->bindParam(':objectID', $objectID);
      $success = $query->execute() && $success;

      $query = $conn->prepare("DELETE FROM ObjectRelations WHERE parentObjectID = :objectID");
      $query->bindParam(':objectID', $objectID);
      $success = $query->execute() && $success;

      return $success;

  } catch (PDOException $e) {
      return false;
  }
}

  public function getUserByUsername($username) {
    try {
        $conn = $this->getConnection();

        $query = $conn->prepare("SELECT userID FROM users WHERE username = :username");
        $query->bindParam(':username', $username);
        $query->execute();

        $userID = $query->fetch(PDO::FETCH_COLUMN);

        return $userID;

    } catch (PDOException $e) {
        return false;
    }
}

  public function getUsersObjects($userID) {
    try {
      $conn = $this->getConnection();

      $query = $conn->prepare("SELECT objectID FROM ObjectOwners WHERE userID = :userID");
      $query->bindParam(':userID', $userID);
      $query->execute();

      $object = $query->fetchAll(PDO::FETCH_ASSOC);

      return $object;

    } catch (PDOException $e) {
        return false;
    }
  }

  public function getObjectByID($objectID) {
    try {
        $conn = $this->getConnection();

        $query = $conn->prepare("SELECT * FROM ObjectMetadata WHERE objectID = :objectID");
        $query->bindParam(':objectID', $objectID);
        $query->execute();

        $object = $query->fetch(PDO::FETCH_ASSOC);

        return $object;

    } catch (PDOException $e) {
        return false;
    }
}

public function getObjectIDByName($objectName, $userID) {
  try {
    $conn = $this->getConnection();

    $query = $conn->prepare("SELECT objectID FROM ObjectMetadata WHERE title = :objectName");
    $query->bindParam(':objectName', $objectName);
    $query->execute();

    $userID = $query->fetch(PDO::FETCH_ASSOC);

    if (!$userID) {
      return false;
    }

    return $userID;

  } catch (PDOException $e) {
      return false;
  }
}
public function setObjectRelation($parentObjectID, $childObjectID, $relation) {
  try {
      $conn = $this->getConnection();

      $saveQuery = "INSERT INTO ObjectRelations (parentObjectID, childObjectID, relation) 
                    VALUES (:parentObjectID, :childObjectID, :relation)";
      $q = $conn->prepare($saveQuery);
      $q->bindParam(":parentObjectID", $parentObjectID);
      $q->bindParam(":childObjectID", $childObjectID);
      $q->bindParam(":relation", $relation);

      $result = $q->execute();

      if (!$result) {
        return false;
      }

      return $result;

  } catch (PDOException $e) {
      return false;
  }
}

public function getObjectRelation($parentObjectID) {
  try {
    $conn = $this->getConnection();

    $query = $conn->prepare("SELECT * FROM ObjectRelations WHERE parentObjectID = :parentObjectID");
    $query->bindParam(':parentObjectID', $parentObjectID);
    $query->execute();

  } catch (PDOException $e) {
    return false;
  }
}

  public function saveObject($title, $alias, $labels, $descriptors, $lore, $externalLinks, $additionalInfo, $username)
  {
      try {
          $conn = $this->getConnection();
          $saveQuery = "INSERT INTO ObjectMetadata (title, alias, labels, descriptors, lore, externalLinks, additionalInfo) 
                        VALUES (:title, :alias, :labels, :descriptors, :lore, :externalLinks, :additionalInfo)";
          $q = $conn->prepare($saveQuery);
          $q->bindParam(":title", $title);
          $q->bindParam(":alias", $alias);
          $q->bindParam(":labels", $labels);
          $q->bindParam(":descriptors", $descriptors);
          $q->bindParam(":lore", $lore);
          $q->bindParam(":externalLinks", $externalLinks);
          $q->bindParam(":additionalInfo", $additionalInfo);
  
          $result = $q->execute();
          $objectID = $conn->lastInsertId();

          if (!$result) {
            $_SESSION['error_message'] = "Error adding object!";
            return false;
          }

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

            if (!$success) {
              $_SESSION['error_message'] = "Error adding object owner!";
              return false;
            }

            if ($result && $success) {
                return $objectID;
            }
        }
      } catch (PDOException $e) {
          $_SESSION['error_message'] = "An exception occured.";
          return false;
      }
  }


  public function validateObjectTitle($userID, $objTitle) {

    if (!$userID) {
      return false;
    }

    try {
      $conn = $this->getConnection();

      $query = $conn->prepare("SELECT * FROM ObjectMetadata WHERE title = :objTitle");
      $query->bindParam(':objTitle', $objTitle);
      $query->execute();

      $object = $query->fetch(PDO::FETCH_ASSOC);

      if (!$object) {
        $_SESSION['error_message'] = "Could not find " . $objTitle;
        return false;
      }

      $userObjs = $this->getUsersObjects($userID);

      if (!$userObjs) {   
        $_SESSION['error_message'] = "";
        return false;
      }

      foreach ($userObjs as $userObj) {
        if ($userObj['title'] === $objTitle){
          return true;
        }
      }

      return false;

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