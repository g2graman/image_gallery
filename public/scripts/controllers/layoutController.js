angular.module( 'image_gallery', [ 'ngMaterial', 'ngAria', 'ngMdIcons'])
    .controller("layoutController",
    function($scope, $mdSidenav, $animate){
        $scope.openLeftMenu = function() {
            $mdSidenav('left').toggle();
        };
    })
    .controller("homepageController",
    function($scope, $mdSidenav, $animate){

    });