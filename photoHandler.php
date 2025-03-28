<?php

class PhotoHandler{
    private $uploadDir;
    public function __construct(){
        $this->uploadDir = "uploads/"; 
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true); // Create the folder if it doesn’t exist
        }

    }
    public function getDir(){
        return $this->uploadDir;
    }
    public function extractSavedPhotoPath () {
        if (isset($_FILES["user_image"]) && $_FILES["user_image"]["error"] == 0) {
            $fileName = basename($_FILES["user_image"]["name"]);
            $fileTmpName = $_FILES["user_image"]["tmp_name"];
            //$fileSize = $_FILES["user_image"]["size"];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
            // Allowed file types
            $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    
            if (in_array($fileType, $allowedTypes)) {
                $newFileName = uniqid("IMG_", true) . "." . $fileType;
                $targetPath = "{$this->uploadDir}{$newFileName}";
    
                // Move the file to the server
                if (move_uploaded_file($fileTmpName, $targetPath)) {
                    echo "File uploaded successfully.";
                    return $targetPath;
    
                    // Save the file name and path in the database
                    // $stmt = $conn->prepare("INSERT INTO users (user_image) VALUES (?)");
                    // $stmt->bind_param("s", $targetPath);
                    // if ($stmt->execute()) {
                    //     echo "File path saved to database.";
                    // } else {
                    //     echo "Error saving to database.";
                    // }
                } else {
                    echo "Error moving the file.";
                    return "";
                }
            } else {
                echo "Invalid file type. Allowed types: JPG, JPEG, PNG, GIF.";
                return "";

            }
        } else {
            echo "No file uploaded or there was an error.";
            return "";
        }
    }
}

/* 
  if (isset($_FILES["user_image"]) && $_FILES["user_image"]["error"] == 0) {
        

        // Get file details
        $fileName = basename($_FILES["user_image"]["name"]);
        $fileTmpName = $_FILES["user_image"]["tmp_name"];
        $fileSize = $_FILES["user_image"]["size"];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Allowed file types
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileType, $allowedTypes)) {
            // Unique file name to prevent overwriting
            $newFileName = uniqid("IMG_", true) . "." . $fileType;
            $targetPath = $uploadDir . $newFileName;

            // Move the file to the server
            if (move_uploaded_file($fileTmpName, $targetPath)) {
                echo "File uploaded successfully.";

                // Save the file name and path in the database
                $stmt = $conn->prepare("INSERT INTO users (user_image) VALUES (?)");
                $stmt->bind_param("s", $targetPath);
                if ($stmt->execute()) {
                    echo "File path saved to database.";
                } else {
                    echo "Error saving to database.";
                }
            } else {
                echo "Error moving the file.";
            }
        } else {
            echo "Invalid file type. Allowed types: JPG, JPEG, PNG, GIF.";
        }
    } else {
        echo "No file uploaded or there was an error.";
    }
 */
