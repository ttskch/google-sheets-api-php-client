<?php
namespace Ttskch\GoogleSheetsApi;

use PHPUnit\Framework\TestCase;

class GoogleSheetsApiTest extends TestCase
{
    /**
     * @var GoogleSheetsApi
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new GoogleSheetsApi;
    }

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\Ttskch\GoogleSheetsApi\GoogleSheetsApi', $actual);
    }
}
