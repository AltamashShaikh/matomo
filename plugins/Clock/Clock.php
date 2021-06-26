<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\Clock;

class Clock extends \Piwik\Plugin
{
    public function registerEvents()
    {
        return [
            'CronArchive.getArchivingAPIMethodForPlugin' => 'getArchivingAPIMethodForPlugin',
            'AssetManager.getStylesheetFiles' => 'getStylesheetFiles',
            'AssetManager.getJavaScriptFiles' => 'getJavaScriptFiles',
        ];
    }

    // support archiving just this plugin via core:archive
    public function getArchivingAPIMethodForPlugin(&$method, $plugin)
    {
        if ($plugin == 'Clock') {
            $method = 'Clock.getExampleArchivedMetric';
        }
    }

    public function getStylesheetFiles(&$files)
    {
        $files[] = "plugins/Clock/stylesheets/clock.css";
    }

    public function getJavaScriptFiles(&$files)
    {
        $files[] = "plugins/Clock/javascripts/clock.js";
    }
}
