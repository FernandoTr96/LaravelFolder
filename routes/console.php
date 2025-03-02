<!-- Aqui se crean los comandos artisan para el proyecto -->
<!-- Podriamos automatizar acciones comunes en el proyecto con esto -->

<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
