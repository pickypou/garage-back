<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Filesystem\Filesystem;

class UploaderService
{
    // On va lui passer un objet de type UploadedFile
    // Et elle doit nous retourner le nom de ce file
    private $filesystem;
    public function __construct(private SluggerInterface $slugger, Filesystem $filesystem)
     {
        $this->filesystem = $filesystem;
     }
    public function uploadFile(
        UploadedFile $file,
        string $directoryFolder
    ) {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        // this is needed to safely include the file name as part of the URL
        $safeFilename = $this->slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        // Move the file to the directory where brochures are stored
        try {
            $file->move(
                $directoryFolder,
                $newFilename
            );
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }
        return $newFilename;
    }
    public function removeFile(string $fileName, string $directoryFolder)
    {
        // Construction du chemin complet du fichier à supprimer
        $filePath = $directoryFolder.'/'.$fileName;

        // Vérifier si le fichier existe avant de tenter de le supprimer
        if ($this->filesystem->exists($filePath)) {
            $this->filesystem->remove($filePath);
        }
    }
}