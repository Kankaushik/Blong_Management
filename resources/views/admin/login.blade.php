<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - GovtAlerts</title>
    
    <!-- CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS Variables -->
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #064e3b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 15px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card-header-accent {
            background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
            color: #ffffff;
            padding: 35px 20px;
            text-align: center;
        }

        .form-container {
            padding: 40px 35px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1.5px solid #cbd5e1;
            font-size: 15px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
            outline: none;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            border: none;
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(16, 185, 129, 0.35);
            filter: brightness(1.05);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .brand-icon {
            font-size: 42px;
            margin-bottom: 8px;
            display: inline-block;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.08); }
            100% { transform: scale(1); }
        }
    </style>
</head>

<body>

    <div class="login-card">
        <!-- Accent Header -->
        <div class="card-header-accent">
            <span class="brand-icon"><i class="bi bi-shield-lock"></i></span>
            <h3 class="fw-bold mb-0">GovtAlerts</h3>
            <p class="mb-0 text-white-50 fs-6 mt-1">Administration Panel Login</p>
        </div>

        <!-- Form Box -->
        <div class="form-container">
            <!-- Session Error Alerts -->
            @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center gap-2 border-0 rounded-3" role="alert" style="background-color: #fef2f2; color: #b91c1c; font-size: 14px;">
                <i class="bi bi-exclamation-octagon fs-5"></i>
                <div>{{ session('error') }}</div>
            </div>
            @endif

            <form action="/admin/login" method="POST">
                @csrf

                <!-- Email Input -->
                <div class="mb-3">
                    <label class="form-label text-secondary fw-semibold mb-1" style="font-size: 13.5px;">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0" style="border-radius: 12px 0 0 12px;"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control border-start-0" placeholder="admin@govalerts.com" required style="border-radius: 0 12px 12px 0;">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label class="form-label text-secondary fw-semibold mb-1" style="font-size: 13.5px;">Security Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0" style="border-radius: 12px 0 0 12px;"><i class="bi bi-key"></i></span>
                        <input type="password" name="password" class="form-control border-start-0" placeholder="••••••••" required style="border-radius: 0 12px 12px 0;">
                    </div>
                </div>

                <!-- Action Button -->
                <button type="submit" class="btn btn-login w-100 btn-lg">
                    Verify & Sign In <i class="bi bi-arrow-right-short ms-1"></i>
                </button>
            </form>
        </div>
    </div>

</body>

</html>