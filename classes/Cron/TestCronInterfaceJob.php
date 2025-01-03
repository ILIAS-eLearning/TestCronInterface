<?php

/* Copyright (c) 1998-2021 ILIAS open source, Extended GPL, see docs/LICENSE */

declare(strict_types=1);

namespace ILIAS\Plugin\TestCronInterface\Cron;

use ilCronJob;
use ilCronJobResult;
use ilLogger;
use ILIAS\Cron\Schedule\CronJobScheduleType;
use ILIAS\Language\Language;
use ILIAS\Logging\LoggerFactory;

/**
 * Class TestCronInterfaceJob
 * @package ILIAS\Plugin\TestCronInterface\Cron
 * @author Michael Jansen <mjansen@databay.de>
 */
class TestCronInterfaceJob extends ilCronJob
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return sprintf("Title Test of: %s", self::class);
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return sprintf("Description Test of: %s", self::class);
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return 'testcroninterface_job';
    }

    /**
     * @inheritDoc
     */
    public function hasAutoActivation(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function hasFlexibleSchedule(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultScheduleType(): \ILIAS\Cron\Schedule\CronJobScheduleType
    {
        return \ILIAS\Cron\Schedule\CronJobScheduleType::SCHEDULE_TYPE_DAILY;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultScheduleValue(): int
    {
        return 1;
    }

    /**
     * @return bool
     */
    public function isManuallyExecutable(): bool
    {
        return defined('DEVMODE') && (bool) DEVMODE;
    }

    /**
     * @inheritDoc
     */
    public function run(): ilCronJobResult
    {
        $logger = $this->logger_factory::getRootLogger();
        $logger->info('Started job');

        $result = new ilCronJobResult();
        $result->setStatus(ilCronJobResult::STATUS_OK);
        $result->setMessage('Successfully finished job');

        $logger->info($result->getMessage());

        return $result;
    }
}
