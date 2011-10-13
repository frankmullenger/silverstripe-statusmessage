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
    
    //Get status message from Session
    if (Session::get('ActionMessage') && Session::get('ActionStatus')) {
      Session::clear('ActionStatus');
      Session::clear('ActionMessage');
      return new ArrayData(array(
      	'Message' => Session::get('ActionMessage'), 
      	'Status' => Session::get('ActionStatus')
      ));
    }
    
    //Get status from GET vars
    $curr = Controller::curr();
    $request = $curr->getRequest();
    if ($request->getVar('ActionMessage') && $request->getVar('ActionStatus')) {
      return new ArrayData(array(
      	'Message' => $request->getVar('ActionMessage'), 
      	'Status' => $request->getVar('ActionStatus')
      ));
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
  
	/**
   * Return a GET query string with status message, useful when using 
   * Director::redirect() which does not preserve session data because of header().
   * 
   * E.g: 
   * StatusMessage::set(StatusMessage::STATUS_SUCCESS, 'Some message.');
   * Director::redirect(Director::absoluteBaseURL() . $this->Link() . '?' . StatusMessage::query_string());
   * 
   * @return String Query string for GET seperated with & without a '?' prefix
   */
  static function query_string() {
    if (Session::get('ActionMessage')) {
      $message = Session::get('ActionMessage');
      $status = Session::get('ActionStatus');

      Session::clear('ActionStatus');
      Session::clear('ActionMessage');

      return http_build_query(array('ActionMessage' => $message, 'ActionStatus' => $status));
    }
    return '';
  }
}