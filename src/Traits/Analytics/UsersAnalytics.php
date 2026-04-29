<?php

namespace Backstage\Analytics\Traits\Analytics;

use Backstage\Analytics\Period;
use Google\ApiCore\ApiException;
use Google\ApiCore\ValidationException;
use Illuminate\Support\Arr;

trait UsersAnalytics
{
    /**
     * @throws ApiException
     * @throws ValidationException
     */
    public function totalUsers(Period $period): int
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('totalUsers');

        $result = $this->getReport($googleAnalytics)
            ->dataTable;

        return (int) Arr::first(Arr::flatten($result));
    }

    /**
     * @throws ApiException
     * @throws ValidationException
     */
    public function totalUsersByDate(Period $period): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('date');

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    /**
     * @throws ApiException
     * @throws ValidationException
     */
    public function totalUsersByDatePerPage(Period $period): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('date')
            ->addDimensions('pagePath');

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    /**
     * @throws ApiException
     * @throws ValidationException
     */
    public function totalUsersBySessionSource(Period $period): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('sessionSource');

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    /**
     * @throws ApiException
     * @throws ValidationException
     */
    public function totalUsersBySessionMedium(Period $period): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('sessionMedium');

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    /**
     * @throws ApiException
     * @throws ValidationException
     */
    public function totalUsersBySessionDevice(Period $period): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('sessionDevice');

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }
}
