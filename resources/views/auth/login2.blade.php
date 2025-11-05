<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Cerebro360 - Cliente
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link  rel="icon"   href="img/favicon.png" type="image/png" />
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="css/page-login-alt.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-duotone.css">
        <style>
            #login-cliente {
                position: fixed !important;
                right: 1.5rem;
                bottom: 1.5rem;
                top: auto !important;
                left: auto !important;
                transform: none !important;
                -webkit-transform: none !important;
            }
        </style>
    </head>
    <body>        
        <div id="login-cliente" class="blankpage-form-field">
            <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <a class="page-logo-link press-scale-down d-flex align-items-center">
                <i class="fad fa-brain fa-3x text-white"></i>
                    <span class="page-logo-text mr-1"><b>Cerebro360</b></span>
                </a>
            </div>
            <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                @include('alerts.success')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="username">Usuario</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="usuario o email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="help-block">
                            Usuario
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Contraseña</label>

                        <input id="password" type="password" placeholder="contraseña" value="" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm btn-block waves-effect waves-themed">
                        <span class="fad fa-lock-alt"></span>
                        Ingresar
                    </button>
                    <br><br>

                </form>
                {{ link_to_route('persona.edit', $title = 'Recuperar Constraseña', $parameters = [1], $attributes = ['class' => 'btn btn-outline-primary btn-xs btn-block waves-effect waves-themed float-right']) }}
            </div>

        </div>

        <video poster="img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
            <source src="media/video/cerebro.webm" type="video/webm">            
        </video>
       
        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <!-- Page related scripts -->
    </body>
</html>
