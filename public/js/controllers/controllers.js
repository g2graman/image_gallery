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
            $scope.checked = 0;

            $scope.updateChecked = function() {
                $scope.checked = 0;
              $('.md-checked').each(function(){
                  $scope.checked += 1;
              });
            };

            $scope.postMass = function() {
                var data = {};
                var srcs = [];

                $('.md-checked').each(function(){
                    srcs.push($(this).closest('[layout=column]').siblings().children('img').attr('src'));
                });

                var bases = [];
                var exts = [];
                for(var i=0; i < srcs.length; i++) {
                    var src = srcs[i];
                    var base = new String(src).substring(src.lastIndexOf('/') + 1);
                    if(base.lastIndexOf("/") != -1)
                        base = base.substring(0, base.lastIndexOf("."));
                    bases.push(base.split(".")[0]);
                    exts.push(base.split(".")[1]);
                }
                data['names'] = bases;
                data['exts'] = exts;
                data = JSON.stringify(data);
                $('#data').val(data);
            };

            $scope.postSingle = function(ev) {
                var data = {};
                var src = $(ev.currentTarget).closest('[layout=column]').siblings().children('img').attr('src');
                var base = new String(src).substring(src.lastIndexOf('/') + 1);
                if(base.lastIndexOf("/") != -1)
                    base = base.substring(0, base.lastIndexOf("."));

                data['names'] = [base.split(".")[0]];
                data['exts'] = [base.split(".")[1]];
                data = JSON.stringify(data);
                $('#data').val(data);
            };

            $scope.getChecked = function() {
                $scope.updateChecked();
                return $scope.checked;
            }

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

