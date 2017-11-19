<div class="view view-tasks view-id-tasks view-display-id-page">
    <div class="view-filters">
        <form action="/tasks" method="get" id="views-exposed-form-taks" accept-charset="UTF-8" role="form">
            <div>
                <div class="views-exposed-form ">
                    <div class="views-exposed-widgets clearfix">
                        <div id="worktracker-task-section-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-section"> Sección </label>
                            <div class="form-item form-type-select">
                                <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                     style="width: 250px;" id="worktracker_section_value_chosen">
                                    <select multiple="multiple"
                                            name="section[]"
                                            class="form-control form-select"
                                            id="section"
                                            size="5">
                                        <option value="open">Créditos</option>
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
                                                               maxlength="30">
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
                                                               maxlength="30">
                                                        <span class="help-block"> Por ejemplo, Oct 29 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="worktracker-task-status-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-task-status"> Estado </label>
                                <div class="form-item form-type-select">
                                    <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                         style="width: 240px;" id="worktracker_task_status_value_chosen">
                                        <select multiple="multiple"
                                                name="task_status[]"
                                                class="form-control form-select"
                                                id="task-status"
                                                size="4">
                                            <option value="open">Abierta</option>
                                            <option value="duplicate">Duplicada</option>
                                            <option value="deferred">Postergada</option>
                                            <option value="closed">Cerrado</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div id="worktracker-prioriti-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-prioriti"> Prioridad </label>
                            <div class="form-item form-type-select">
                                <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                     style="width: 230px;" id="worktracker_prioriti_value_chosen">
                                    <select multiple="multiple"
                                            name="prioriti[]"
                                            class="form-control form-select"
                                            id="prioriti"
                                            size="5">
                                        <option value="open">Alta</option>
                                        <option value="duplicate">Normal</option>
                                        <option value="deferred">Baja</option>
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
                                           value="" size="30" maxlength="128">
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
                                           value="" size="30" maxlength="128">
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
                                           value="" size="30" maxlength="128">
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
                <tr class="odd views-row-first views-row-last">
                    <td class="views-field ">
                        <a href="">CRED-1</a>
                    </td>
                    <td class="views-field ">
                        <a href="/creditos/tareas-creditos/cr-dito-emma-perez-10000-bs">Crédito Emma Perez - 10.000 Bs</a>
                    </td>
                    <td class="views-field ">
                        Créditos
                    </td>
                    <td class="views-field ">
                        Abierta
                    </td>
                    <td class="views-field ">
                        Baldivieso Saavedra Aldo
                    </td>
                    <td class="views-field ">
                        Nov 1 2017
                    </td>
                    <td class="views-field ">
                        Nov 15 2017
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>