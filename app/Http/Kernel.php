<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
           // 'throttle:api',
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'negar_acceso_editar_perfil' => \App\Http\Middleware\NegarAccesoEditarPerfil::class,
        'negar_acceso_editar_perfil_empresarial' => \App\Http\Middleware\NegarAccesoEditarPerfilEmpresarial::class,
        'negar_acceso_editar_factura_empresarial' => \App\Http\Middleware\NegarAccesoEditarFacturaEmpresarial::class,
        'negar_acceso_editar_factura_medico' => \App\Http\Middleware\NegarAccesoEditarFacturaMedico::class,
        'negar_acceso_pagando_perfil_empresarial' => \App\Http\Middleware\NegarAccesoPagandoPerfilEmpresarial::class,
        'negar_acceso_pagando_perfil_medico' => \App\Http\Middleware\NegarAccesoPagandoPerfilMedico::class,
        'negar_acceso_perfiles_medicos' => \App\Http\Middleware\NegarAccesoPerfilesMedicos::class,
        'negar_acceso_formularios_perfiles' => \App\Http\Middleware\NegarAccesoFormulariosPerfiles::class,
        'negar_acceso_perfiles_Con_Id' => \App\Http\Middleware\NegarAccesoPerfilesConId::class,
        'negar_acceso_area_medico' => \App\Http\Middleware\NegarAccesoAreaMedico::class,
        'negar_acceso_calendario' => \App\Http\Middleware\NegarAccesoCalendario::class,
        'negar_acceso_calendario_paciente' => \App\Http\Middleware\NegarAccesoCalendarioPaciente::class,
        'negar_acceso_reporte_pago' => \App\Http\Middleware\NegarAccesoReportePago::class,
        'negar_acceso_administrator' => \App\Http\Middleware\NegarAccesoAdministrator::class,
        'negar_acceso_formulario_perfil_empresarial' => \App\Http\Middleware\NegarAccesoFormularioPerfilEmpresarial::class,
    ];
}
