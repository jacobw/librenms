<?php

/**
 * AlertlogController.php
 *
 * -Description-
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @link       https://www.librenms.org
 *
 * @copyright  2018 Tony Murray
 * @author     Tony Murray <murraytony@gmail.com>
 */

namespace App\Http\Controllers\Widgets;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AlertlogController extends WidgetController
{
    protected string $name = 'alertlog';
    protected $defaults = [
        'title' => null,
        'device_id' => '',
        'device_group' => null,
        'state' => null,
        'severity' => [],
        'time_interval' => null,
        'hidenavigation' => 0,
    ];

    public function getView(Request $request): View
    {
        $data = $this->getSettings();
        $data['time_intervals'] = $this->timeIntervals($data['time_interval']);

        return view('widgets.alertlog', $data);
    }

    public function getSettingsView(Request $request): View
    {
        $data = $this->getSettings(true);
        $data['severities'] = [
            // alert_rules.status is enum('ok','warning','critical')
            'ok' => 1,
            'warning' => 2,
            'critical' => 3,
        ];

        return view('widgets.settings.alertlog', $data);
    }

    /**
     * Time ranges offered by the widget dropdown, in days. A saved value outside
     * the fixed set is included so the widget still offers what is configured.
     *
     * @return array<string, int>
     */
    private function timeIntervals(mixed $configured): array
    {
        $intervals = [
            'Last 24 hours' => 1,
            'Last 3 days' => 3,
            'Last 7 days' => 7,
            'Last 30 days' => 30,
        ];

        if (is_numeric($configured) && ! in_array((int) $configured, $intervals)) {
            $intervals[__('Last :days days', ['days' => (int) $configured])] = (int) $configured;
            asort($intervals);
        }

        return $intervals;
    }
}
