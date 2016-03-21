<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{

		$this->renderPartial('index','','','',$processOutput=true);
	}

	public function actionCopy()
	{
		$this->renderPartial('copy');
	}
}