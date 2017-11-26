jQuery(document).ready(function(){
  //jQuery("#task-status").chosen();
  jQuery("#duedate, #startdate").datepicker(
      { dateFormat: 'M d yy' }
  );
});

(function ($) {

  var app = angular.module('App',[]);
  app.controller('TasksController', ['$scope', '$http', function($scope, $http) {

    $http.get("/tasks-json").then(function (response) {
      $scope.tasks = response.data;
      $scope.arrayTasks = Object.keys($scope.tasks).map(function(key) {
        return $scope.tasks[key];
      });
    });

  }]);

}(jQuery));

function oaSitemapAngularTemplate(name) {
  return '/sites/all/modules/oa_worktracker_reports/templates/tasks.tpl.php';
}
