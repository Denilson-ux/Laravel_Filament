<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduConnect - Conectando Escuelas y Familias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #7c3aed;
            --secondary-color: #64748b;
            --background-light: #f0f4ff;
            --background-dark: #0f172a;
            --text-light: #1e293b;
            --text-dark: #f1f5f9;
            --card-light: #ffffff;
            --card-dark: #1e293b;
            --border-light: #e2e8f0;
            --border-dark: #334155;
            --feature-bg-light: rgba(255, 255, 255, 0.15);
            --feature-bg-dark: rgba(30, 41, 59, 0.3);
            --shadow-light: 0 15px 40px rgba(0, 0, 0, 0.12);
            --shadow-dark: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }
        
        body {
            background: linear-gradient(135deg, var(--background-light) 0%, #e6f0ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--text-light);
        }
        
        body.dark-mode {
            background: linear-gradient(135deg, var(--background-dark) 0%, #1e293b 100%);
            color: var(--text-dark);
        }
        
        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            background: var(--card-light);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-light);
        }
        
        body.dark-mode .container {
            background: var(--card-dark);
            box-shadow: var(--shadow-dark);
        }
        
        .left-panel {
            flex: 1.8;
            padding: 50px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
        }
        
        .logo-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .logo-icon i {
            font-size: 24px;
            color: var(--primary-light);
        }
        
        .logo-text {
            font-size: 26px;
            font-weight: 700;
        }
        
        .title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
        }
        
        .description {
            font-size: 17px;
            margin-bottom: 40px;
            line-height: 1.6;
            opacity: 0.9;
            max-width: 500px;
        }
        
        .features {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .feature {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            background: var(--feature-bg-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .feature-icon i {
            font-size: 22px;
            color: white;
        }
        
        .feature-content {
            flex: 1;
        }
        
        .feature-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 6px;
        }
        
        .feature-description {
            font-size: 15px;
            opacity: 0.8;
            line-height: 1.5;
        }
        
        .graphic-elements {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 200px;
            height: 200px;
            overflow: hidden;
            opacity: 0.1;
        }
        
        .graphic-elements i {
            position: absolute;
            font-size: 180px;
        }
        
        .graphic-elements i:nth-child(1) {
            bottom: -40px;
            right: -40px;
        }
        
        .right-panel {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: var(--card-light);
            text-align: center;
            border-left: 1px solid var(--border-light);
        }
        
        body.dark-mode .right-panel {
            background: var(--card-dark);
            border-left: 1px solid var(--border-dark);
        }
        
        .right-panel h2 {
            font-size: 28px;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        body.dark-mode .right-panel h2 {
            color: var(--primary-light);
        }
        
        .right-panel p {
            color: var(--secondary-color);
            margin-bottom: 35px;
            line-height: 1.6;
            max-width: 300px;
        }
        
        .auth-buttons {
            display: flex;
            flex-direction: column;
            gap: 16px;
            width: 100%;
            max-width: 280px;
        }
        
        .btn {
            display: block;
            padding: 16px 24px;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(79, 70, 229, 0.35);
        }
        
        .btn-secondary {
            background: var(--card-light);
            color: var(--primary-color);
            border: 2px solid var(--border-light);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        body.dark-mode .btn-secondary {
            background: var(--card-dark);
            color: var(--primary-light);
            border: 2px solid var(--border-dark);
        }
        
        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }
        
        body.dark-mode .btn-secondary:hover {
            background: #334155;
            border-color: #475569;
        }
        
        .theme-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
            color: var(--primary-color);
        }
        
        body.dark-mode .theme-toggle {
            background: var(--card-dark);
            color: var(--primary-light);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        
        @media (max-width: 968px) {
            .container {
                flex-direction: column;
            }
            
            .left-panel, .right-panel {
                padding: 40px 30px;
            }
            
            .title {
                font-size: 32px;
            }
            
            .right-panel {
                border-left: none;
                border-top: 1px solid var(--border-light);
            }
            
            body.dark-mode .right-panel {
                border-top: 1px solid var(--border-dark);
            }
        }
        
        @media (max-width: 576px) {
            .left-panel, .right-panel {
                padding: 30px 20px;
            }
            
            .title {
                font-size: 28px;
            }
            
            .logo-text {
                font-size: 22px;
            }
            
            .feature {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .feature-icon {
                align-self: center;
            }
            
            .theme-toggle {
                top: 10px;
                right: 10px;
                width: 35px;
                height: 35px;
            }
        }
    </style>
</head>
<body>
    <button id="theme-toggle" class="theme-toggle" title="Cambiar a modo oscuro">
        <i class="fas fa-moon"></i>
    </button>
    
    <div class="container">
        <div class="left-panel">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="logo-text">EduConnect</div>
            </div>
            
            <h1 class="title">Conectando Escuelas y Familias</h1>
            
            <p class="description">
                EduConnect es la plataforma que facilita la comunicación en tiempo real entre docentes y padres de familia, mejorando la experiencia educativa de todos los estudiantes.
            </p>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="feature-content">
                        <div class="feature-title">Avisos Instantáneos</div>
                        <p class="feature-description">Envía y recibe avisos importantes de manera inmediata y organizada.</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="feature-content">
                        <div class="feature-title">Recordatorios</div>
                        <p class="feature-description">Mantén a las familias informadas sobre fechas importantes y eventos.</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="feature-content">
                        <div class="feature-title">Reportes Académicos</div>
                        <p class="feature-description">Compara el progreso académico y comportamental de los estudiantes.</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="feature-content">
                        <div class="feature-title">Comunicación Directa</div>
                        <p class="feature-description">Facilita la comunicación entre docentes y padres de familia.</p>
                    </div>
                </div>
            </div>
            
            <div class="graphic-elements">
                <i class="fas fa-school"></i>
            </div>
        </div>
        
        <div class="right-panel">
            <h2>Bienvenido</h2>
            <p>Accede a tu cuenta o regístrate para comenzar</p>
            
            <div class="auth-buttons">
                <a href="{{ route('filament.dashboard.auth.login') }}" class="btn btn-primary">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="btn btn-secondary">
                    Registrarse
                </a>
            </div>
        </div>
    </div>

    <script>
        // Comprobar el modo al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            const savedMode = localStorage.getItem('theme-mode');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedMode === 'dark' || (!savedMode && systemDark)) {
                enableDarkMode();
            } else {
                enableLightMode();
            }
            
            // Añadir el event listener al conmutador
            document.getElementById('theme-toggle').addEventListener('click', toggleTheme);
        });

        function toggleTheme() {
            if (document.body.classList.contains('dark-mode')) {
                enableLightMode();
            } else {
                enableDarkMode();
            }
        }

        function enableDarkMode() {
            document.body.classList.add('dark-mode');
            localStorage.setItem('theme-mode', 'dark');
            updateToggleButton(true);
        }

        function enableLightMode() {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('theme-mode', 'light');
            updateToggleButton(false);
        }

        function updateToggleButton(isDark) {
            const toggleBtn = document.getElementById('theme-toggle');
            if (isDark) {
                toggleBtn.innerHTML = '<i class="fas fa-sun"></i>';
                toggleBtn.title = 'Cambiar a modo claro';
            } else {
                toggleBtn.innerHTML = '<i class="fas fa-moon"></i>';
                toggleBtn.title = 'Cambiar a modo oscuro';
            }
        }
    </script>
</body>
</html>