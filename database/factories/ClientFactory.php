<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tenants = [
            '11111111', '11112222', '11113333', 
            '22221111', '22222222', '22223333', 
            '33331111', '33332222', '33333333', 
        ];

        $tenant = $tenants[rand(0, count($tenants) - 1)];
        
        return [
            //
            'name' => $this->faker->name,
            'client_id' => $this->faker->unique()->numberBetween(1, 10000000),
            'tenant_code' => $tenant,

            //日付区分の為に簡易で作成
            'registed_at'=> now(),
            'reserved_at'=> now()->addDays(15),
            'checked_at'=> now()->addDays(30),
        ];
    }
}
