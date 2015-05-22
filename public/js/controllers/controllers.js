(function () {
    //'use strict';
    angular.module( 'image_gallery', [ 'ngMaterial', 'ngAria', 'ngMdIcons'])
        .config(function($mdThemingProvider) {
            $mdThemingProvider.theme('default')
                .primaryPalette('amber')
                .accentPalette('orange')
                .warnPalette('red');
        }).controller("layoutController",
        function($scope, $mdSidenav, $animate) {
            $('body').css({'font-family': 'Roboto'});
            $('.dropzone').css('background-color', '#81CDF2', 'important');
            $('.dropzone').css('color', '#ffffff', 'important');
            $('#dismisser').css('background-color', '#FFFFD1', 'important');

            $scope.openLeftMenu = function() {
                $mdSidenav('left').toggle();
            };
        }).controller("galleryController",
        function($scope, $mdSidenav, $animate, $mdDialog){
            $scope.dismissUpload = function(ev) {
                $( "#dismiss").fadeOut( "fast", function() {});
                /*$mdDialog.show($mdDialog.alert()
                 .title('Uploader dismissed')
                 .content('You can bring back the uploader in the options menu by pressing the menu icon in the top right.')
                 .ok('Got it!')
                 .targetEvent(ev)).then(function() {
                 //On alert exit
                 });*/
            };
            $scope.showEnlarged = function(ev) {
                function DialogController($scope, $mdDialog) {
                        $scope.link = ev.currentTarget.src;
                        $scope.hide = function() {
                            $mdDialog.hide();
                        };
                    };


                $mdDialog.show({
                    controller: DialogController,
                    templateUrl: '../../dialog-template.html',
                    targetEvent: ev
                })
            };
        });
}());

