<?php
/**
 * Created by PhpStorm.
 * User: vacho
 * Date: 19-11-17
 * Time: 12:11 PM
 */
class OaWorktrackerReportsTasksController {

  /**
   * This method that will be called for the 'foo/bar' path.
   *
   * @path => 'tasks-json',
   * @access callback => TRUE,
   * @title => 'Tasks json',
   */
  function getTasks() {

    $datas  = EntitiesData::getDatas(
      'node',
      'oa_worktracker_task',
      'codigo_hoja_ruta oa_worktracker_task_status',
      ''
      );

    /*$data = array(
      'Hola bebe la gente dice que estas llorando',
      'y te estas calentando',
      'y no puede ser'
    );*/
    //return drupal_json_encode($datas);
    return drupal_json_output($datas);

  }

}