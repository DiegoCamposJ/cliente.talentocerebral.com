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
        <link  rel="icon"   href={{ asset('img/favicon.png') }} type="image/png" />
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        {!!Html::style('css/vendors.bundle.css')!!}
        {!!Html::style('css/app.bundle.css')!!}
        
        
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href= {{ asset('img/favicon/apple-touch-icon.png') }}>
        <link rel="icon" type="image/png" sizes="32x32" href= {{ asset('img/favicon/favicon-32x32.png') }}>
        <link rel="mask-icon" href= {{ asset('img/favicon/safari-pinned-tab.svg') }}  color="#5bbad5">
        <!-- Optional: page related CSS-->
        
        {!!Html::style('css/page-login-alt.css')!!}
        {!!Html::style('css/fa-duotone.css')!!}
        

    </head>
    <body>
        <div class="blankpage-form-field">
            <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">            
            <a class="page-logo-link press-scale-down d-flex align-items-center">
                <i class="fad fa-brain fa-3x text-white"></i>
                    <span class="page-logo-text mr-1"><b>Cerebro360</b></span>
                </a>
            </div>
            <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
            @include('alerts.danger')
            @include('alerts.errors')
            {!!Form::open(['class'=>'form-horizontal', 'route' => ['persona.update',0], 'method' => 'PUT','files' => false])!!}
                
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="username">Usuario</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="help-block">
                            Usuario del sistema
                        </span>
                        
                    </div>                   
                    
                    <button type="submit" class="btn btn-primary btn-sm btn-block waves-effect waves-themed">
                        <span class="fad fa-lock-alt"></span>
                        Recuperar
                    </button>
                    <br>             
                {!!Form::close()!!}
                
                
            </div>

        </div>

        <video poster={{ asset('img/backgrounds/clouds.png') }} id="bgvid" playsinline autoplay muted loop>
            <source src= {{ asset('media/video/cc.webm') }} type="video/webm">
            <source src={{ asset('media/video/cc.mp4') }} type="video/mp4">
        </video>
       
        
        
        
        {{ HTML::script('js/vendors.bundle.js') }}
        {{ HTML::script('js/app.bundle.js') }}
        <!-- Page related scripts -->
    </body>
</html>
