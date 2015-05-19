angular.module( 'image_gallery', [ 'ngMaterial', 'ngAria', 'ngMdIcons'])
    .controller("layoutController",
    function($scope, $mdSidenav, $animate){
        $scope.openLeftMenu = function() {
            $mdSidenav('left').toggle();
        };
    }).controller("galleryController",
    function($scope, $mdSidenav, $animate){
        $scope.dismissUpload = function() {
            $( "#dismiss").fadeOut( "fast", function() {
                // Animation complete.
            });
        };
    });