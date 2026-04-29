<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Ahli Waris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
            font-family: "Poppins", Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #e9ecef;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .login-card {
            width: 100%;
            max-width: 1100px;
            background-color: #ffffff;
            border-radius: 20px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        /* Panel kiri */
        .left-panel {
            width: 40%;
            background-color: #003366; /* biru tua */
            color: #ffffff;
            padding: 40px 45px;
            display: flex;
            flex-direction: column;
        }
.left-logo {
    width: 100px; /* Ukuran lebar logo */
    height: 100px; /* Ukuran tinggi logo */
    border-radius: 10px;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: #003366;
    overflow: hidden; /* Untuk memastikan gambar tetap berada di dalam elemen */
}

.left-logo img {
    width: 100%;
    height: auto; /* Menjaga rasio proporsional gambar */
    object-fit: contain; /* Membuat gambar tetap proporsional dalam batas area logo */
}


        .left-title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 16px;
            line-height: 1.4;
        }

        .left-subtitle {
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .feature-list {
            margin-top: 10px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 18px;
        }

        .feature-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 2px solid #f4c430;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: #f4c430;
            font-size: 18px;
        }

        .feature-text {
            font-size: 13px;
            line-height: 1.6;
        }

        .left-footer {
            margin-top: auto;
            font-size: 13px;
            opacity: 0.8;
        }

        /* Panel kanan */
        .right-panel {
            width: 60%;
            padding: 40px 55px;
        }

        .right-title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #152238;
        }

        .right-subtitle {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: #212529;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 11px 14px;
            border-radius: 6px;
            border: 1px solid #ced4da;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 2px rgba(0, 86, 179, 0.15);
        }

        .error-text {
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
        }

        /* Captcha */
        .captcha-box {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 18px 20px;
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .captcha-title {
            font-size: 13px;
            font-weight: 600;
            color: #495057;
            margin-bottom: 4px;
        }

        .captcha-row {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .captcha-code {
            background-color: #003366;
            color: #ffffff;
            border-radius: 6px;
            padding: 10px 24px;
            font-family: "Courier New", monospace;
            letter-spacing: 2px;
            font-size: 16px;
            font-weight: 700;
        }

        .captcha-input {
            flex: 1;
        }

        .captcha-refresh {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 18px;
            color: #c58b00;
            background-color: #ffffff;
        }

        .btn-submit {
            width: 100%;
            margin-top: 24px;
            padding: 12px 16px;
            border: none;
            border-radius: 6px;
            background-color: #003366;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.05s ease;
        }

        .btn-submit:hover {
            background-color: #00254f;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        @media (max-width: 900px) {
            .login-card {
                flex-direction: column;
            }

            .left-panel,
            .right-panel {
                width: 100%;
            }

            .left-panel {
                border-radius: 20px 20px 0 0;
            }

            .right-panel {
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <div class="login-card">
        <!-- Panel kiri -->
        <div class="left-panel">
            <div class="left-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <div class="left-title">
                Selamat Datang di Sistem Ahli Waris
            </div>

            <div class="left-subtitle">
                Panel administrasi untuk mengelola dan memproses pembagian warisan sesuai
                ketentuan hukum yang berlaku.
            </div>

            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-icon">⚖</div>
                    <div class="feature-text">
                        Perhitungan pembagian waris sesuai hukum.
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">👥</div>
                    <div class="feature-text">
                        Manajemen data ahli waris terintegrasi.
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">📄</div>
                    <div class="feature-text">
                        Generasi dokumen hukum lengkap.
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">🛡</div>
                    <div class="feature-text">
                        Keamanan data terjamin.
                    </div>
                </div>
            </div>

            <div class="left-footer">
                &copy; {{ date('Y') }} Sistem Ahli Waris. Semua hak dilindungi.
            </div>
        </div>

        <!-- Panel kanan -->
        <div class="right-panel">
            <h1 class="right-title">Masuk Ke Akun</h1>
            <p class="right-subtitle">
                Silahkan masukkan kredensial Anda untuk mengakses sistem.
            </p>

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <input
                        id="username"
                        type="text"
                        name="username"
                        class="form-control"
                        value="{{ old('username') }}"
                        placeholder="Username..."
                        autofocus
                    >
                    @error('username')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Password..."
                    >
                    @error('password')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="captcha-box">
                    <div class="captcha-title">Verifikasi Keamanan</div>
                    <div class="captcha-row">
                        <div id="captchaCode" class="captcha-code">
                            {{ session('security_code') }}
                        </div>

                        <div class="captcha-input">
                            <input
                                id="security_code"
                                type="text"
                                class="form-control"
                                placeholder="Masukkan Kode..."
                                name="security_code"
                            >
                            @error('security_code')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="button" id="refreshCaptcha" class="captcha-refresh" aria-label="Refresh kode">
                            &#8635;
                        </button>
                    </div>
                    <!--
                      Catatan:
                      Ini hanya tampilan. Kalau mau captcha beneran,
                      nanti bisa pakai package seperti mews/captcha atau Google reCAPTCHA.
                    -->
                </div>

                <button type="submit" class="btn-submit">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</div>

</body>
<script>
    (function() {
        var btn = document.getElementById('refreshCaptcha');
        if (!btn) return;
        btn.addEventListener('click', function() {
            fetch('{{ route('security_code.refresh') }}', {
                method: 'GET',
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(function(res) { return res.json(); })
            .then(function(data) {
                var el = document.getElementById('captchaCode');
                if (el && data && data.code) {
                    el.textContent = data.code;
                }
                var input = document.getElementById('security_code');
                if (input) { input.value = ''; input.focus(); }
            })
            .catch(function() {
                // Optional: show a small visual feedback if needed
            });
        });
    })();
</script>
</html>
