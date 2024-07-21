<?php

use Fuel\Core\Controller;
use Fuel\Core\Presenter;
use Fuel\Core\View;

class Controller_Base extends Controller
{
  protected $_view;
  protected $_title;

  function before() 
  {
    $this->_view = View::forge('layout');
    $this->_view->set('head', View::forge('head'));
    $this->_view->set('header', View::forge('header'));
    $this->_view->set('head', View::forge('head'));
    $this->_view->set('footer', View::forge('footer'));
    return parent::before();
  }

  function after($response)
  {
    $_response = $response;

    if ($this->_title) {
      $this->_view->get('head')->set('title', $this->_title);
    }

    if ($response instanceof View) 
    {
      $this->_view->set('content', $response);
      $_response = $this->_view;
    }

    return parent::after($_response);
  } 
}