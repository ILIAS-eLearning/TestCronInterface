<?php declare(strict_types=1);
/* Copyright (c) 1998-2021 ILIAS open source, Extended GPL, see docs/LICENSE */

use ILIAS\DI\Container;
use ILIAS\Plugin\TestCronInterface\Cron\TestCronInterfaceJob;

/**
 * Class ilTestCronInterfacePlugin
 * @author Michael Jansen <mjansen@databay.de>
 */
class ilTestCronInterfacePlugin extends ilUserInterfaceHookPlugin
{
    private Container $dic;

    public function __construct(
        \ilDBInterface $db,
        \ilComponentRepositoryWrite $component_repository,
        string $id
    ) {
        global $DIC;

        $this->dic = $DIC;
        parent::__construct($db, $component_repository, $id);
    }

    /**
     * @inheritdoc
     */
    protected function init()
    {
        parent::init();
        $this->registerAutoloader();
    }

    public function registerAutoloader() : void
    {
        require_once __DIR__ . '/../vendor/autoload.php';
    }

    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        $class = substr(self::class, 2);
        $pluginPosition = strrpos($class, 'Plugin');

        return substr($class, 0, $pluginPosition);
    }

    /**
     * @inheritDoc
     */
    public function getCronJobInstances() : array
    {
        return [
            new TestCronInterfaceJob($this, $this->dic->logger()->root()),
        ];
    }

    /**
     * @inheritDoc
     */
    public function getCronJobInstance(string $jobId) : ilCronJob
    {
        foreach ($this->getCronJobInstances() as $cronJob) {
            if ($jobId === $cronJob->getId()) {
                return $cronJob;
            }
        }

        throw new OutOfBoundsException(sprintf("Could not find any job for id '%s'", $jobId));
    }
}
