<?php

/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Yasumi\Provider;

use Yasumi\Holiday;

/**
 * Provider for all holidays in Estonia.
 *
 * @author Gedas Lukošius <gedas@lukosius.me>
 */
class Estonia extends AbstractProvider
{
    use CommonHolidays, ChristianHolidays;

    const DECLARATION_OF_INDEPENDENCE_YEAR = 1918;

    const VICTORY_DAY_START_YEAR = 1934;

    const RESTORATION_OF_INDEPENDENCE_YEAR = 1991;

    /**
     * Code to identify this Holiday Provider. Typically this is the ISO3166 code corresponding to the respective
     * country or sub-region.
     */
    const ID = 'EE';

    /**
     * Initialize holidays for Estonia.
     *
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function initialize()
    {
        $this->timezone = 'Europe/Tallinn';

        // Official
        $this->addHoliday($this->newYearsDay($this->year, $this->timezone, $this->locale));
        $this->addIndependenceDay();
        $this->addHoliday($this->goodFriday($this->year, $this->timezone, $this->locale));
        $this->addHoliday($this->easter($this->year, $this->timezone, $this->locale));
        $this->addHoliday($this->internationalWorkersDay($this->year, $this->timezone, $this->locale));
        $this->addHoliday($this->pentecost($this->year, $this->timezone, $this->locale));
        $this->addVictoryDay();
        $this->addHoliday($this->stJohnsDay($this->year, $this->timezone, $this->locale));
        $this->addRestorationOfIndependenceDay();
        $this->addHoliday($this->christmasEve($this->year, $this->timezone, $this->locale, Holiday::TYPE_OFFICIAL));
        $this->addHoliday($this->christmasDay($this->year, $this->timezone, $this->locale));
        $this->addHoliday($this->secondChristmasDay($this->year, $this->timezone, $this->locale));
    }

    /**
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    private function addIndependenceDay()
    {
        if ($this->year >= self::DECLARATION_OF_INDEPENDENCE_YEAR) {
            $this->addHoliday(new Holiday('independenceDay', [
                'en_US' => 'Independence Day',
                'et_EE' => 'Iseseisvuspäev'
            ], new \DateTime("{$this->year}-02-24", new \DateTimeZone($this->timezone))));
        }
    }

    /**
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    private function addVictoryDay()
    {
        if ($this->year >= self::VICTORY_DAY_START_YEAR) {
            $this->addHoliday(new Holiday('victoryDay', [
                'en_US' => 'Victory Day',
                'et_EE' => 'Võidupüha'
            ], new \DateTime("{$this->year}-06-23", new \DateTimeZone($this->timezone))));
        }
    }

    /**
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    private function addRestorationOfIndependenceDay()
    {
        if ($this->year >= self::RESTORATION_OF_INDEPENDENCE_YEAR) {
            $this->addHoliday(new Holiday('restorationOfIndependenceDay', [
                'en_US' => 'Day of Restoration of Independence',
                'et_EE' => 'Tasiseseisvumispäev'
            ], new \DateTime("{$this->year}-08-20", new \DateTimeZone($this->timezone))));
        }
    }
}
