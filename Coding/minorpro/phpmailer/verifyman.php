<?php
    include('object.php');
    if(isset($_POST['submit'])&&! empty($_POST['submit']))
    {
        $id=$_GET['id'];
        // echo $id;
        $otp_verify=$_POST['otp'];
        $sql=mysqli_query($con,"SELECT * FROM `info_tab` WHERE id='$id'");
        $sqli=mysqli_fetch_array($sql);
        $sqli['otp_verify'];
        if ($sqli['otp_verify']==$otp_verify)
        {
            header("location:confirm.php?id=$id");
        }
        else
        {
            echo "<script type ='text/JavaScript'>
            alert('Enter correct otp!');
            </script>"; 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Captcha</title>
    </head>
    <style>
    /* @import url('https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap&apos;); */
        body {
            background-color:rgba(238, 234, 234, 0.781);
            /* font-family: &apos;Roboto&apos;, sans-serif; */
        }
        #captchaBackground {
            height: 220px;
            width: 250px;
            background-color:  #788aa8;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        #captchaHeading {
            color: #151a24;
        }
        #captcha {
            height: 80%;
            width: 80%;
            font-size: 30px;
            letter-spacing: 3px;
            margin: auto;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .center {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #submitButton {
            margin-top: 2em;
            margin-bottom: 2em;
            background-color: #08e5ff;
            border: 0px;
            font-weight: bold;
        }
        #refreshButton {
            background-color: #08e5ff;
            border: 0px;
            font-weight: bold;
        }
        #textBox {
            height: 25px;
        }
        .incorrectCaptcha {
            color: #FF0000;
        }
        .correctCaptcha {
            color: #7FFF00;
        }
    </style>
    <body>
        <form method="post" class="form-login">
            <div class="center">
                <h1 id="captchaHeading">
                    Quick Verification
                </h1>
                <div id="captchaBackground">
                    <canvas id="captcha">captcha text</canvas>
                    <input id="textBox" type="text" name="text" placeholder="Enter captcha" required><br><br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="otp" id="OTP" aria-describedby="emailHelp" placeholder="Enter OTP" required >
                    </div>
                    <div id="buttons">
                        <input id="submitButton" type="submit" name="submit">
                        <button id="refreshButton" type="submit">Refresh</button>
                        <div>
                            <a href="Login.php" class="forget">Back</a>
                        </div>
                    </div>
                    <span id="output"></span>
                </div>
                <br><br>
            <div>
            <!-- <div class="form-group">
                <input type="text" class="form-control" name="otp" id="OTP" aria-describedby="emailHelp" placeholder="Enter OTP" required >
            </div> -->
            <br><br>
		    <!-- <input type="submit" class="btn btn-primary btn-lg" id="verify-otp" name="verify-otp" value="Verify OTP" /> -->
	    </form>
    </body>
    <script>
        // document.querySelector() is used to select an element from the document using its ID
        let captchaText = document.querySelector('#captcha');
        var ctx = captchaText.getContext("2d");
        ctx.font = "30px Roboto";
        ctx.fillStyle = "#08e5ff";

        let userText = document.querySelector('#textBox');
        let submitButton = document.querySelector('#submitButton');
        let output = document.querySelector('#output');
        let refreshButton = document.querySelector('#refreshButton');

        // alphaNums contains the characters with which you want to create the CAPTCHA
        let alphaNums = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        let emptyArr = [];
        // This loop generates a random string of 7 characters using alphaNums
        // Further this string is displayed as a CAPTCHA
        for (let i = 1; i <= 7; i++) {
            emptyArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
        }
        var c = emptyArr.join('');
        ctx.fillText(emptyArr.join(''),captchaText.width/4, captchaText.height/2);

        // This event listener is stimulated whenever the user press the "Enter" button
        // "Correct!" or "Incorrect, please try again" message is
        // displayed after validating the input text with CAPTCHA
        userText.addEventListener('keyup', function(e) {
            // Key Code Value of "Enter" Button is 13
            if (e.keyCode === 13) {
                if (userText.value === c) {
                    output.classList.add("correctCaptcha");
                    output.innerHTML = "Correct!";
                } else {
                    output.classList.add("incorrectCaptcha");
                    output.innerHTML = "Incorrect, please try again";
                }
            }
        });
        // This event listener is stimulated whenever the user clicks the "Submit" button
        // "Correct!" or "Incorrect, please try again" message is
        // displayed after validating the input text with CAPTCHA
        submitButton.addEventListener('click', function() {
            if (userText.value === c) {
                output.classList.add("correctCaptcha");
                output.innerHTML = "Correct!";
            } else {
                output.classList.add("incorrectCaptcha");
                output.innerHTML = "Incorrect, please try again";
            }
        });
        // This event listener is stimulated whenever the user press the "Refresh" button
        // A new random CAPTCHA is generated and displayed after the user clicks the "Refresh" button
        refreshButton.addEventListener('click', function() {
            userText.value = "";
            let refreshArr = [];
            for (let j = 1; j <= 7; j++) {
                refreshArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
            }
            ctx.clearRect(0, 0, captchaText.width, captchaText.height);
            c = refreshArr.join('');
            ctx.fillText(refreshArr.join(''),captchaText.width/4, captchaText.height/2);
            output.innerHTML = "";
        });
    </script>
</html>