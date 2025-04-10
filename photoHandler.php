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
            
            
                $newFileName = uniqid("IMG_", true) . "." . $fileType;
                $targetPath = "{$this->uploadDir}{$newFileName}";
    
                // Move the file to the server
                if (move_uploaded_file($fileTmpName, $targetPath)) {
                    echo "File uploaded successfully.";
                    return $targetPath;
    
                } else {
                    echo "Error moving the file.";
                    return "";
                }

            
        } else {
            echo "No file uploaded or there was an error.";
            return "";
        }
    }
}
