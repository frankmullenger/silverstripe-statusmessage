<?php
class StatusMessage extends Extension {
  
  /**
   * Types of status message
   */
  const STATUS_SUCCESS = 'success';
  const STATUS_INFO    = 'info';
  const STATUS_WARNING = 'warning';
  const STATUS_ERROR   = 'error';
   
	/**
   * Get status message from Session
   * 
   * @return Mixed ArrayData|False Message and status of message in an array
   */
  function StatusMessage() {
    
    if(Session::get('ActionMessage')) {
      $message = Session::get('ActionMessage');
      $status = Session::get('ActionStatus');

      Session::clear('ActionStatus');
      Session::clear('ActionMessage');

      return new ArrayData(array('Message' => $message, 'Status' => $status));
    }
    return false;
  }
  
  /**
   * Set a status message in the Session
   * 
   * @param String $status Matching one of the status constants from this class
   * @param String $message Text or HTML to be rendered as the message
   */
  static function set($status, $message) {
    Session::set('ActionStatus', $status); 
    Session::set('ActionMessage', $message);
  }
}