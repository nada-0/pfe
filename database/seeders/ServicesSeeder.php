<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            'Woodworking' => [
                ['name' => 'Furniture Building', 'description' => 'Custom furniture design and construction.'],
                ['name' => 'Cabinet Making', 'description' => 'Design and build custom cabinets for kitchens, bathrooms, and more.'],
                ['name' => 'Wood Carving', 'description' => 'Artistic wood carving for decorative purposes.'],
                ['name' => 'Woodturning', 'description' => 'Creating objects like bowls and spindles using a lathe.'],
                ['name' => 'Joinery', 'description' => 'Expert joinery for various woodworking projects.'],
                ['name' => 'Deck Building', 'description' => 'Construction of custom outdoor decks.'],
                ['name' => 'Shelving Installation', 'description' => 'Custom shelving solutions for homes and offices.']
            ],
            'Plumbing' => [
                ['name' => 'Leak Fixing', 'description' => 'Repair of leaking pipes and fixtures.'],
                ['name' => 'Pipe Installation', 'description' => 'Installation of new plumbing pipes.'],
                ['name' => 'Faucet Installation', 'description' => 'Installation of new faucets and taps.'],
                ['name' => 'Toilet Repair and Installation', 'description' => 'Repair or install new toilets.'],
                ['name' => 'Drain Cleaning', 'description' => 'Cleaning and unclogging of drains.'],
                ['name' => 'Water Heater Installation', 'description' => 'Install and repair water heaters.'],
                ['name' => 'Shower and Bathtub Installation', 'description' => 'Install or replace showers and bathtubs.']
            ],
            'Electrical' => [
                ['name' => 'Wiring Installation', 'description' => 'Complete home or office wiring installation.'],
                ['name' => 'Light Fixture Installation', 'description' => 'Install new light fixtures.'],
                ['name' => 'Outlet and Switch Installation', 'description' => 'Install new electrical outlets and switches.'],
                ['name' => 'Ceiling Fan Installation', 'description' => 'Install ceiling fans.'],
                ['name' => 'Electrical Panel Upgrade', 'description' => 'Upgrade electrical panels for better capacity and safety.'],
                ['name' => 'Home Automation Setup', 'description' => 'Set up home automation systems.'],
                ['name' => 'Solar Panel Installation', 'description' => 'Install solar panels for energy efficiency.']
            ],
            'Painting' => [
                ['name' => 'Interior Wall Painting', 'description' => 'Professional painting for interior walls.'],
                ['name' => 'Exterior House Painting', 'description' => 'Painting services for the exterior of homes.'],
                ['name' => 'Furniture Painting', 'description' => 'Painting and refinishing furniture.'],
                ['name' => 'Decorative Painting', 'description' => 'Artistic and decorative painting services.'],
                ['name' => 'Staining and Varnishing', 'description' => 'Wood staining and varnishing for a polished look.'],
                ['name' => 'Wallpaper Installation and Removal', 'description' => 'Professional wallpaper installation and removal.']
            ],
            'Gardening and Landscaping' => [
                ['name' => 'Lawn Care', 'description' => 'Lawn mowing, fertilizing, and maintenance.'],
                ['name' => 'Garden Bed Preparation', 'description' => 'Preparing garden beds for planting.'],
                ['name' => 'Planting Trees and Shrubs', 'description' => 'Planting trees and shrubs for landscaping.'],
                ['name' => 'Installing Irrigation Systems', 'description' => 'Install and maintain irrigation systems.'],
                ['name' => 'Landscape Design', 'description' => 'Professional landscape design services.'],
                ['name' => 'Deck and Patio Construction', 'description' => 'Building custom decks and patios.'],
                ['name' => 'Fence Building', 'description' => 'Construction of fences for privacy and security.']
            ],
            'Home Improvement' => [
                ['name' => 'Drywall Repair and Installation', 'description' => 'Repair or install new drywall.'],
                ['name' => 'Flooring Installation (Tile, Hardwood, Laminate)', 'description' => 'Install new flooring of various types.'],
                ['name' => 'Insulation Installation', 'description' => 'Install insulation to improve energy efficiency.'],
                ['name' => 'Door and Window Installation', 'description' => 'Install new doors and windows.'],
                ['name' => 'Roofing Repair and Installation', 'description' => 'Repair or replace roofing materials.'],
                ['name' => 'Concrete Work (Sidewalks, Driveways)', 'description' => 'Concrete installation for sidewalks and driveways.'],
                ['name' => 'Garage Organization', 'description' => 'Organize and optimize garage spaces.']
            ],
            'Automotive' => [
                ['name' => 'Oil Change', 'description' => 'Perform oil changes for vehicles.'],
                ['name' => 'Brake Replacement', 'description' => 'Replace brake pads and rotors.'],
                ['name' => 'Tire Installation and Rotation', 'description' => 'Install and rotate tires.'],
                ['name' => 'Battery Replacement', 'description' => 'Replace vehicle batteries.'],
                ['name' => 'Detailing and Cleaning', 'description' => 'Professional vehicle detailing and cleaning.'],
                ['name' => 'Minor Engine Repairs', 'description' => 'Perform minor engine repairs.'],
                ['name' => 'Installing Car Audio Systems', 'description' => 'Install car audio and entertainment systems.']
            ],
            'Crafts and DIY Decor' => [
                ['name' => 'Sewing and Tailoring', 'description' => 'Custom sewing and tailoring services.'],
                ['name' => 'Knitting and Crocheting', 'description' => 'Knitting and crocheting projects and tutorials.'],
                ['name' => 'Scrapbooking', 'description' => 'Create custom scrapbooks and memory books.'],
                ['name' => 'Candle Making', 'description' => 'Handmade candles and candle-making kits.'],
                ['name' => 'Jewelry Making', 'description' => 'Custom jewelry design and making.'],
                ['name' => 'Pottery and Ceramics', 'description' => 'Handmade pottery and ceramic art.'],
                ['name' => 'Upcycling and Repurposing Items', 'description' => 'Transform old items into new, usable products.']
            ],
            'Technology and Electronics' => [
                ['name' => 'Home Networking Setup', 'description' => 'Set up and optimize home networks.'],
                ['name' => 'Computer Assembly and Repair', 'description' => 'Assemble and repair computers.'],
                ['name' => 'Smart Home Device Installation', 'description' => 'Install and configure smart home devices.'],
                ['name' => 'Audio/Visual Equipment Setup', 'description' => 'Set up audio and visual equipment for homes.'],
                ['name' => 'Security Camera Installation', 'description' => 'Install and maintain security cameras.'],
                ['name' => 'Drone Assembly and Repair', 'description' => 'Assemble and repair drones.'],
                ['name' => '3D Printing and Prototyping', 'description' => '3D printing services and prototyping.']
            ],
            'Automated and Smart Home Projects' => [
                ['name' => 'Home Security System Installation', 'description' => 'Install and configure home security systems.'],
                ['name' => 'Smart Thermostat Setup', 'description' => 'Install and set up smart thermostats.'],
                ['name' => 'Voice-Activated Assistant Integration', 'description' => 'Integrate voice-activated assistants like Alexa and Google Home.'],
                ['name' => 'Automated Lighting Systems', 'description' => 'Install automated lighting systems.'],
                ['name' => 'Smart Door Lock Installation', 'description' => 'Install smart door locks for enhanced security.'],
                ['name' => 'Home Theater Setup', 'description' => 'Set up home theater systems.'],
                ['name' => 'Remote Control Blinds/Curtains', 'description' => 'Install remote control blinds and curtains.']
            ],
        ];

        foreach ($services as $categoryName => $serviceDetails) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($serviceDetails as $serviceDetail) {
                    $user = User::inRandomOrder()->first();
                    Service::create([
                        'name' => $serviceDetail['name'],
                        'description' => $serviceDetail['description'],
                        'category_id' => $category->id,
                        'user_id' => $user->id
                    ]);
                }
            }
        }
    }
}
