<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['pending', 'reviewed', 'in_progress', 'resolved', 'rejected'];
        $priorities = ['low', 'medium', 'high', 'urgent'];
        
        return [
            'user_id' => User::factory(),
            'category_id' => ReportCategory::factory(),
            'title' => $this->faker->sentence(6),
            'description' => implode(' ', $this->faker->paragraphs(3)),
            'location_address' => $this->faker->address,
            'latitude' => $this->faker->latitude(-6.3, -6.1), // Jakarta area
            'longitude' => $this->faker->longitude(106.7, 106.9), // Jakarta area
            'status' => $this->faker->randomElement($statuses),
            'priority' => $this->faker->randomElement($priorities),
            'report_number' => 'LP-' . date('Y') . '-' . str_pad($this->faker->unique()->numberBetween(1, 999999), 6, '0', STR_PAD_LEFT),
            'reported_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'resolved_at' => $this->faker->optional(0.3)->dateTimeBetween('-1 month', 'now'),
            'admin_notes' => $this->faker->optional(0.4)->sentence(10),
            'assigned_to' => $this->faker->optional(0.3)->numberBetween(1, 3), // Assuming admin IDs
            'views_count' => $this->faker->numberBetween(0, 500),
            'is_public' => $this->faker->boolean(90), // 90% chance of being public
        ];
    }

    /**
     * Indicate that the report is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'resolved_at' => null,
        ]);
    }

    /**
     * Indicate that the report is in progress.
     */
    public function inProgress(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'in_progress',
            'resolved_at' => null,
        ]);
    }

    /**
     * Indicate that the report is resolved.
     */
    public function resolved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'resolved',
            'resolved_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ]);
    }

    /**
     * Indicate that the report is high priority.
     */
    public function highPriority(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority' => 'high',
        ]);
    }

    /**
     * Indicate that the report is urgent.
     */
    public function urgent(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority' => 'urgent',
        ]);
    }

    /**
     * Indicate that the report is private.
     */
    public function private(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_public' => false,
        ]);
    }
}
