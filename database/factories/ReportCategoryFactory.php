<?php

namespace Database\Factories;

use App\Models\ReportCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportCategory>
 */
class ReportCategoryFactory extends Factory
{
    protected $model = ReportCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Jalan Rusak' => ['icon' => 'road', 'color' => '#8B4513'],
            'Penerangan Jalan' => ['icon' => 'lightbulb', 'color' => '#FFD700'],
            'Sampah' => ['icon' => 'trash', 'color' => '#228B22'],
            'Drainase' => ['icon' => 'water', 'color' => '#4682B4'],
            'Taman' => ['icon' => 'tree', 'color' => '#32CD32'],
            'Fasilitas Umum' => ['icon' => 'building', 'color' => '#708090'],
            'Keamanan' => ['icon' => 'shield', 'color' => '#DC143C'],
            'Lalu Lintas' => ['icon' => 'car', 'color' => '#FF6347'],
            'Kesehatan' => ['icon' => 'heart', 'color' => '#FF69B4'],
            'Pendidikan' => ['icon' => 'book', 'color' => '#4169E1'],
        ];

        $category = $this->faker->randomElement(array_keys($categories));
        $categoryData = $categories[$category];

        return [
            'name' => $category,
            'slug' => Str::slug($category) . '-' . $this->faker->unique()->randomNumber(4),
            'description' => $this->faker->sentence(10),
            'icon' => $categoryData['icon'],
            'color' => $categoryData['color'],
            'is_active' => true,
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
