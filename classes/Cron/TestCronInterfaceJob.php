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

namespace ILIAS\Plugin\TestCronInterface\Cron;

use ilLogger;
use ilTestCronInterfacePlugin;
use ILIAS\Cron\CronJob;
use ILIAS\Cron\Job\Schedule\JobScheduleType;
use ILIAS\Cron\Job\JobResult;

class TestCronInterfaceJob extends CronJob
{
    private ilTestCronInterfacePlugin $plugin;
    private ilLogger $logger;

    public function __construct(ilTestCronInterfacePlugin $plugin, ilLogger $logger)
    {
        $this->plugin = $plugin;
        $this->logger = $logger;
    }


    public function getTitle(): string
    {
        return \sprintf('Title Test of: %s', self::class);
    }

    public function getDescription(): string
    {
        return \sprintf('Description Test of: %s', self::class);
    }

    public function getId(): string
    {
        return 'testcroninterface_job';
    }

    public function hasAutoActivation(): bool
    {
        return true;
    }

    public function hasFlexibleSchedule(): bool
    {
        return true;
    }

    public function getDefaultScheduleType(): JobScheduleType
    {
        return JobScheduleType::DAILY;
    }

    public function getDefaultScheduleValue(): int
    {
        return 1;
    }

    public function isManuallyExecutable(): bool
    {
        return \defined('DEVMODE') && (bool) DEVMODE;
    }

    public function run(): JobResult
    {
        $this->logger->info('Started job');

        $result = new JobResult();
        $result->setStatus(JobResult::STATUS_OK);
        $result->setMessage('Successfully finished job');

        $this->logger->info($result->getMessage());

        return $result;
    }
}
