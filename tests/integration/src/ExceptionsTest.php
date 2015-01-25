<?php

namespace Tests\Integration;

use Nette\Application\IPresenterFactory;
use Nette\Application\Request;
use Nette\Application\UI\Presenter;

/**
 * @author Jáchym Toušek <enumag@gmail.com>
 */
class ExceptionsTest extends Test
{

	/**
	 * @expectedException Arachne\Verifier\Exception\NotSupportedException
	 * @expectedExceptionMessage Rules for render methods are not supported. Define the rules for action method instead.
	 */
	public function testRenderMethod()
	{
		$this->guy->amOnPage('/article/view');
	}

	/**
	 * @expectedException Nette\Application\BadRequestException
	 * @expectedExceptionCode 404
	 * @expectedExceptionMessage Action 'Tests\Integration\Classes\ArticlePresenter::actionUndefinedAction' does not exist.
	 */
	public function testUndefinedAction()
	{
		$request = new Request('Article', 'GET', [
			Presenter::ACTION_KEY => 'UndefinedAction',
		]);
		$this->guy
			->grabService(IPresenterFactory::class)
			->createPresenter('Article')
			->run($request);
	}

}