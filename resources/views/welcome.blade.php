<!DOCTYPE html>
<html>
  <head>
    <title>Welcome to EG-bot</title>
    <link rel="stylesheet" href="css/app.css">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  </head>
  <body class="mainpage">
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="whitecol hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <button class="buttonlogin buttonlogin1"><a href="{{ url('/home') }}">Home</a></button>         
                    @else
                    <button class="buttonlogin buttonlogin1"><a href="{{ route('login') }}">Log in</a></button>                        
                        @if (Route::has('register'))
                            <button class="buttonlogin buttonlogin1"><a href="{{ route('register') }}">Register</a></button>
                            
                        @endif
                @endauth
            </div>
        @endif
        
        <!-- <div class="flex-container">
            <div> </div>
            <div>Your Mental Health Support</div>
            <div>EG-bot is available to anyone with an internet connection, allowing individuals to seek assistance no matter where they are or what their financial situation is. This chatbot provides tailored support that addresses users' specific mental health concerns. Using EG-bot is entirely confidential, meaning that users can seek help without worrying about judgment or shame.</div>  
        </div> -->
        
            <!-- <div class="flex main justify-center pt-8 sm:justify-start sm:pt-0">
               
                <div class= "logo">
                    
                    <div class= "logo3">
                    </div>
                    </div>
                </div>
            </div> -->

<!-- The App Section -->
<div class="containerhome">
  <div class="rowhome">
    <div class="columnhome-66">
    <img src="/images/LOGOEG.png" alt="LOGO" srcset="" height= 150, width= 200>
      <h1 class="largehome-font" style="color:MediumSeaGreen;"><b>Why use it?</b></h1>
      <div class= "logo2"><span style="fonthome-size:36px">It will be Your Mental Health Support</span></div>
      <p>EG-bot is available to anyone with an internet connection, allowing individuals to seek assistance no matter where they are or what their financial situation is. This chatbot provides tailored support that addresses users' specific mental health concerns. Using EG-bot is entirely confidential, meaning that users can seek help without worrying about judgment or shame.</p>
    </div>
  </div>
</div>

        </div>
    </div>
  </body>
</html>
