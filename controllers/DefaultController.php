<?php

/**
* 
*/
class DefaultController
{
	
	public function actionIndex()
	{
		include_once ROOT.'/views/site/index.php';
		return true;
	}
}