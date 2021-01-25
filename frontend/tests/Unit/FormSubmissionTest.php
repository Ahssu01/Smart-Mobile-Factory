<?php

namespace Tests\Feature;


use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class FormSubmissionTest extends BaseTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

    public function testFormSuccess()
    {
        $this->get('/')
            ->type('01/06/2021', 'date_from')
            ->type('01/07/2021', 'date_to')
            ->press('Render')
            ->see('Data Generated Successfully!');

    }


    public function testFormError()
    {
        $this->get('/')
            ->type('01/06/2021', 'date_from')
            ->type('01/07/2021', 'date_to')
            ->press('Render')
            ->see('End Date should be greater by the Start date!');

    }

}
