jQuery(document).ready(function(){
  jQuery("#date-start, #date-end").datepicker(
      { dateFormat: 'dd-mm-yy' }
  );
});

(function ($) {
  var app = angular.module('App',[]);
  app.controller('TasksController', ['$scope', '$http', function($scope, $http) {

    $http.get("/tasks-json").then(function (response) {
      $scope.date_start = "";
      $scope.date_end = "";
      $scope.code = "";
      $scope.title = "";
      $scope.assigned = "";
      $scope.counter = 0;

      $scope.set_spaces = response.data.spaces;
      $scope.space = "";
      $scope.set_status = response.data.status;
      $scope.status = "";
      $scope.set_priorities = response.data.priority;
      $scope.priority = "";

      delete response.data.spaces;
      delete response.data.priority;
      delete response.data.status;
      $scope.tasks = response.data;
      $scope.arrayTasks = Object.keys($scope.tasks).map(function(key) {
        return $scope.tasks[key];
      });
      $scope.counter = $scope.arrayTasks.length;

    });

    $scope.submit = function(){
      var parameters = "";
      var date = $scope.date_start.split("-");
      if(date.length > 1) {
        var startdate = new Date(date[2], date[1] - 1, date[0]);
        var date_start_timestamp = parseInt(startdate.getTime()/1000);
      } else  {
        var date_start_timestamp = "";
      }
      date = $scope.date_end.split("-");
      if(date.length > 1) {
        var enddate = new Date(date[2], date[1] - 1, date[0]);
        var date_end_timestamp = parseInt(enddate.getTime()/1000)+60*60*23+60*59;
      } else  {
        var date_end_timestamp = "";
      }

      parameters = parameters + "code=" + $scope.code + "&";
      parameters = parameters + "title=" + $scope.title + "&";
      parameters = parameters + "space=" + $scope.space + "&";
      parameters = parameters + "status=" + $scope.status + "&";
      parameters = parameters + "priority=" + $scope.priority + "&";
      parameters = parameters + "date_start=" + date_start_timestamp + "&";
      parameters = parameters + "date_end=" + date_end_timestamp + "&";
      parameters = parameters + "assigned=" + $scope.assigned + "&";
      parameters = parameters + "filtering=" + 'filtering';

      $http.get("/tasks-json?"+parameters).then(function(response) {
        delete response.data.spaces;
        delete response.data.priority;
        delete response.data.status;

        $scope.tasks = response.data;
        $scope.arrayTasks = Object.keys($scope.tasks).map(function(key) {
          return $scope.tasks[key];
        });
        $scope.counter = $scope.arrayTasks.length;
      });

    };

  }]);

}(jQuery));

function oaSitemapAngularTemplate(name) {
  return '/sites/all/modules/oa_worktracker_reports/templates/tasks.tpl.php';
}
