<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Brain - @yield('title')</title>
        <meta name="description" content="Cerebro360">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">

        {{-- <link rel="icon" type="image/png" href="img/favicon.png"> --}}


        <link rel="icon" type="image/png" href="{{URL('img/favicon.png')}}">

        {!!Html::style('css/vendors.bundle.css')!!}
        {!!Html::style('css/app.bundle.css')!!}

        <!-- base css -->

        {!!Html::style('css/fa-duotone.css')!!}
        {!!Html::style('css/theme-demo.css')!!}
        {!!Html::style('css/statistics/chartjs/chartjs.css')!!}
        {!!Html::style('css/statistics/c3/c3.css')!!}
        {!!Html::style('css/statistics/chartist/chartist.css')!!}

        {!!Html::style('css/datagrid/datatables/datatables.bundle.css')!!}



       @yield('css')
        {{-- <link rel="stylesheet" media="screen, print" href="{{ asset('css/page-invoice.css')}}"> --}}
        <!-- Place favicon.ico in the root directory -->
        {{-- <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5"> --}}

    @notifyCss
    </head>
    <body class="mod-bg-1 mod-nav-link nav-function-top" data-action="toggle" data-class="nav-function-top">

        <script>

           'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /**
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /**
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /**
             * Save to localstorage
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /**
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }
        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a>
                            <i class="fad fa-brain fa-2x"></i>
                        <h1>
                            Cerebro360
                        </h1>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>

                        <!-- MENU PRINCIPAL INICIO -->
                        <ul id="js-nav-menu" class="nav-menu">

                            <li>
                                @can('crear-empresa')
                                    <a href="{{ URL::to('empresa') }}" data-filter-tags="font icons">
                                        <i class="fad fa-building"></i>
                                        <span class="nav-link-text" data-i18n="nav.font_icons">Empresas</span>
                                    </a>
                                @else
                                    <a href="{{ URL::to('empresa') }}" data-filter-tags="font icons">
                                        <i class="fad fa-building"></i>
                                        <span class="nav-link-text" data-i18n="nav.font_icons">Mi empresa</span>
                                    </a>
                                @endcan

                            </li>
                            <li>
                                @can('listar-herramientas')
                                    <a href="#" data-filter-tags="tables">
                                        <i class="fad fa-tools"></i>
                                        <span class="nav-link-text" data-i18n="nav.tables">Herramientas</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#" data-filter-tags="tables basic tables">
                                                <span class="nav-link-text" data-i18n="nav.tables_basic_tables">LISTAR</span>
                                            </a>
                                         <!--   <ul>
                                                <li>
                                                    <a href="{{ URL::to('evaluacion') }}" data-filter-tags="pages forum list">
                                                        <span class="nav-link-text" data-i18n="nav.pages_forum_list">Variables</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ URL::to('evaluacion') }}" data-filter-tags="pages forum list">
                                                        <span class="nav-link-text" data-i18n="nav.pages_forum_list">Evaluaciones</span>
                                                    </a>
                                                </li>


                                            </ul> -->
                                        </li>

                                    </ul>
                                @endcan

                            </li>

                            <li>
                                @can('crear-usuario')
                                <a href="#" data-filter-tags="pages">
                                        <i class="fad fa-users-cog"></i>
                                    <span class="nav-link-text" data-i18n="nav.pages">Usuarios</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::to('usuario') }}" data-filter-tags="pages chat">
                                                <span class="nav-link-text" data-i18n="nav.pages_chat">Listar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('usuario.create') }}" data-filter-tags="pages contacts">
                                                <span class="nav-link-text" data-i18n="nav.pages_contacts">Nuevo</span>
                                            </a>
                                        </li>
                                    </ul>
                                @endcan
                            </li>
                            <li>
                                @can('listar-usuariosBGR')
                                    <a href="{{ URL::to('reproBGR') }}" data-filter-tags="pages">
                                        <i class="fad fa-users-cog"></i>
                                        <span class="nav-link-text" data-i18n="nav.pages">Usuarios</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::to('usuariosBGR') }}" data-filter-tags="pages chat">
                                                <span class="nav-link-text" data-i18n="nav.pages_chat">Lista de Usuarios</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('formExcelBGR') }}" data-filter-tags="pages chat">
                                                <span class="nav-link-text" data-i18n="nav.pages_chat">Importar Usuarios</span>
                                            </a>
                                        </li>
                                        <hr>
                                        <li>
                                            <a href="{{ URL::to('listarDepartamentos') }}" data-filter-tags="pages chat">
                                                <span class="nav-link-text" data-i18n="nav.pages_chat">Lista de Departamentos</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('formExcelDepartamento') }}" data-filter-tags="pages chat">
                                                <span class="nav-link-text" data-i18n="nav.pages_chat">Importar Departamentos</span>
                                            </a>
                                        </li>
                                    </ul>
                                @endcan
                            </li>
                            <!--  <li>
                                <a href="#" data-filter-tags="pages">
                                    <i class="fad fa-ballot-check"></i>
                                    <span class="nav-link-text" data-i18n="nav.pages">Evaluaciones</span>
                                </a>
                                <ul>
                                    <li>
                                        @can('evaluacionBGR')
                                            <a href="{{ URL::to('evaluacionex') }}" data-filter-tags="pages">
                                                <i class="fad fa-ballot-check"></i>
                                            <span class="nav-link-text" data-i18n="nav.pages">Tus Evaluaciones</span>
                                            </a>
                                        @endcan
                                    </li>
                                    <li>
                                        @can('evaluar-usuario')
                                            {{-- <a href="{{ URL::to('evaluacionJefe') }}" data-filter-tags="pages">
                                                <i class="fad fa-ballot-check"></i>
                                            <span class="nav-link-text" data-i18n="nav.pages">Evaluar Personal</span>
                                            </a> --}}
                                        @endcan
                                    </li>
                                </ul>
                            </li> -->
                            <li>
                                @can('crear-usuarioBGR')
                                <a href="#" data-filter-tags="pages">
                                    <i class="fal fa-chart-pie"></i>
                                    <span class="nav-link-text" data-i18n="nav.pages">Dashboard</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ URL::to('resulGeneral/0') }}" data-filter-tags="pages">
                                            <i class="fad fa-ballot-check"></i>
                                        <span class="nav-link-text" data-i18n="nav.pages">Resultados</span>
                                        </a>
                                    </li>
                                </ul>
                                @endcan
                            </li>

                            {{-- <li>
                                <a href="{{ URL::to('config') }}" data-filter-tags="config">
                                    <i class="fad fa-users-cog"></i>
                                    <span class="nav-link-text" data-i18n="nav.pages">Config</span>
                                </a>
                            </li> --}}
                        </ul>
                        <!-- MENU PRINCIAL FIN -->

                    </nav>
                    <!-- END PRIMARY NAVIGATION -->


                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                                <i class="fad fa-brain fa-4x text-white"></i>
                                <span class="page-logo-text mr-1">Cerebro360</span>
                                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>

                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>

                        <div class="ml-auto d-flex">
                            <!-- activate app search icon (mobile) -->
                            <div class="hidden-sm-up">
                                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field">
                                    <i class="fal fa-search"></i>
                                </a>
                            </div>

                            <!-- app user menu -->
                            <div>
                                <a href="#" data-toggle="dropdown" class="header-icon d-flex align-items-center justify-content-center ml-2">
                                    <i class="fad fa-user-lock fa-2x text-white"></i>
                                    &nbsp;
                                    <i class="ni ni-chevron-down hidden-xs-down text-white"></i>

                                    <!-- you can also add username next to the avatar with the codes below:
									<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
									<i class="ni ni-chevron-down hidden-xs-down"></i> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">

                                            <i class="fad fa-user-lock fa-2x"></i>
                                            </span>
                                            <div class="info-card-text">
                                                <div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}</div>
                                                <span class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>

                                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                        <span data-i18n="drpdwn.fullscreen">Pantalla Completa</span>
                                        <i class="float-right text-muted fw-n">F11</i>
                                    </a>

                                    <a href="{{ route('usuario.cambio') }}" class="dropdown-item">
                                        <span>Cambiar Contraseña</span>
                                        <i class="float-right text-muted fw-n"></i>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <span>{{ __('Salir') }}</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->

                    <!-- APPt -->
                    <!-- ______________________-->

                    <main id="js-page-content" role="main" class="page-content">
                        @include('alerts.success')
                        @yield('content')
                    </main>

                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                        </div>
                        <div>
                            <ul class="list-table m-0">
                                <span class="hidden-md-down fw-700">2021 © WebApp by&nbsp;<a href='https://www.brain.ec' class='text-primary fw-500' title='brain.ec' target='_blank'>brain.ec</a></span>
                            </ul>
                        </div>
                    </footer>
                    <!-- END Page Footer -->

                    <!-- BEGIN Color profile -->
                    <!-- this area is hidden and will not be seen on screens or screen readers -->
                    <!-- we use this only for CSS color refernce for JS stuff -->

                    <p id="js-color-profile" class="d-none">
                        <span class="color-primary-50"></span>
                        <span class="color-primary-100"></span>
                        <span class="color-primary-200"></span>
                        <span class="color-primary-300"></span>
                        <span class="color-primary-400"></span>
                        <span class="color-primary-500"></span>
                        <span class="color-primary-600"></span>
                        <span class="color-primary-700"></span>
                        <span class="color-primary-800"></span>
                        <span class="color-primary-900"></span>
                        <span class="color-info-50"></span>
                        <span class="color-info-100"></span>
                        <span class="color-info-200"></span>
                        <span class="color-info-300"></span>
                        <span class="color-info-400"></span>
                        <span class="color-info-500"></span>
                        <span class="color-info-600"></span>
                        <span class="color-info-700"></span>
                        <span class="color-info-800"></span>
                        <span class="color-info-900"></span>
                        <span class="color-danger-50"></span>
                        <span class="color-danger-100"></span>
                        <span class="color-danger-200"></span>
                        <span class="color-danger-300"></span>
                        <span class="color-danger-400"></span>
                        <span class="color-danger-500"></span>
                        <span class="color-danger-600"></span>
                        <span class="color-danger-700"></span>
                        <span class="color-danger-800"></span>
                        <span class="color-danger-900"></span>
                        <span class="color-warning-50"></span>
                        <span class="color-warning-100"></span>
                        <span class="color-warning-200"></span>
                        <span class="color-warning-300"></span>
                        <span class="color-warning-400"></span>
                        <span class="color-warning-500"></span>
                        <span class="color-warning-600"></span>
                        <span class="color-warning-700"></span>
                        <span class="color-warning-800"></span>
                        <span class="color-warning-900"></span>
                        <span class="color-success-50"></span>
                        <span class="color-success-100"></span>
                        <span class="color-success-200"></span>
                        <span class="color-success-300"></span>
                        <span class="color-success-400"></span>
                        <span class="color-success-500"></span>
                        <span class="color-success-600"></span>
                        <span class="color-success-700"></span>
                        <span class="color-success-800"></span>
                        <span class="color-success-900"></span>
                        <span class="color-fusion-50"></span>
                        <span class="color-fusion-100"></span>
                        <span class="color-fusion-200"></span>
                        <span class="color-fusion-300"></span>
                        <span class="color-fusion-400"></span>
                        <span class="color-fusion-500"></span>
                        <span class="color-fusion-600"></span>
                        <span class="color-fusion-700"></span>
                        <span class="color-fusion-800"></span>
                        <span class="color-fusion-900"></span>
                    </p>


                    <!-- END Color profile -->
                </div>
            </div>
        </div>
        <script src="{{ asset('js/vendors.bundle.js')}}"></script>
        <script src="{{ asset('js/app.bundle.js')}}"></script>
        {{-- @notifyJs --}}

        @yield('scripts')
    </body>
</html>
