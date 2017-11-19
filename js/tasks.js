jQuery(document).ready(function(){
  //jQuery("#task-status").chosen();
  jQuery("#duedate, #startdate").datepicker(
      { dateFormat: 'M d yy' }
  );
});

(function ($) {

  var app = angular.module('App',[]);
  app.controller('TasksController', ['$scope', '$http', function($scope, $http) {
    $scope.greeting = 'Hola!';
    
    $http.get("/tasks-json").then(function (response) {
      console.log(response);

      $scope.tasks = response.data;
      $scope.arrayTasks = Object.keys($scope.tasks).map(function(key) {
        return $scope.tasks[key];
      });
    });

  }]);

}(jQuery));

function oaSitemapAngularTemplate(name) {
  return 'http://www.devintranet.com/sites/all/modules/oa_worktracker_reports/templates/tasks.tpl.php';
}
