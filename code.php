<?php
function getFiles($path = '/var/www/html/videos') {

$videopath=str_replace("/var/www/html/", "", $path);

    // Open the path set
    if ($handle = opendir($path)) {

        // Loop through each file in the directory
        while ( false !== ($file = readdir($handle)) ) {

            // Remove the . and .. directories
            if ( $file != "." && $file != ".." ) {

                // Check to see if the file is a directory
                if( is_dir($path . '/' . $file) ) {

                    // The file is a directory, therefore run a dir check again
                    getFiles($path . '/' . $file);

                }

                // Get the information about the file
                $fileInfo = pathinfo($file);

                // Set multiple extension types that are allowed
                $allowedExtensions = array('mp4', 'webm');

                // Check to ensure the file is allowed before returning the results
                if( in_array($fileInfo['extension'], $allowedExtensions) ) {
                    $files[] = $file;
                }
            }
        }

        // Close the handle
        closedir($handle);

        natsort($files);

        foreach($files as $file) {
            echo '
        {
      name: "' . $file . '",
      description: "' . $file . '",
      duration: 45,
      sources: [
        { src: "https://gameram.xyz/' . $videopath . '/' . $file . '", type: "video/mp4" },
      ],
      // you can use <picture> syntax to display responsive images
    },';
        }
    }
}
?>

