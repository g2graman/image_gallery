<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Image Gallery</title>

        <!--link href="{{ asset('/css/app.css') }}" rel="stylesheet"-->

        <!-- Fonts -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body ng-app="image_gallery">
        <div ng-controller="layoutController">
            <!-- Left Sidenav Start-->
            <md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="left">
                <md-toolbar class="md-theme-indigo">
                    <h1 class="md-toolbar-tools">Options</h1>
                </md-toolbar>
                <md-content class="md-padding" ng-controller="layoutController">
                    <p hide-md show-gt-md>
                        This sidenav is locked open on your device. To go back to the default behavior,
                        narrow your display.
                    </p>
                </md-content>
            </md-sidenav>
            <!-- Left Sidenav End-->
            <md-content>
                <md-toolbar md-scroll-shrink>
                    <h2 class="md-toolbar-tools">
                        <span class="md-flex" flex="5"></span>
                        <span class="md-flex" flex="75" flex-sm="70">Image Gallery</span>
                        <span class="md-flex" flex="10">
                            <md-button class="md-padding md-accent" ng-click="openLeftMenu()" ng-show="true" aria-label="Menu Button" aria-hidden="false">
                                <ng-md-icon icon="menu" ng-style="{'font-size': menu.size}" size="42" align="bottom center" id="menu-icon">
                                    <md-tooltip md-direction="right">
                                        Menu Icon
                                    </md-tooltip>
                                </ng-md-icon>
                            </md-button>
                        </span>
                    </h2>
                </md-toolbar>
            </md-content>
            <md-divider md-inset></md-divider>
            @yield('content')
        </div>
        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.js"></script>
        <script src="{{ asset('/js/angular-material-icons.min.js') }}"></script>
        <script src="{{ asset('/js/disable.js') }}"></script>
        <script src="{{ asset('/js/controllers/controllers.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
    </body>
</html>
