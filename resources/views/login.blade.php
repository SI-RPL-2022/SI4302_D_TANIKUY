<html>
        <head>
            <title>

            </title> 
            <style>
                .btn-primary {
                    color: #8E6A4A; 
                }
            </style>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">     
            <script src="https://kit.fontawesome.com/b198f4fad2.js" crossorigin="anonymous"></script>        
        </head>
        <a type="submit" class="btn btn-lg" style="margin-top:35px; margin-left:15px;"><i class="fa-solid fa-chevron-left fa-2xl" style="color:white;"></i></a>
    <body id="example2" style="background-image:url('image/tanikuyblur.png'); background-repeat: no-repeat; background-size: 100% 100%;">
        <div class="container" align="center" style="margin-top:200px;" >
            <div class="col-12 col-md-12 col-lg-5 mb-4">
                <div class="input-group input-group-lg" > 
                    <span class="input-group-text" style="background-color:#8E6A4A;" id="inputGroup-sizing-lg"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control text-light" style="background-color:#3A4149; height:50px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Username">
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5 mb-5">
                <div class="input-group input-group-lg" > 
                    <span class="input-group-text" style="background-color:#8E6A4A;" id="inputGroup-sizing-lg"><i class="fa-solid fa-lock"></i></span>
                    <input type="text" class="form-control text-light" style="background-color:#3A4149; height:50px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Password" >
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-lg" style="background-color:#8E6A4A; height:50px; width: 100px;">SIGN IN</button>
            <br>
            <p style="color:#84E13C; font-size: 15px; margin-top:15px;">
                Not a member? <a href="{{ route('register')}}">Sign up now</a>
            </p>
        </div>
    </body>
</html>