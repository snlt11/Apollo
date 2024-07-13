<?php

namespace App\classes;

use Exception;

class FileUpload
{
    /**
     * @throws Exception
     */
    public function moveUploadFile($file, $fieldName = ""): string
    {
        $name = $this->getName($file, $fieldName);
        $path = APP_ROOT . '/public/assets/uploads/';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $file_path = $path . $name;
        if (move_uploaded_file($file->file->tmp_name, $file_path)) {
            return $file_path;
        } else {
            Session::flashMessage('error', 'Failed to move uploaded file');
            Redirect::back();
        }
    }
    /**
     * @throws Exception
     */
    public function getName($file, $inputName = ""): string
    {
        if($inputName === ""){
            $inputName = pathinfo($file->file->tmp_name, PATHINFO_FILENAME);
        }
        return $this->generateUniqueName($file,$inputName);
    }

    /**
     * @throws Exception
     */
    private function generateUniqueName($file, mixed $inputName): string
    {
        $newName = md5(microtime(strtolower(preg_replace('/[^a-zA-Z0-9_\-.]/', '_', $inputName))));
        $extension = $this->validateExtension($file);
        return $newName. '.'. $extension;
    }

    /**
     * @throws Exception
     */
    private function validateExtension($value): array|string
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = strtolower(pathinfo($value->file->name, PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExtensions)) {
            Session::flashMessage('error','Invalid file type. Only jpg, jpeg, png, and gif are allowed');
            Redirect::back();
        }
        $this->checkSize($value);
        return $extension;
    }

    /**
     * @throws Exception
     */
    private function checkSize($file): void
    {
        $maxSize = 100; // 100MB
        if ($file->file->size > $maxSize * 1024 * 1024) {
            Session::flashMessage('error','File size exceeds the allowed limit');
            Redirect::back();
        }
    }
}