<?php

function recursiveChmod ($path, $filePerm=0644, $dirPerm=0777) {
    // Check if the path exists
    if (!file_exists($path)) {
        return(false);
    }

    // See whether this is a file
    if (is_file($path)) {
        // Chmod the file with our given filepermissions
        chmod($path, $filePerm);

        // If this is a directory...
    } elseif (is_dir($path)) {
        // Then get an array of the contents
        $foldersAndFiles = scandir($path);

        // Remove "." and ".." from the list
        $entries = array_slice($foldersAndFiles, 2);

        // Parse every result...
        foreach ($entries as $entry) {
            // And call this function again recursively, with the same permissions
            recursiveChmod($path."/".$entry, $filePerm, $dirPerm);
        }

        // When we are done with the contents of the directory, we chmod the directory itself
        chmod($path, $dirPerm);
    }

    // Everything seemed to work out well, return true
    return(true);
}