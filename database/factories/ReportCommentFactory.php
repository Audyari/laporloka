<?php

namespace Database\Factories;

use App\Models\ReportComment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportComment>
 */
class ReportCommentFactory extends Factory
{
    protected $model = ReportComment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commentTypes = ['comment', 'status_change', 'admin_note'];
        
        return [
            'report_id' => Report::factory(),
            'user_id' => User::factory(),
            'content' => $this->faker->paragraph(3),
            'type' => $this->faker->randomElement($commentTypes),
            'is_internal' => $this->faker->boolean(20), // 20% chance of being internal
        ];
    }

    /**
     * Indicate that the comment is a public comment.
     */
    public function public(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'comment',
            'is_internal' => false,
        ]);
    }

    /**
     * Indicate that the comment is a status change.
     */
    public function statusChange(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'status_change',
            'content' => $this->faker->randomElement([
                'Status diubah dari pending ke reviewed',
                'Status diubah dari reviewed ke in_progress', 
                'Status diubah dari in_progress ke resolved',
                'Laporan telah ditinjau ulang',
                'Laporan sedang dalam proses penanganan',
                'Laporan telah selesai ditangani',
            ]),
        ]);
    }

    /**
     * Indicate that the comment is an admin note.
     */
    public function adminNote(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'admin_note',
            'is_internal' => true,
            'content' => $this->faker->sentence(8),
        ]);
    }

    /**
     * Indicate that the comment is internal.
     */
    public function internal(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_internal' => true,
        ]);
    }
}
