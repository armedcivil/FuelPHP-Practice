<?php

use Fuel\Core\View;

class Controller_Articles extends Controller_Base
{
  const COUNT_PER_PAGE = 10;

  function action_index()
  {
    $this->_title = "Articles";
    $data = array();

    $page = max(intval($this->param('page')), 1);

    $articles = Model_Article::find_all($this::COUNT_PER_PAGE, ($page - 1) * $this::COUNT_PER_PAGE);
    if ($articles) {
      $data['articles'] = $articles;
    }
    return View::forge('articles/index', $data);
  }

  function action_show()
  {
    $id = intval($this->param('id'));
    $data['data'] = Model_Article::find_by_pk($id);
    if (!$data['data']) 
    {
      return Response::redirect('/404');
    }
    return View::forge('articles/show', $data);
  }
}