<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $values = [
        "Air Conditioning (A/C)",
        "Xenon Headlights",
        "Heated Seats",
        "Power Windows",
        "Power Door Locks",
        "Keyless Entry",
        "Remote Start",
        "Power Adjustable Seats",
        "Leather Seats",
        "Sunroof/Moonroof",
        "Navigation System",
        "Bluetooth Connectivity",
        "USB Ports",
        "Auxiliary Input",
        "Touchscreen Display",
        "Apple CarPlay",
        "Android Auto",
        "Wireless Charging Pad",
        "Cruise Control",
        "Backup Camera",
        "Parking Sensors",
        "Blind Spot Monitoring",
        "Lane Departure Warning System",
        "Rain-Sensing Wipers",
        "Automatic Headlights",
        "Fog Lights",
        "Alloy Wheels",
        "Roof Rails",
        "Towing Package",
        "Fold-flat Seats",
        "Third-row Seating",
        "Rear Entertainment System",
        "Automatic Emergency Braking",
        "Adaptive Cruise Control",
        "Collision Warning System",
        "Power Tailgate",
        "360-degree Camera System",
        "Heated Steering Wheel",
        "Ventilated Seats",
        "Multi-zone Climate Control",
        "Adaptive Suspension",
    ];
    public function run(): void
    {
        foreach ($this->values as $value) {
            DB::table('equipment')->insert([
                'name' => $value,
            ]);
        }
    }
}
