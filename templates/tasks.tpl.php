<div class="view view-tasks view-id-tasks view-display-id-page" ng-app="App" ng-controller="TasksController">
    <div class="view-filters">
        <form id="views-exposed-form-taks" accept-charset="UTF-8" role="form" ng-submit="submit()">
            <div>
                <div class="views-exposed-form ">
                    <div class="views-exposed-widgets clearfix">
                        <div id="worktracker-task-space-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-space"> Espacio </label>
                            <div class="form-item form-type-select">
                                <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                     style="width: 250px;" id="worktracker_space_value_chosen">
                                    <!--<select multiple="multiple"
                                            name="spaces[]"
                                            class="form-control form-select"
                                            id="spaces">
                                        <option value="cooperativa">Cooperativa</option>
                                        <option value="captaciones">Captaciones</option>
                                        <option value="legal">Legal</option>
                                    </select>-->
                                    <select ng-options="option.nid as option.title for option in arrayTasks[0].spaces"
                                            ng-model="spaces"
                                            class="form-control form-select"
                                            name="spaces[]"
                                            id="spaces"
                                            >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-startdate-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-startdate"> Fecha inicio </label>
                            <div class="views-widget">
                                <div id="worktracker-startdate">
                                    <div id="worktracker-startdate-inside-wrapper">
                                        <div class="container-inline-date">
                                            <div class="form-item form-type-date-popup form-group">
                                                <div id="worktracker-startdate" class="date-padding">
                                                    <div class="form-item form-type-textfield form-group">
                                                        <label class="element-invisible"
                                                               for="worktracker-startdate">Fecha </label>
                                                        <input class="form-control form-text"
                                                               type="text"
                                                               id="startdate"
                                                               name="startdate[value][date]"
                                                               value=""
                                                               size="12"
                                                               maxlength="30"
                                                               ng-model="startdate">
                                                        <span class="help-block"> Por ejemplo, Oct 29 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-duedate-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-duedate"> Fecha plazo </label>
                            <div class="views-widget">
                                <div id="worktracker-duedate">
                                    <div id="worktracker-duedate-inside-wrapper">
                                        <div class="container-inline-date">
                                            <div class="form-item form-type-date-popup form-group">
                                                <div id="worktracker-duedate"
                                                     class="date-padding">
                                                    <div class="form-item form-type-textfield form-group">
                                                        <label class="element-invisible"
                                                               for="worktracker-duedate">Fecha </label>
                                                        <input class="form-control form-text"
                                                               type="text"
                                                               id="duedate"
                                                               name="duedate[value][date]"
                                                               value=""
                                                               size="12"
                                                               maxlength="30"
                                                               ng-model="duedate" >
                                                        <span class="help-block"> Por ejemplo, Oct 29 2017</span>
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
                            <label for="worktracker-status"> Estado </label>
                                <div class="form-item form-type-select">
                                    <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                         style="width: 240px;" id="worktracker_status_value_chosen">
                                        <select ng-options="option.id as option.title for option in arrayTasks[0].status"
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
                            <label for="worktracker-priority"> Prioridad </label>
                            <div class="form-item form-type-select">
                                <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                     style="width: 230px;" id="worktracker_priority_value_chosen">
                                    <select ng-options="option.id as option.title for option in arrayTasks[0].priority"
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
                            <label for="worktracker-code"> Código hoja ruta </label>
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
                            <label for="worktracker-title"> Título </label>
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
                            <label for="worktracker-assigned"> Asignado </label>
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
                                   value="Aplicar"
                                   class="form-submit btn btn-default btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="view-content">
        <div class="table-responsive">
            <h2 class="pane-title"> Tareas </h2>
            <table class="views-table cols-7 table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="views-field">
                        <a href="" title="ordenar por código" class="active">Código</a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por título" class="active">Título</a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por sección" class="active">Sección</a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por prioridad" class="active">Prioridad</a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por estado" class="active">Estado</a>
                    </th>
                    <th class="views-field">
                        <a href="" title="ordenar por fecha inicio" class="active">Fecha inicio</a>
                    </th>
                    <th class="views-field views-field-field-oa-worktracker-duedate">
                        <a href="" title="ordenar por fecha límite" class="active">Fecha límite</a>
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
                        {{ task.oa_section_ref.title }}
                    </td>
                    <td class="views-field ">
                        {{ task.field_oa_worktracker_priority }}
                    </td>
                    <td class="views-field ">
                        {{ task.field_oa_worktracker_task_status }}
                    </td>
                    <td class="views-field ">
                        {{ task.created }}
                    </td>
                    <td class="views-field ">
                        {{ task.field_oa_worktracker_duedate }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>