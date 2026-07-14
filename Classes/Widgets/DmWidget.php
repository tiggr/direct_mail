<?php

declare(strict_types=1);

namespace DirectMailTeam\DirectMail\Widgets;

use DirectMailTeam\DirectMail\Widgets\Provider\DmProvider;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\View\BackendViewFactory;
use TYPO3\CMS\Dashboard\Widgets\RequestAwareWidgetInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetConfigurationInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetInterface;

class DmWidget implements WidgetInterface, RequestAwareWidgetInterface
{
    private ServerRequestInterface $request;

    /**
     * @var WidgetConfigurationInterface
     */
    private $configuration;

    /**
     * @var BackendViewFactory
     */
    private $backendViewFactory;

    /**
     * @var DmProvider
    */
    private $dataProvider;

    /**
     * @var array
     */
    private $options;

    public function __construct(
        WidgetConfigurationInterface $configuration,
        DmProvider $dataProvider,
        BackendViewFactory $backendViewFactory,
        array $options = []
    ) {
        $this->configuration = $configuration;
        $this->dataProvider = $dataProvider;
        $this->backendViewFactory = $backendViewFactory;
        $this->options = $options;
    }

    public function setRequest(ServerRequestInterface $request): void
    {
        $this->request = $request;
    }

    public function renderWidgetContent(): string
    {
        $view = $this->backendViewFactory->create($this->request, ['directmailteam/direct-mail']);
        $view->assignMultiple([
            'items' => $this->dataProvider->getDmPages(),
            'options' => $this->options,
            'configuration' => $this->configuration,
        ]);
        return $view->render('Dashboard/Widgets/DmWidget');
    }

    public function getOptions(): array
    {
        return [];
    }
}
