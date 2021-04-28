<!--Gallery Page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Simon Kevin</title>
        <link rel="stylesheet" href="stylepictures.css">
        <link rel="stylesheet" href="scriptpicturesup.js">
    </head>
    <body>
        
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload Image" name="submit">
        </form>

        <div>
            <?php
                $dir = 'uploads';
                $ext_array = array(
                    'jpg',
                    'jpeg',
                    'png',
                    'gif'
                );

                if (file_exists($dir) == false) 
                {
                    echo 'Directory \'', $dir, '\' not found!';
                } 
                else
                {
                    $dir_contents = scandir($dir);

                    foreach ($dir_contents as $file) {
                        $tmp = explode('.', $file);
                        $file_type = strtolower(end($tmp));
                
                        if (in_array($file_type, $ext_array)) {
                            echo '<img src="', $dir, '/', $file, '" alt="', $file, '" />';
                        }
                    }
                }
            ?>
        </div>
    </body>
</html>