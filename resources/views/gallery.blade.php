@extends('layout')
@section('stylesheets')
    <link href="{{ asset('/css/gallery.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div ng-controller="galleryController">
        <div layout="row">
            <span class="md-flex" flex="10"></span>
            <span class="md-flex" flex="80">
                <md-content>
                    <md-card id="dismiss">
                        <md-button class="md-accent" ng-class="{ 'hidden': ! dismissUpload }" ng-click="dismissUpload()" ng-show="true" aria-hidden="false">
                            Click to dismiss uploader
                        </md-button>
                        <form action="{{ url('/upload') }}" class="dropzone" method="post">
                            <div class="dz-message" data-dz-message>
                                <span class="md-accent md-hue-3">Drag and Drop an image or click this box (Maximum size: 3MB)</span>
                            </div>
                            <!--input type="hidden" name="_token" id="csrf-token" value="{{Form::token()}}"-->
                        </form>
                    </md-card>
                </md-content>

                <!-- Begin page display -->
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
                <!-- End page display -->
            </span>
        </div>
    </div>
@endsection

