<?php

/**
* test controller
*/
class NewsController
{
	
	public function actionIndex()
	{
		$newsList = News::getNewsList();

		include_once ROOT.'/views/news.php';

		return true;
	}

	public function actionView($id)
	{
		$model = new News();
		var_dump($model->getItemById($id));
		echo "Просмотр одной новости";
		return true;
	}
}