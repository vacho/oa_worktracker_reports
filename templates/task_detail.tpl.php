<div ng-app="App" ng-controller="TaskDetailController">
  <div id="worktracker-code-wrapper" class="views-exposed-widget">
      <label for="worktracker-code"><?php print t('Code') ?></label>
      <div class="views-widget">
          <div class="form-item form-type-textfield form-group">
              <input class="form-control form-text"
                     type="text"
                     id="code"
                     name="code"
                     value="{{ task.field_code }}" size="30" maxlength="128"
                     ng-model="code">
          </div>
      </div>
  </div>
  <h2 class="title">{{ task.title }}</h2>
  <div id="wrapper" ng-repeat="(key, value) in task.status">
    <div class="item hovicon effect-2 sub-a">{{ value }}</div>
    <div class="references">
      <span class="first">{{ task.assigned_to[key]['fullname'] }} </span><br>
      <span class="second"> ({{ task.assigned_to[key]['name'] }}) </span>
      <p class="second">{{ task.datetime[key]['label'] }}</p>
      <p class="second">{{ task.priority[key]['label'] }}</p>
    </div>
  </diV>
</div>
