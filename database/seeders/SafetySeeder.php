<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SafetySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $values = [
        "ABS",
        "Airbags",
        "Electronic Stability Control (ESC)",
        "Traction Control System (TCS)",
        "Adaptive Cruise Control (ACC)",
        "Blind Spot Monitoring (BSM)",
        "Lane Departure Warning (LDW)",
        "Forward Collision Warning (FCW)",
        "Automatic Emergency Braking (AEB)",
        "Backup Camera",
        "Tire Pressure Monitoring System (TPMS)",
        "Electronic Brakeforce Distribution (EBD)",
        "Brake Assist (BA)",
        "Vehicle Stability Assist (VSA)",
        "Collision Mitigation Braking System (CMBS)",
        "Pedestrian Detection System",
        "Cross Traffic Alert (CTA)",
        "Pre-Collision System",
        "Lane Keeping Assist (LKA)",
        "Emergency Brake Assist (EBA)",
        "Hill Start Assist (HSA)",
        "Dynamic Brake Control (DBC)",
        "Roll Stability Control (RSC)",
        "Emergency Stop Signal (ESS)",
        "Driver Attention Monitoring",
        "Traffic Sign Recognition",
        "Isofix Child Seat Anchors",
        "Whiplash Protection System (WPS)",
        "Rearview Camera",
        "Park Assist",
        "Automatic High Beams (AHB)",
        "Rain Sensing Wipers",
        "Automatic Headlights",
        "Child Safety Locks",
        "Anti-Whiplash Front Head Restraints",
        "Lane Departure Prevention",
        "Lane Change Assist",
        "Fatigue Detection System",
        "Adaptive Headlights",
        "Driver Knee Airbag",
        "Passenger Knee Airbag",
        "Side Impact Airbags",
        "Seatbelt Pretension",
        "Energy-absorbing Steering Column"
    ];
    public function run(): void
    {
        foreach ($this->values as $value) {
            DB::table('safeties')->insert([
                'name' => $value
            ]);
        }
    }
}
