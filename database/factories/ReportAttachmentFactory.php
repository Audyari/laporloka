<?php

namespace Database\Factories;

use App\Models\ReportAttachment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportAttachment>
 */
class ReportAttachmentFactory extends Factory
{
    protected $model = ReportAttachment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mimeTypes = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'video/mp4',
            'video/avi',
        ];

        $mimeType = $this->faker->randomElement($mimeTypes);
        $filename = $this->faker->uuid() . '.' . $this->getExtensionFromMimeType($mimeType);

        return [
            'report_id' => Report::factory(),
            'user_id' => User::factory(),
            'filename' => $filename,
            'original_name' => $this->faker->words(3, true) . '.' . $this->getExtensionFromMimeType($mimeType),
            'mime_type' => $mimeType,
            'file_size' => $this->faker->numberBetween(1024, 10485760), // 1KB to 10MB
            'file_path' => 'reports/' . $filename,
            'description' => $this->faker->optional(0.6)->sentence(6),
            'is_public' => $this->faker->boolean(85), // 85% chance of being public
        ];
    }

    /**
     * Get file extension from MIME type.
     */
    private function getExtensionFromMimeType(string $mimeType): string
    {
        return match($mimeType) {
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'application/pdf' => 'pdf',
            'application/msword' => 'doc',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'video/mp4' => 'mp4',
            'video/avi' => 'avi',
            default => 'txt',
        };
    }

    /**
     * Indicate that the attachment is an image.
     */
    public function image(): static
    {
        return $this->state(fn (array $attributes) => [
            'mime_type' => $this->faker->randomElement(['image/jpeg', 'image/png', 'image/gif']),
            'filename' => $this->faker->uuid() . '.' . $this->faker->randomElement(['jpg', 'png', 'gif']),
            'original_name' => $this->faker->words(3, true) . '.' . $this->faker->randomElement(['jpg', 'png', 'gif']),
        ]);
    }

    /**
     * Indicate that the attachment is a document.
     */
    public function document(): static
    {
        return $this->state(fn (array $attributes) => [
            'mime_type' => $this->faker->randomElement([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ]),
        ]);
    }

    /**
     * Indicate that the attachment is a video.
     */
    public function video(): static
    {
        return $this->state(fn (array $attributes) => [
            'mime_type' => $this->faker->randomElement(['video/mp4', 'video/avi']),
            'filename' => $this->faker->uuid() . '.' . $this->faker->randomElement(['mp4', 'avi']),
            'original_name' => $this->faker->words(3, true) . '.' . $this->faker->randomElement(['mp4', 'avi']),
            'file_size' => $this->faker->numberBetween(1048576, 52428800), // 1MB to 50MB
        ]);
    }

    /**
     * Indicate that the attachment is private.
     */
    public function private(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_public' => false,
        ]);
    }
}
