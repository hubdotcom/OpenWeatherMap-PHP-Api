<?php
/**
 * OpenWeatherMap-PHP-API — An php api to parse weather data from http://www.OpenWeatherMap.org .
 *
 * @license MIT
 *
 * Please see the LICENSE file distributed with this source code for further
 * information regarding copyright and licensing.
 *
 * Please visit the following links to read about the usage policies and the license of OpenWeatherMap before using this class.
 * @see http://www.OpenWeatherMap.org
 * @see http://www.OpenWeatherMap.org/about
 * @see http://www.OpenWeatherMap.org/copyright
 * @see http://openweathermap.org/appid
 */

namespace Cmfcmf\OpenWeatherMap\Fetcher;

class FileGetContentsFetcherTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        if (!ini_get('allow_url_fopen')) {
            $this->markTestSkipped('"allow_url_fopen" is set to off.');
        }
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testInvalidUrl()
    {
        $fetcher = new FileGetContentsFetcher();

        $fetcher->fetch('http://notexisting.example.com/');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testEmptyUrl()
    {
        $fetcher = new FileGetContentsFetcher();

        $fetcher->fetch('');
    }

    public function testValidUrl()
    {
        $fetcher = new FileGetContentsFetcher();

        $content = $fetcher->fetch('http://www.example.com');

        $this->assertContains('Example Domain', $content);
    }
}