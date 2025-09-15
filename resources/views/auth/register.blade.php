<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - EduConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            if (document.documentElement.classList.contains('dark')) {
                enableLightMode();
            } else {
                enableDarkMode();
            }
        }

        function enableDarkMode() {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme-mode', 'dark');
            updateToggleButton(true);
        }

        function enableLightMode() {
            document.documentElement.classList.remove('dark');
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
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --bg-primary: #ffffff;
            --bg-secondary: #f9fafb;
            --border-color: #e5e7eb;
        }

        .dark {
            --primary-color: #60a5fa;
            --primary-hover: #3b82f6;
            --text-primary: #f3f4f6;
            --text-secondary: #d1d5db;
            --bg-primary: #111827;
            --bg-secondary: #1f2937;
            --border-color: #374151;
        }

        body {
            background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--border-color) 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-primary);
            transition: background-color 0.3s, color 0.3s;
        }

        .form-container {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background-color: var(--bg-primary);
            transition: background-color 0.3s;
        }

        .input-field {
            transition: all 0.3s ease;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            border-color: var(--border-color);
        }

        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .logo {
            color: var(--primary-color);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .theme-toggle {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 50%;
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <button id="theme-toggle" class="theme-toggle" title="Cambiar a modo oscuro">
        <i class="fas fa-moon"></i>
    </button>
    
    <div class="form-container p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <i class="fas fa-graduation-cap text-4xl logo mb-2"></i>
            <h2 class="text-3xl font-bold">EduConnect</h2>
            <p class="text-secondary mt-2">Crear nueva cuenta</p>
        </div>
        
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium mb-1">Nombre Completo</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input type="text" id="name" name="name" class="input-field pl-10 mt-1 block w-full px-3 py-3 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required autofocus placeholder="Ingresa tu nombre completo">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium mb-1">Correo Electrónico</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" id="email" name="email" class="input-field pl-10 mt-1 block w-full px-3 py-3 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required placeholder="correo@ejemplo.com">
                </div>
            </div>

            <div>
                <label for="type" class="block text-sm font-medium mb-1">Rol</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user-tag text-gray-400"></i>
                    </div>
                    <select id="type" name="type" class="input-field pl-10 mt-1 block w-full px-3 py-3 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="">Selecciona tu rol</option>
                        <option value="docente">Docente</option>
                        <option value="parent">Padre de Familia</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">Contraseña</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" id="password" name="password" class="input-field pl-10 mt-1 block w-full px-3 py-3 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required placeholder="Crea una contraseña segura">
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirmar Contraseña</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input-field pl-10 mt-1 block w-full px-3 py-3 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required placeholder="Repite tu contraseña">
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm">Acepto los <a href="#" class="text-blue-600 hover:text-blue-500">términos y condiciones</a></label>
            </div>

            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300">
                Crear Cuenta
            </button>
        </form>

        <div class="mt-6 text-center text-sm">
            <p>¿Ya tienes una cuenta?</p>
            <a href="{{ route('filament.dashboard.auth.login') }}" class="font-medium text-blue-600 hover:text-blue-500 mt-2 inline-block">Inicia sesión aquí</a>
        </div>
    </div>

    <script>
        // Sincronizar con Filament si está en el mismo dominio
        function syncThemeWithFilament() {
            // Intentar detectar si Filament tiene el modo oscuro activado
            // Esto funcionará si tus páginas están en el mismo dominio que el panel de Filament
            try {
                const filamentTheme = localStorage.getItem('filament-dark-mode');
                if (filamentTheme !== null) {
                    if (filamentTheme === 'true') {
                        enableDarkMode();
                    } else {
                        enableLightMode();
                    }
                }
            } catch (e) {
                console.log('No se pudo sincronizar con el tema de Filament');
            }
        }

        // Llamar a la sincronización al cargar
        document.addEventListener('DOMContentLoaded', syncThemeWithFilanticons);
    </script>
</body>
</html>