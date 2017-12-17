jQuery(document).ready(function(){
  jQuery("#duedate, #startdate").datepicker(
      { dateFormat: 'dd-mm-yy' }
  );
});

(function ($) {
  var app = angular.module('App',[]);
  app.controller('TasksController', ['$scope', '$http', function($scope, $http) {

    $http.get("/tasks-json").then(function (response) {
      $scope.spaces = new Array();
      $scope.startdate = "";
      $scope.duedate = "";
      $scope.status = new Array();
      $scope.priority = new Array();
      $scope.code = "";
      $scope.title = "";
      $scope.assigned = "";

      $scope.tasks = response.data;
      $scope.arrayTasks = Object.keys($scope.tasks).map(function(key) {
        return $scope.tasks[key];
      });

      console.log($scope.arrayTasks);
    });

    $scope.submit = function(){

      var parameters = "";

      var spaces = $scope.spaces;

      var date = $scope.startdate.split("-");
      var startdate_date = new Date(date[2], date[1] - 1, date[0]);
      var startdate_timestamp = parseInt(startdate_date.getTime()/1000);

      var date = $scope.duedate.split("-");
      var duedate_date = new Date(date[2], date[1] - 1, date[0]);
      var duedate_timestamp = parseInt(duedate_date.getTime()/1000)+60*60*11+60*59;

      var status = $scope.status;
      var priority = $scope.priority;

      
      /*spaces.forEach(function(element) {
        parameters = parameters + "spaces[]=" + element + "&";
      });
      parameters = parameters + "startdate=" + startdate_timestamp + "&";
      parameters = parameters + "duedate=" + duedate_timestamp + "&";

      status.forEach(function(element) {
        parameters = parameters + "status[]=" + element + "&";
      });

      priority.forEach(function(element) {
        parameters = parameters + "priority[]=" + element + "&";
      });*/

      parameters = parameters + "code=" + $scope.code + "&";
      parameters = parameters + "title=" + $scope.title + "&";
      parameters = parameters + "assigned=" + $scope.assigned;

      $http.get("/tasks-json?"+parameters).then(function(response) {
        $scope.tasks = response.data;
        $scope.arrayTasks = Object.keys($scope.tasks).map(function(key) {
          return $scope.tasks[key];
        });
      });

    };

  }]);

}(jQuery));

function oaSitemapAngularTemplate(name) {
  return '/sites/all/modules/oa_worktracker_reports/templates/tasks.tpl.php';
}
