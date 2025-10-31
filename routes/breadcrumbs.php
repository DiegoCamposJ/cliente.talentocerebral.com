
<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Inicio', route('home'));
});

// Inicio > Empresas
Breadcrumbs::for('empresas', function ($trail) {
    $trail->parent('home');
    $trail->push('Empresas', route('empresa.index'));
});

// // Inicio > Programas > Subprogramas
// Breadcrumbs::for('subprogramas', function ($trail) {
//     $trail->parent('programas');
//     $trail->push('Subprogramas', route('subprogramas.index'));
// });

// // Inicio > Programas > Subprogramas > Aspectos
// Breadcrumbs::for('aspectos', function ($trail) {
//     $trail->parent('subprogramas');
//     $trail->push('Aspectos', route('aspectos.index'));
// });

// // Inicio > Programas > Subprogramas > Aspectos > Avances
// Breadcrumbs::for('avances', function ($trail) {
//     $trail->parent('aspectos');
//     $trail->push('Avances', route('aspectos.index'));
// });


// // Inicio > Planes
// Breadcrumbs::for('planes', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Planes', route('planes.index'));
// });


// // Inicio > Planes > Hallazgos
// Breadcrumbs::for('hallazgos', function ($trail) {
//     $trail->parent('planes');
//     $trail->push('Hallazgos', route('hallazgos.index'));
// });


// // Inicio > Planes > Hallazgos > Acciones
// Breadcrumbs::for('acciones', function ($trail) {
//     $trail->parent('hallazgos');
//     $trail->push('Acciones', route('acciones.index'));
// });
