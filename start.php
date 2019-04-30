<html>
    <head>
        <title>Hangman</title>
        <style>
            body


            #letters
            {
                font-weight:bold;
                border:1px solid black;
                padding:10px;
                max-width:300px;
                background:#eee;
            }

            .letter
            {
                font-size:20px;
                font-weight:bold;
                margin:0 10px;
                cursor:pointer;
                padding:0 10px;
                float:left;
                width:30px;
                border:1px solid transparent;
            }

            .letter:hover
            {
                background:yellow;
                border:1px solid red;
            }

            .clear
            {
                clear:both;
            }

            #hangman-div
            {
                border: 1px solid black;
                max-width:1100px;
                margin:0 auto;
                background:white;
                padding:20px;
            }

            #hangman-div > div:nth-child(1)
            {
                width:30%;
                float:left;
            }

            #hangman-div > div:nth-child(2)
            {
                width:20%;
                float:left;
                padding:20px;
            }

            #hangman-div > div:nth-child(3)
            {
                width:40%;
                float:left;
                padding:20px;
            }

            #lives-left-div
            {
                padding:20px;
                font-size:35px;
            }

            #lives-left
            {
                font-weight:bold;
                font-size:40px;
            }

            #hangman
            {
                border:1px solid black;
            }

            #guessed-word-div
            {
                text-align:left;
                font-size:50px;
                font-weight:bold;
            }

            #the-word-was-div
            {
                font-size:30px;
                margin-top:40px;;
                text-align:center;
            }

            #play-again-div
            {
                font-size:30px;
                margin-top:40px;
                text-align:center;
            }

            .display-none
            {
                display:none;
            }

            .guessed-letter
            {
                margin:0px 5px;
                display:inline-block;
            }

            #credits
            {
                text-align:center;
                margin-top:20px;
                font-family:verdana;
            }

            #credits a
            {
		text-decoration:none;
		color:purple;
            }

            @media all and (max-width:500px)
            {
                #hangman-div > div:nth-child(1), #hangman-div > div:nth-child(2), #hangman-div > div:nth-child(3)
                {
                    float:none;
                    width:100%;
                }
            }
        </style>
    </head>
    <body>
        <div id="hangman-div">
            <div>
                Escoger una letra:
                <div id="letters">
                    <?php
                    foreach (range('A', 'Z') as $char) {
                        echo '<span class="letter">' . $char . '</span>';
                    }
                    ?>
                    <div class="clear"></div>
                </div>
                <div id="lives-left-div">
                    Vidas: <span id="lives-left"><?= $_SESSION['lives'] ?></span>
                </div>
            </div>
            <div>
                <img src="images/hangman/0.jpg" id="hangman" alt="hangman"/>
            </div>
            <div>
                <div id="guessed-word-div">
                    <?= $blankWord ?>
                </div>
                <div id="the-word-was-div" class="display-none"></div>
                <div id="play-again-div" class="display-none">
                    <a href="index.php">Jugar de nuevo?</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>

        <script src="js/jquery-2.1.3.min.js"></script>
        <script>




          

            var winOrLose = false;

            $(".letter").click(function(){
                $.ajax({
                    data: {letter: $(this).text(), action: 2},
                    type: "POST",
                    dataType: "json",
                    url: "controller.php",
                    context: this,
                    success: function(data){
                        if(!winOrLose)
                        {
                            if(data.win == null)
                            {
                                $("#hangman").attr("src",data.image);
                                $("#lives-left").text(data.lives);
                                $("#guessed-word-div").html(data.guessedWord);
                                $(this).addClass("display-none");
                                blop_audio.play();
                            }
                            else
                            {
                                if(data.win == false)
                                {
                                    winOrLose = true;
                                    $("#lives-left").text(data.lives);
                                    $("#hangman").attr("src",data.image);
                                    $("#the-word-was-div").html(data.word);
                                    $("#the-word-was-div").removeClass("display-none");
                                    $("#play-again-div").removeClass("display-none");
                                    boo_audio.play();
                                }
                                else
                                {
                                    winOrLose = true;
                                    $("#guessed-word-div").html(data.guessedWord);
                                    $("#play-again-div").removeClass("display-none");
                                    applause_audio.play();
                                }
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert(textStatus);
                    }
                });
            });
        </script>
    </body>
</html>
