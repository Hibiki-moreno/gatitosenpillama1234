<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reparaciones - Iniciar Sesión</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1200px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        /* Panel izquierdo - Información del sistema */
        .info-panel {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .system-title {
            margin-bottom: 40px;
        }

        .system-title h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .system-title .badge {
            background: rgba(255, 255, 255, 0.2);
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .modules-section {
            flex: 1;
        }

        .modules-section h3 {
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .modules-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .module-category {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .module-category h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #ffd700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .module-category ul {
            list-style: none;
        }

        .module-category li {
            margin-bottom: 8px;
            font-size: 14px;
            opacity: 0.9;
            display: flex;
            align-items: center;
        }

        .module-category li:before {
            content: "•";
            color: #ffd700;
            font-weight: bold;
            margin-right: 8px;
        }

        /* Panel derecho - Login */
        .login-panel {
            padding: 60px 40px;
            background: white;
        }

        .login-header {
            margin-bottom: 40px;
        }

        .login-header h2 {
            color: #1e3c72;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #666;
            font-size: 14px;
        }

        @if(session('error'))
            .alert-error {
                background-color: #fee;
                color: #c33;
                padding: 15px;
                border-radius: 8px;
                margin-bottom: 30px;
                font-size: 14px;
                border-left: 4px solid #c33;
                display: flex;
                align-items: center;
            }
        @endif

        .google-login-section {
            margin-top: 20px;
        }

        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 15px 20px;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            color: #333;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .google-btn:hover {
            border-color: #1e3c72;
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(30, 60, 114, 0.2);
        }

        .google-btn img {
            width: 24px;
            height: 24px;
            margin-right: 12px;
        }

        .security-info {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e0e0e0;
        }

        .security-badge {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #666;
            font-size: 13px;
        }

        .security-badge span {
            font-size: 24px;
        }

        .security-features {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .security-feature {
            flex: 1;
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .security-feature .icon {
            font-size: 20px;
            display: block;
            margin-bottom: 8px;
        }

        .security-feature .text {
            font-size: 12px;
            color: #666;
        }

        .back-link {
            margin-top: 30px;
            text-align: center;
        }

        .back-link a {
            color: #1e3c72;
            text-decoration: none;
            font-size: 14px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .back-link a:hover {
            opacity: 1;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }
            
            .info-panel {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Panel izquierdo con información del sistema -->
        <div class="info-panel">
            <div class="system-title">
                <h1>Sistema de Reparaciones<br>Área Administrativa</h1>
                <span class="badge">Versión 2.0</span>
            </div>

            <div class="modules-section">
                <h3>Módulos del Sistema</h3>
                <div class="modules-grid">
                    <!-- CLIENTES -->
                    <div class="module-category">
                        <h4>CLIENTES</h4>
                        <ul>
                            <li>Listado</li>
                            <li>Nuevo Cliente</li>
                        </ul>
                    </div>

                    <!-- EQUIPOS -->
                    <div class="module-category">
                        <h4>EQUIPOS</h4>
                        <ul>
                            <li>Listado</li>
                            <li>Nuevo Equipo</li>
                        </ul>
                    </div>

                    <!-- TICKETS -->
                    <div class="module-category">
                        <h4>TICKETS</h4>
                        <ul>
                            <li>Listado</li>
                            <li>Nuevo Ticket</li>
                        </ul>
                    </div>

                    <!-- REPARADORES -->
                    <div class="module-category">
                        <h4>REPARADORES</h4>
                        <ul>
                            <li>Listado</li>
                            <li>Nuevo Reparador</li>
                        </ul>
                    </div>

                    <!-- MATERIALES -->
                    <div class="module-category">
                        <h4>MATERIALES</h4>
                        <ul>
                            <li>Listado</li>
                            <li>Nuevo Material</li>
                        </ul>
                    </div>

                    <!-- EVIDENCIAS -->
                    <div class="module-category">
                        <h4>EVIDENCIAS</h4>
                        <ul>
                            <li>Listado</li>
                            <li>Nueva Evidencia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel derecho - Login -->
        <div class="login-panel">
            <div class="login-header">
                <h2>Bienvenido</h2>
                <p>Accede al panel administrativo</p>
            </div>

            @if(session('error'))
                <div class="alert-error">
                    ⚠️ {{ session('error') }}
                </div>
            @endif

            <div class="google-login-section">
                <a href="{{ route('google.login') }}" class="google-btn">
                    <img src="https://www.google.com/favicon.ico" alt="Google">
                    Iniciar sesión con Google
                </a>

                <div class="security-info">
                    <div class="security-badge">
                        <span>🔒</span>
                        <div>Acceso seguro mediante Google Workspace</div>
                    </div>

                    <div class="security-features">
                        <div class="security-feature">
                            <span class="icon">🔐</span>
                            <span class="text">Autenticación 2FA</span>
                        </div>
                        <div class="security-feature">
                            <span class="icon">⚡</span>
                            <span class="text">Acceso rápido</span>
                        </div>
                        <div class="security-feature">
                            <span class="icon">🛡️</span>
                            <span class="text">SSL Seguro</span>
                        </div>
                    </div>
                </div>

                <div class="back-link">
                    <a href="{{ route('inicio') }}">← Volver al sitio principal</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>