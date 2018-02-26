<?php
/**
 * User: vacho
 * Date: 25-02-18
 * Time: 11:18 AM
 */
class OaWorktrackerReportsTaskDetailController {

  /**
   * This method that will be called for the 'foo/bar' path.
   *
   * @path => 'task-detail-json',
   * @access callback => TRUE,
   * @title => 'Task detauil json',
   */
  function getTaskDetail() {
    if(!empty($_GET['code'])){
      $conditions_to_send[] = array(
        'type' => 'field_condition',
        'field' => 'field_code',
        'column' => 'value',
        'value' => $_GET['code'],
        'value_ini' => '%',
        'value_end' => '%',
        'operator' => 'like'
      );
    }

    $params = array(
      'entity_type' => 'node',
      'bundle' => 'oa_worktracker_task',
      'fields' => array(
        'field_code',
        'field_oa_worktracker_task_status',
        array(
          'field' => 'oa_section_ref',
          'entity_type' => 'node',
          'bundle' => 'oa_section',
          'fields' => array(
            array(
              'field' => 'og_group_ref',
              'entity_type' => 'node',
              'bundle' => 'oa_space',
            )
          )
        ),
        'field_oa_worktracker_priority',
        'field_oa_worktracker_duedate',
        array(
          'field' => 'field_oa_worktracker_assigned_to',
          'entity_type' => 'user',
        )
      ),
      'conditions' => $conditions_to_send
    );

    $data = EntitiesData::getData($params);
    // Formating output

    if(!empty($data)){
      $nid = $data[0]['nid'];
      // Datetime
      $datetime = array();
      $result = db_query("
        SELECT vid AS id, timestamp As value
        FROM {node_revision}
        WHERE nid = :nid
        ORDER BY vid ASC
        ",
        array(
          ':nid' => $nid,
        )
      );
      foreach ($result as $revision) {
        $datetime[$revision->id] = array(
          'value' => $revision->value,
          'label' => format_date($revision->value, 'medium', '', NULL, 'es')
        );
      }
      $data[0]['datetime'] = $datetime;

      // Priority
      $priority = array();
      $result = db_query("
        SELECT revision_id AS id, field_oa_worktracker_priority_value As value
        FROM {field_revision_field_oa_worktracker_priority}
        WHERE entity_id = :nid
        ORDER BY revision_id ASC
        ",
        array(
          ':nid' => $nid,
        )
      );
      foreach ($result as $revision) {
        if($revision->value == 2){
          $label = t('Low');
        }
        if($revision->value == 5){
          $label = t('Normal');
        }
        if($revision->value == 8){
          $label = t('Hight');
        }
        $priority[$revision->id] = array(
          'value' => $revision->value,
          'label' => $label
        );
      }
      $data[0]['priority'] = $priority;

      // Status
      $status = array();
      $result = db_query("
        SELECT revision_id AS id, field_oa_worktracker_task_status_value As value
        FROM {field_revision_field_oa_worktracker_task_status}
        WHERE entity_id = :nid
        ORDER BY revision_id ASC
        ",
        array(
          ':nid' => $nid,
        )
      );
      foreach ($result as $revision) {
        $status[$revision->id] = t($revision->value);
      }
      $data[0]['status'] = $status;

      // Duedate
      $duedate = array();
      $result = db_query("
        SELECT revision_id AS id, field_oa_worktracker_duedate_value As value
        FROM {field_revision_field_oa_worktracker_duedate}
        WHERE entity_id = :nid
        ORDER BY revision_id ASC
        ",
        array(
          ':nid' => $nid,
        )
      );
      foreach ($result as $revision) {
        $duedate[$revision->id] = $revision->value;
      }
      $data[0]['duedate'] = $duedate;

      // Assigned to
      $assigned_to = array();
      $result = db_query("
        SELECT rv.revision_id AS id, ds.field_user_display_name_value AS fullname, u.name AS name
        FROM field_revision_field_oa_worktracker_assigned_to AS rv, users AS u, field_data_field_user_display_name AS ds
        WHERE
        rv.entity_id = :nid AND
          rv.field_oa_worktracker_assigned_to_target_id = u.uid AND
          u.uid = ds.entity_id
        ORDER BY rv.revision_id ASC;
        ",
        array(
          ':nid' => $nid,
        )
      );
      foreach ($result as $revision) {
        $assigned_to[$revision->id] = array(
          'name' => $revision->name,
          'fullname' => $revision->fullname
        );
      }
      $data[0]['assigned_to'] = $assigned_to;
    }

    return drupal_json_output($data[0]);

  }

}
