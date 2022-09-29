<?php
namespace App\Services;

class Media {
    private array $file;
    private array $errors = [];
    private string $fileType = '';
    private string $fileExtension = '';
    private int $fileSize;
    private string $fileName;

    

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file)
    {
        $this->file = $file;
        $typeArray = explode('/',$file['type']);
        $this->setFileType($typeArray[0]);
        $this->setFileExtension($typeArray[1]);
        $this->setFileSize($file['size']);
        return $this;
    }

    /**
     * Set the value of fileType
     *
     * @return  self
     */ 
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * Set the value of fileExtension
     *
     * @return  self
     */ 
    public function setFileExtension($fileExtension)
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /**
     * Set the value of fileSize
     *
     * @return  self
     */ 
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    public function size(int $maxSize) :self
    {
        if($this->fileSize > $maxSize){
            $this->errors[__FUNCTION__] = "Max size {$maxSize}";
        }
        return $this;
    }

    public function extension(array $allowedExtensions) :self // [png,jpg,jpeg]
    {
       if(! in_array($this->fileExtension,$allowedExtensions)){
        $this->errors[__FUNCTION__] = "Available Extensions are " . implode(',',$allowedExtensions);
       }
       return $this;
    }

    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }

    public function getError(string $error) :?string
    {
        return $this->errors[$error] ?? null;
    }

    public function getMessage(string $error) :string
    {
        return "<p class='font-weight-bold text-danger'> ".$this->getError($error)." </p>";
    }

    public function upload(string $path) :bool
    {
        $this->fileName = uniqid() . '.' . $this->fileExtension;
        $permenatPath = $path . $this->fileName;
        return move_uploaded_file($this->file['tmp_name'],$permenatPath);
    }

    public function delete(string $path) :bool
    {
        if(file_exists($path)){
            return unlink($path);
        }
        return false;
    }

    /**
     * Get the value of newFileName
     */ 
    public function getFileName()
    {
        return $this->fileName;
    }
}