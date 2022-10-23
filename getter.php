<!DOCTYPE html>
<html>

<head>
    <title>Upload file from URL</title>
</head>

<body>
    <style>
        html,
        body,
        .container {
            height: 100%;
            overflow: hidden;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .container {
            align-self: center;
        }

        input[type="text"], input[type="password"] {
            height: 2rem;
            padding-left: 1rem;
            margin: .3rem;
        }

        #url {
            margin-top: 2rem;
        }

        input[type="submit"] {
            height: 3rem;
            width: 6rem;
            margin: 2rem 9rem;
        }

        #result {
            font-family: Roboto;
        }
    </style>
    <div class="container">
        <div class="wrapper">
            <?php
            $checkpost = false;
            $BASE_URL = strtok($_SERVER['REQUEST_URI'], '?');
            if (isset($_POST['url'])) {
                $checkpost = true;
                $url = $_POST['url'];
                if (isset($_POST['filename'])) {
                    $filename = $_POST['filename'];
                } else {
                    $filename = "NewUpload";
                }
                if (isset($_POST['check'])) {
                    $check1 = $_POST['check'];
                    if ($check1 == '%mypass') {
                        define('BUFSIZ', 4095);
                        try {
                            $rfile = fopen($url, 'r');
                            $check2 = true;
                        } catch (Exception $e) {
                            $check2 = false;
                            echo 'Error Message : ' . $e->getMessage();
                        }
                        if ($check2) {
                            $lfile = fopen($filename, 'w');
                            while (!feof($rfile)) {
                                fwrite($lfile, fread($rfile, BUFSIZ), BUFSIZ);
                            }
                            fclose($rfile);
                            fclose($lfile);
                        }
                    }
                }
            }
            ?>
            <form name="upload" method="post" action="<?php echo $BASE_URL; ?>">
                <input type="text" id="url" name="url" size="150" placeholder="URL"><br>
                <input type="text" id="filename" name="filename" size="50" placeholder="File name"><br>
                <input type="password" id="check" name="check" size="50" placeholder="Are you human?"><br>
                <input type="submit" value="Upload">
            </form>
            <span id="result">
                <?php
                if ($checkpost) {
                    if ($check2) {
                        echo "Uploaded Successfully.";
                    } else {
                        echo "An error happend while uploading the file.";
                    }
                }
                ?>
            </span>
        </div>
    </div>
</body>

</html>








<!-- https://www.googleapis.com/drive/v3/files/FILEID/?key=GOOGLEAPIKEY&alt=media -->


<!-- y AIzaSyDXCexvPWhITGQto6nQizNx_s7ip9-NO9Y -->