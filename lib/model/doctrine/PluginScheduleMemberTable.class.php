<?php

/**
 * PluginScheduleMemberTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginScheduleMemberTable extends Doctrine_Table
{
  private $memberId = null;

  public function getScheduleIdsByMemberId($memberId)
  {
    $results = $this->createQuery()
      ->select('schedule_id')
      ->where('member_id = ?', (int)$memberId)
      ->execute(array(), Doctrine::HYDRATE_NONE);

    if (!count($results))
    {
      return array();
    }

    $scheduleIds = array();
    foreach ($results as $v)
    {
      $scheduleIds[] = $v[0];
    }

    return $scheduleIds;
  }

  public function getMemberIdsBySchedule(Schedule $schedule)
  {
    $results = $this->createQuery()
      ->select('member_id')
      ->where('schedule_id = ?', $schedule->id)
      ->execute(array(), Doctrine::HYDRATE_NONE);

    if (!count($results))
    {
      return array();
    }

    $memberIds = array();
    foreach ($results as $v)
    {
      $memberIds[] = $v[0];
    }

    return $memberIds;
  }

  /**
   * Returns an instance of this class.
   *
   * @return object PluginScheduleMemberTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('PluginScheduleMember');
  }
}
