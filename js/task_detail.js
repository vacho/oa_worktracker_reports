(function ($) {
  var app = angular.module('App',[]);
  app.controller('TaskDetailController', ['$scope', '$http', function($scope, $http) {
    var code = getParameterByName('code');
    $http.get("/task-detail-json"+"?code="+code).then(function (response) {
      $scope.task = response.data;
    });
  }]);

}(jQuery));

function oaSitemapAngularTemplate(name) {
  return '/sites/all/modules/oa_worktracker_reports/templates/task_detail.tpl.php';
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
