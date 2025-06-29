<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Tiketmu</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    :root {
      --primary: #2878EB;
      --light: #ECF4FF;
      --dark: #120F2D;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Open Sans', sans-serif;
      background-color: var(--light);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .login-container h2 {
      text-align: center;
      color: var(--primary);
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: 600;
      margin-bottom: 5px;
      display: block;
      color: var(--dark);
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .form-group input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 5px rgba(40, 120, 235, 0.3);
    }

    .btn-login {
      width: 100%;
      padding: 10px;
      background-color: var(--primary);
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn-login:hover {
      background-color: #1154b6;
    }

    .login-footer {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .login-footer a {
      color: var(--primary);
      text-decoration: none;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

    .alert {
      padding: 12px;
      margin-bottom: 15px;
      border-radius: 5px;
      font-size: 14px;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .alert-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .alert ul {
      margin: 0;
      padding-left: 20px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login to Tiketmu</h2>
    
    {{-- Menampilkan pesan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Menampilkan pesan sukses jika ada --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('login.process') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" id="email" name="email" 
               placeholder="Enter your email" 
               value="{{ old('email') }}" 
               required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" 
               placeholder="Enter your password" 
               required />
      </div>
      <button type="submit" class="btn-login">Login</button>
    </form>
    <div class="login-footer">
      Don't have an account? <a href="{{ url('/signup') }}">Sign up here</a><br>
      <a href="{{ url('/') }}">Back to Home</a>
    </div>
  </div>

</body>
</html>