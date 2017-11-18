<div class="view view-tareas view-id-tareas view-display-id-page view-dom-id-3e7a787b0c2868f7ec0c92adf480e8af">
    <div class="view-filters">
        <form action="/tasks" method="get"
              id="views-exposed-form-tareas-page-3e7a787b0c2868f7ec0c92adf480e8af"
              accept-charset="UTF-8" role="form">
            <div>
                <div class="views-exposed-form ">
                    <div class="views-exposed-widgets clearfix ">
                        <div id="worktracker-task-status-wrapper"
                             class="views-exposed-widget">
                            <label for="worktracker-task-status"> Estado </label>
                                <div class="form-item form-type-select">
                                    <div class="chosen-container chosen-container-multi form-control chosen-processed"
                                         style="width: 250px;" id="worktracker_task_status_value_chosen">
                                        <select multiple="multiple"
                                                name="task_status[]"
                                                class="form-control form-select"
                                                id="task-status"
                                                size="5">
                                            <option value="open">Abierta</option>
                                            <option value="duplicate">Duplicada</option>
                                            <option value="deferred">Postergada</option>
                                            <option value="closed">Cerrado</option>
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
                                                               size="20"
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
            <table class="views-table cols-7 table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="views-field views-field-field-codigo-hoja-ruta">
                        Código
                    </th>
                    <th class="views-field views-field-title">
                        Título
                    </th>
                    <th class="views-field views-field-oa-section-ref">
                        Sección
                    </th>
                    <th class="views-field views-field-field-oa-worktracker-task-status">
                        Prioridad
                    </th>
                    <th class="views-field views-field-field-oa-worktracker-assigned-to">
                        Estado
                    </th>
                    <th class="views-field views-field-field-oa-worktracker-priority">
                        Fecha inicio
                    </th>
                    <th class="views-field views-field-field-oa-worktracker-duedate">
                        Fecha límite
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd views-row-first views-row-last">
                    <td class="views-field views-field-field-codigo-hoja-ruta">
                        CRED-1
                    </td>
                    <td class="views-field views-field-title">
                        <a href="/creditos/tareas-creditos/cr-dito-emma-perez-10000-bs">Crédito
                            Emma Perez - 10.000 Bs</a></td>
                    <td class="views-field views-field-oa-section-ref">
                        Créditos
                    </td>
                    <td class="views-field views-field-field-oa-worktracker-task-status">
                        Abierta
                    </td>
                    <td class="views-field views-field-field-oa-worktracker-assigned-to">
                        Baldivieso Saavedra Aldo
                    </td>
                    <td class="views-field views-field-field-oa-worktracker-priority">
                        Normal
                    </td>
                    <td class="views-field views-field-field-oa-worktracker-duedate">
                        <span class="date-display-single">Miércoles, Octubre 18, 2017 (Todo el día)</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>