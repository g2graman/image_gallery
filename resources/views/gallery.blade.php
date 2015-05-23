@extends('layout')

<?php
use App\Picture as Picture;
use App\Pagination as Pagination;

$pageLimit = 5;
$pictures = Picture::paginate($pageLimit);
$count = Picture::all()->count();
?>

@section('content')
    <div ng-controller="galleryController">
        <div layout="row">
            <span class="md-flex" flex="15" flex-sm="8"></span>
            <span class="md-flex" flex="70" flex-sm="84">
                <div layout="row">
                    <span class="md-flex" flex="15" flex-sm="5"></span>
                    <span class="md-flex" flex="70" flex-sm="90">
                        <md-content>
                            <md-card id="dismiss">
                                <md-button class="md-warn md-hue-1" ng-class="{ 'hidden': ! dismissUpload }" ng-click="dismissUpload($event)" ng-show="!show" aria-hidden="false" id="dismisser">
                                    Click to dismiss uploader
                                </md-button>
                                <div action="{{ url('/upload') }}" class="dropzone">
                                    <div class="dz-message" data-dz-message>
                                        <span class="md-accent md-hue-3">Drag and Drop an image or click this box (Maximum size: 3MB)</span>
                                    </div>
                                </div>
                            </md-card>
                        </md-content>
                    </span>
                </div><br><br>

                <!-- Begin page display -->
                @if ($count === 0)
                    No pictures to display
                @else
                    <!-- FORM BEGIN -->
                <form method="post" role="form" action="/">
                    <md-content>
                        <md-card>
                            <md-card-content>
                                <span class="md-flex" flex="10">
                                </span>
                                <span class="md-flex" flex="85">
                                    <md-list>
                                    @foreach($pictures as $picture)
                                        <div layout="row" layout-align="space-between start">
                                            <md-list-item>
                                                <div class="md-list-item-text">
                                                    <md-subheader class="md-no-sticky">{{ $picture->original_name }}</md-subheader>
                                                </div>
                                                <img class="md-avatar" src="{{ asset('uploads/' . $picture->name . '.' . $picture->ext) }}" width="150em" ng-click="showEnlarged($event)"/>
                                            </md-list-item>
                                            <div layout="column" layout-align="start center">
                                                <div layout="row" layout-align="center center">
                                                    <md-subheader class="md-no-sticky">Mark to be deleted</md-subheader>
                                                    <md-checkbox class="md-secondary" ng-click="updateChecked()" aria-label="delete"></md-checkbox>
                                                </div>
                                                <md-button type="submit" class="md-warn md-hue-3 md-raised" ng-click="postSingle($event)">Delete</md-button>
                                            </div>
                                        </div>
                                            <md-divider md-inset></md-divider>
                                    @endforeach
                                    </md-list>
                                </span>
                            </md-card-content>
                        </md-card>
                    </md-content>
                    <div layout="column" ng-if="getChecked()" ng-click="postMass()" layout-align="centre centre">
                        <md-button class="md-accent">Delete Selected</md-button>
                    </div>
                    <input type="hidden" value="" name="data" id="data"/>
                    </form>
                    <!-- FORM END -->
                @endif
                @if ($count > $pageLimit)
                    <footer>
                        <div layout="row">
                            <span class="md-flex" flex="20" flex-sm="10"></span>
                            <span class="md-flex" flex="60" flex-sm="80">
                                <md-divider></md-divider>
                                <md-content layout-padding>
                                    {!! (new Pagination($pictures))->render() !!}
                                </md-content>
                            </span>
                        </div>
                    </footer>
                @endif
                <!-- End page display -->
            </span>
        </div>
    </div>
@endsection

