<?php

/**
 * This file is part of ILIAS, a powerful learning management system
 * published by ILIAS open source e-Learning e.V.
 *
 * ILIAS is licensed with the GPL-3.0,
 * see https://www.gnu.org/licenses/gpl-3.0.en.html
 * You should have received a copy of said license along with the
 * source code, too.
 *
 * If this is not the case or you just want to try ILIAS, you'll find
 * us at:
 * https://www.ilias.de
 * https://github.com/ILIAS-eLearning
 *
 *********************************************************************/

declare(strict_types=1);

use ILIAS\DI\Container;
use ILIAS\Plugin\TestCronInterface\Cron\TestCronInterfaceJob;

class ilTestCronInterfacePlugin extends ilUserInterfaceHookPlugin implements ilCronJobProvider
{
    private Container $dic;

    public function __construct(
        ilDBInterface $db,
        ilComponentRepositoryWrite $component_repository,
        string $id
    ) {
        global $DIC;

        $this->dic = $DIC;
        parent::__construct($db, $component_repository, $id);
    }

    protected function init(): void
    {
        parent::init();
        $this->registerAutoloader();
    }

    public function registerAutoloader(): void
    {
        require_once __DIR__ . '/../vendor/autoload.php';
    }

    public function getPluginName(): string
    {
        $class = substr(self::class, 2);
        $pluginPosition = strrpos($class, 'Plugin');

        return substr($class, 0, $pluginPosition);
    }

    public function getCronJobInstances(): array
    {
        return [
            new TestCronInterfaceJob($this, $this->dic->logger()->root()),
        ];
    }

    public function getCronJobInstance(string $jobId): ilCronJob
    {
        foreach ($this->getCronJobInstances() as $cronJob) {
            if ($jobId === $cronJob->getId()) {
                return $cronJob;
            }
        }

        throw new OutOfBoundsException(sprintf("Could not find any job for id '%s'", $jobId));
    }
}
