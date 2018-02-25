<div class="view view-tasks view-id-tasks view-display-id-page" ng-app="App" ng-controller="TasksController">
    <div class="view-filters">
        <form id="views-exposed-form-taks" accept-charset="UTF-8" role="form" ng-submit="submit()">
            <div>
                <div class="views-exposed-form ">
                    <div class="views-exposed-widgets clearfix">
                        <div id="worktracker-task-space-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-space"><?php print t('Space') ?></label>
                            <div class="form-item form-type-select">
                                <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                     style="width: 250px;" id="worktracker_space_value_chosen">
                                    <select ng-options="option.nid as option.title for option in set_spaces"
                                            ng-model="space"
                                            class="form-control form-select"
                                            name="space[]"
                                            id="space"
                                            >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-date-start-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-date-start"><?php print t('Interval start') ?></label>
                            <div class="views-widget">
                                <div id="worktracker-date-start">
                                    <div id="worktracker-date-start-inside-wrapper">
                                        <div class="container-inline-date">
                                            <div class="form-item form-type-date-popup form-group">
                                                <div id="worktracker-date-start" class="date-padding">
                                                    <div class="form-item form-type-textfield form-group">
                                                        <label class="element-invisible"
                                                               for="worktracker-date-start"><?php print t('Date') ?> </label>
                                                        <input class="form-control form-text"
                                                               type="text"
                                                               id="date-start"
                                                               name="date-start[value][date]"
                                                               value=""
                                                               size="12"
                                                               maxlength="30"
                                                               ng-model="date_start">
                                                        <span class="help-block"> <?php print t('Such as') ?> Oct 29 2018</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-date-end-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-date-end"><?php print t('Interval end') ?></label>
                            <div class="views-widget">
                                <div id="worktracker-date-end">
                                    <div id="worktracker-date-end-inside-wrapper">
                                        <div class="container-inline-date">
                                            <div class="form-item form-type-date-popup form-group">
                                                <div id="worktracker-date-end"
                                                     class="date-padding">
                                                    <div class="form-item form-type-textfield form-group">
                                                        <label class="element-invisible"
                                                               for="worktracker-date-end"><?php print t('Date') ?></label>
                                                        <input class="form-control form-text"
                                                               type="text"
                                                               id="date-end"
                                                               name="date-end[value][date]"
                                                               value=""
                                                               size="12"
                                                               maxlength="30"
                                                               ng-model="date_end" >
                                                        <span class="help-block"><?php print t('Such as') ?> Oct 29 2018</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-status-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-status"><?php print t('State') ?></label>
                                <div class="form-item form-type-select">
                                    <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                         style="width: 240px;" id="worktracker_status_value_chosen">
                                        <select ng-options="option.id as option.title for option in set_status"
                                                ng-model="status"
                                                class="form-control form-select"
                                                name="status[]"
                                                id="status"
                                        >
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div id="worktracker-priority-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-priority"><?php print t('Priority') ?></label>
                            <div class="form-item form-type-select">
                                <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                     style="width: 230px;" id="worktracker_priority_value_chosen">
                                    <select ng-options="option.id as option.title for option in set_priorities"
                                            ng-model="priority"
                                            class="form-control form-select"
                                            name="priority[]"
                                            id="priority"
                                    >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-code-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-code"><?php print t('Code') ?></label>
                            <div class="views-widget">
                                <div class="form-item form-type-textfield form-group">
                                    <input class="form-control form-text"
                                           type="text"
                                           id="code"
                                           name="code"
                                           value="" size="30" maxlength="128"
                                           ng-model="code">
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-title-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-title"><?php print t('Title') ?></label>
                            <div class="views-widget">
                                <div class="form-item form-type-textfield form-group">
                                    <input class="form-control form-text"
                                           type="text"
                                           id="title"
                                           name="title"
                                           value="" size="30" maxlength="128"
                                           ng-model="title">
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-assigned-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-assigned"><?php print t('Assigned') ?></label>
                            <div class="views-widget">
                                <div class="form-item form-type-textfield form-group">
                                    <input class="form-control form-text"
                                           type="text"
                                           id="assigned"
                                           name="assigned"
                                           value="" size="30" maxlength="128"
                                           ng-model="assigned">
                                </div>
                            </div>
                        </div>
                        <div class="views-exposed-widget views-submit-button">
                            <input type="submit" id="edit-submit-tareas" name=""
                                   value="<?php print t('Apply') ?>"
                                   class="form-submit btn btn-default btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="view-content">
        <div class="table-responsive">
            <h2 class="pane-title"><?php print t('Tasks') ?></h2>
            <table class="views-table cols-7 table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="views-field">
                        <a href="" title="ordenar por código" class="active"><?php print t('Code') ?></a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por título" class="active"><?php print t('Title') ?></a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por sección" class="active"><?php print t('Section') ?></a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por prioridad" class="active"><?php print t('Priority') ?></a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por estado" class="active"><?php print t('State') ?></a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por fecha inicio" class="active"><?php print t('Date start') ?></a>
                    </th>
                    <th class="views-field views-field-field-oa-worktracker-date-end">
                        <a href="" title="ordenar por fecha límite" class="active"><?php print t('Deadline') ?></a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd views-row-first views-row-last" ng-repeat="task in arrayTasks">
                    <td class="views-field ">
                        <a href="">{{ task.field_code }}</a>
                    </td>
                    <td class="views-field ">
                        <a href="/creditos/tareas-creditos/cr-dito-emma-perez-10000-bs">{{ task.title }}</a>
                    </td>
                    <td class="views-field ">
                        {{ task.oa_section_ref[0].title }}
                    </td>
                    <td class="views-field ">
                        {{ task.field_oa_worktracker_priority }}
                    </td>
                    <td class="views-field ">
                        {{ task.field_oa_worktracker_task_status }}
                    </td>
                    <td class="views-field ">
                        {{ task.created_formated }}
                    </td>
                    <td class="views-field ">
                        {{ task.duedate_formated }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
    <p><?php print t('Total tasks') ?>: {{ arrayTasks[counter-1].total_tasks_filtered }}</p>
    <p>
      <?php print t('Open') ?>: {{ arrayTasks[counter-1].total_open }} <br>
      <?php print t('Duplicate') ?>: {{ arrayTasks[counter-1].total_duplicate }} <br>
      <?php print t('Deferred') ?>: {{ arrayTasks[counter-1].total_deferred }} <br>
      <?php print t('Closed') ?>: {{ arrayTasks[counter-1].total_closed }} <br>
      <?php print t('Resolved') ?>: {{ arrayTasks[counter-1].total_resolved }} <br>
    </p>
    <p><?php print t('Delayed tasks') ?>: {{ arrayTasks[counter-1].total_delayed }}</p>
    </div>
</div>
