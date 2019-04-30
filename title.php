<html>
    <head>
        <title>Hangman</title>
        <style>
            .center
            {
                text-align:center;
            }
            #logo
            {
                max-width:100%;
                vertical-align:middle;
                text-align:center;
            }
            #levels-div
            {
                text-align:left;
                max-width:400px;
                margin:0 auto;
                text-align:center;
            }

            #submit-button
            {
                width:200px;
                height:50px;
                font-weight:bold;
                margin:20px 0px;
            }

            label
            {
                color:black;
                text-align:center;
            }


        </style>
    </head>
    <body>
         <div id="hangman-div">
            <form action="controller.php" method="POST">
               <input type="hidden" name="action" value="1" />
               <center><img src="images/logo.png" id="logo" /></center>
                              <div class="center">
                    <div id="levels-div">
                        <span id="level">
                            <input type="radio" name="level" checked="checked" id="level_0" value="0">
                                <label for="level_0">Facil: 6 vidas.</label><br>
                            <input type="radio" name="level" id="level_1" value="1">
                                <label for="level_1">Medio: 5 vidas.</label><br>
                            <input type="radio" name="level" id="level_2" value="2">
                                <label for="level_2">Dificil: 4 vidas.</label>
                         </span>
                    </div>
                    <div>
                        <input type="submit" value="Jugar!" id="submit-button" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
