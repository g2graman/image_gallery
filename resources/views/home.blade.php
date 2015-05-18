@extends('app')

@section('content')
<div ng-controller="homepageController">
    <!-- Left Sidenav Start-->
    <md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="left"">
    <md-toolbar class="md-theme-indigo">
        <h1 class="md-toolbar-tools">Sidenav Left</h1>
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
                    <md-button class="md-padding md-primary md-hue-3" ng-click="openLeftMenu()" ng-show="true" aria-label="Menu Button" aria-hidden="false" >
                        <ng-md-icon icon="menu" ng-style="{'font-size': menu.size}" style="fill: #abcdef" size="42" align="bottom center"></ng-md-icon>
                    </md-button>
                </span>
            </h2>
        </md-toolbar>
    </md-content>
    <md-divider md-inset></md-divider>

    <div layout="row">
        <span class="md-flex" flex="10"></span>
        <span class="md-flex" flex="80">
            <md-content>
                <md-card class="md-whiteframe-z3">
                    <md-card-content>
                        <div layout="column">
                            <div layout="row">
                                <span class="md-flex" flex="10">
                                </span>
                                <span class="md-flex" flex="85">
                                    pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures
                                </span>
                            </div><br>
                            <md-divider></md-divider><br>
                            <div layout="row">
                                <span class="md-flex" flex="10">
                                </span>
                                <span class="md-flex" flex="85">
                                    pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures pictures
                                </span>
                            </div>
                        </div>
                    </md-card-content>
                </md-card>
            </md-content>
        </span>
    </div>
@endsection

