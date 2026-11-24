<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppointmentsFixture
 */
class AppointmentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'patient_id' => 1,
                'doctor_id' => 1,
                'appointment_date' => '2026-11-23',
                'created' => '2026-11-23 14:43:04',
                'modified' => '2026-11-23 14:43:04',
            ],
        ];
        parent::init();
    }
}
