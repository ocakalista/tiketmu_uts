<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <?php if(file_exists(public_path('css/style.css'))): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <?php endif; ?>
    <style>
        :root {
            --primary: #4285f4;
            --light: #f8f9fa;
            --dark: #333;
        }

        body {
            background-color: var(--light);
            font-family: 'Open Sans', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
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
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 5px rgba(66, 133, 244, 0.3);
        }

        .form-group input.is-invalid {
            border-color: #dc3545;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: var(--primary);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 16px;
        }

        .btn-login:hover {
            background-color: #3367d6;
        }

        .btn-login:disabled {
            background-color: #ccc;
            cursor: not-allowed;
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
            border-radius: 4px;
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

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 5px;
            font-size: 12px;
            color: #dc3545;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Create an Account</h2>
        
        
        <?php if($errors->any()): ?>
            <div class="alert alert-error">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('signup.store')); ?>" method="POST" id="signupForm">
            <?php echo csrf_field(); ?>
            
            <div class="form-group">
                <label for="fullname">Full Name <span style="color: red;">*</span></label>
                <input type="text" 
                       id="fullname" 
                       name="fullname" 
                       placeholder="Enter your full name" 
                       value="<?php echo e(old('fullname')); ?>" 
                       class="<?php echo e($errors->has('fullname') ? 'is-invalid' : ''); ?>"
                       required
                       autocomplete="name">
                <?php if($errors->has('fullname')): ?>
                    <div class="invalid-feedback"><?php echo e($errors->first('fullname')); ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address <span style="color: red;">*</span></label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       placeholder="Enter your email address" 
                       value="<?php echo e(old('email')); ?>" 
                       class="<?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                       required
                       autocomplete="email">
                <?php if($errors->has('email')): ?>
                    <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="password">Password <span style="color: red;">*</span></label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       placeholder="Create a password (min. 8 characters)" 
                       minlength="8"
                       class="<?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
                       required
                       autocomplete="new-password">
                <?php if($errors->has('password')): ?>
                    <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirm Password <span style="color: red;">*</span></label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       placeholder="Confirm your password" 
                       minlength="8"
                       class="<?php echo e($errors->has('password_confirmation') ? 'is-invalid' : ''); ?>"
                       required
                       autocomplete="new-password">
                <?php if($errors->has('password_confirmation')): ?>
                    <div class="invalid-feedback"><?php echo e($errors->first('password_confirmation')); ?></div>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn-login" id="submitBtn">
                <span id="btnText">Sign Up</span>
                <span id="btnLoader" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i> Creating Account...
                </span>
            </button>
        </form>

        <div class="login-footer">
            Already have an account? <a href="<?php echo e(route('login')); ?>">Login here</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('signupForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');

            // Password confirmation validation
            function validatePassword() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Passwords don't match");
                } else {
                    confirmPassword.setCustomValidity('');
                }
            }

            password.addEventListener('change', validatePassword);
            confirmPassword.addEventListener('keyup', validatePassword);

            // Form submission handling
            form.addEventListener('submit', function(e) {
                // Show loading state
                submitBtn.disabled = true;
                btnText.style.display = 'none';
                btnLoader.style.display = 'inline';
                
                // Re-enable button after 10 seconds (failsafe)
                setTimeout(function() {
                    submitBtn.disabled = false;
                    btnText.style.display = 'inline';
                    btnLoader.style.display = 'none';
                }, 10000);
            });

            // Remove invalid class on input focus
            const inputs = document.querySelectorAll('input');
            inputs.forEach(function(input) {
                input.addEventListener('focus', function() {
                    this.classList.remove('is-invalid');
                });
            });
        });
    </script>

</body>
</html><?php /**PATH /Users/macbookpro/Documents/Pemrograman/php/pemrog-web/tiketmu_uts/resources/views/SignUp.blade.php ENDPATH**/ ?>