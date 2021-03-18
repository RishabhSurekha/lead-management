<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Lead::class, function (Faker $faker) {
    return [
        'value' => $faker->numerify('#####'),
        'name' => $faker->name,
        'segment' => $faker->randomElement(["Pharma", "Tech", "Environmental", "Dental", "Life Sciences", "Industrial"]),
        'details' => $faker->text(20),
        'status' => $faker->randomElement(["open", "closed", "validated", "rejected"]),
        'by' => $faker->randomElement(["rahulyadav28march@gmail.com", "ravijangir.techfest@gmail.com", "ritwikkadu.iitb@gmail.com", "rohitk1701@gmail.com", "shashank.delhi@gmail.com", "shashwat.techfest@gmail.com", "shubhamanand.techfest@gmail.com", "04shubham2017@gmail.com", "siddharth.techfest@gmail.com", "tushar.techfest19@gmail.com", "viveksv.techfest@gmail.com"]),
        'for' => $faker->randomElement(["rahulyadav28march@gmail.com", "ravijangir.techfest@gmail.com", "ritwikkadu.iitb@gmail.com", "rohitk1701@gmail.com", "shashank.delhi@gmail.com", "shashwat.techfest@gmail.com", "shubhamanand.techfest@gmail.com", "04shubham2017@gmail.com", "siddharth.techfest@gmail.com", "tushar.techfest19@gmail.com", "viveksv.techfest@gmail.com"]),
    ];
});
