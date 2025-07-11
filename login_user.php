<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Rumah Sakit</title>
    <style>
        /* Reset dan dasar */
        * {
            box-sizing: border-box;
            margin: 0; padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            padding: 30px 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #34495e;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .error-msg {
            background: #e74c3c;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
            font-weight: 600;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1.8px solid #bdc3c7;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #2980b9;
            outline: none;
        }

        button {
            width: 100%;
            background-color: #2980b9;
            border: none;
            color: white;
            padding: 14px 0;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1c5980;
        }

        .register-text {
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
            color: #34495e;
        }

        .register-text a {
            color: #2980b9;
            text-decoration: none;
            font-weight: 600;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .password-wrapper {
            position: relative;
            margin-bottom: 20px;
            width: 100%;
        }
        .password-wrapper input[type="password"],
        .password-wrapper input[type="text"] {
            width: 100%;
            padding: 12px 15px;      /* Samakan dengan input email */
            padding-right: 44px;     /* Untuk ruang icon mata */
            margin-bottom: 20px;
            height: 44px;
            box-sizing: border-box;
            border: 1.8px solid #bdc3c7;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s ease;
            vertical-align: middle;
            text-align: left;        /* Samakan dengan input email */
            background: #fff;        /* Samakan dengan input email jika perlu */
        }
        .toggle-password {
            position: absolute;
            right: 16px; /* Lebih ke dalam agar tidak terlalu mepet */
            top: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            height: 44px;
            cursor: pointer;
        }
        .toggle-password svg {
            display: block;
            height: 22px;
            width: 22px;
        }

        @media(max-width: 480px) {
            .login-container {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Rumah Sakit</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-msg"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <form action="login_process_user.php" method="POST" autocomplete="off">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan email" />

            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" required placeholder="Masukkan password" />
                <span id="togglePassword" class="toggle-password">
                    <!-- Mata terbuka SVG -->
                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24">
                        <path stroke="#34495e" stroke-width="2" d="M1.5 12S5.5 5.5 12 5.5 22.5 12 22.5 12 18.5 18.5 12 18.5 1.5 12 1.5 12Z"/>
                        <circle cx="12" cy="12" r="3.5" stroke="#34495e" stroke-width="2"/>
                    </svg>
                    <!-- Mata tertutup SVG (hidden default) -->
                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" style="display:none;">
                        <path stroke="#34495e" stroke-width="2" d="M3 3l18 18M1.5 12S5.5 5.5 12 5.5c2.2 0 4.1.6 5.7 1.5M22.5 12S18.5 18.5 12 18.5c-2.2 0-4.1-.6-5.7-1.5"/>
                        <circle cx="12" cy="12" r="3.5" stroke="#34495e" stroke-width="2"/>
                    </svg>
                </span>
            </div>

            <button type="submit">Masuk</button>
        </form>
        <p class="register-text">
            Belum punya akun? <a href="register.php">Daftar di sini</a>
        </p>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            if (type === 'text') {
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'block';
            } else {
                eyeOpen.style.display = 'block';
                eyeClosed.style.display = 'none';
            }
        });
    </script>
</body>
</html>
