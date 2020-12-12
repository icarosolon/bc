<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNIBC</title>
    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/bootstrap-grid.min') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/bootstrap-reboot.min') }}" rel="stylesheet">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('{{ asset('img/background01.jpg') }}');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #14A378;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #14A378;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #14A378;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
color: #14A378;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fas fa-hospital-alt"></i></span>
                        <span><i class="fas fa-brain"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="input-group form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="email" name="email" class="form-control" placeholder="usuário" required>   
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="input-group form-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="password" name="password" class="form-control" placeholder="senha" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <div class="row align-items-center remember">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Lembrar senha
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Entrar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Não tem uma conta?<a href="{{ route('register') }}">Cadastre-se</a>
                    </div>
                    <div class="d-flex justify-content-center links">
                        <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- jQuery -->
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/jquery-3.5.1.min') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min') }}"></script>
      <script src="{{ asset('js/bootstrap.min') }}"></script>
</body>
</html>