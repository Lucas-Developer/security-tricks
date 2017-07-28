<html>
        <title> SSRF Demo</title>
        <head>
                <meta charset="utf-8">
                <style>
                        body{
                                background-color: black;
                                color: white;
                        }
                        pre{
                                word-wrap:break-word;
                                white-space: pre-wrap;
                        }
                </style>
        </head>
        <body>
                <form action="" method="post">
                        <h2> HTML VIEWER </h2><p>
                        <input type="text" style="font-size: 14;width: 450px;" name="url" placeholder="http://example.com" />
                        <br>
                        <input type="submit" value="Submit">
                </form>
                <hr>
                <pre>
                <?php
                        if(empty($_POST['url'])) exit(1);
                        $url = $_POST['url'];
                        $student = file_get_contents($url);
                        echo htmlspecialchars($student, ENT_QUOTES);
                ?>
                </pre>
                </p>
        </body>
</html>
