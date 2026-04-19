<?php

namespace Tests\Feature;

use App\Support\WebpImageUpload;
use Filament\Forms\Components\FileUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WebpUploadTest extends TestCase
{
    public function test_uploaded_images_are_converted_to_webp(): void
    {
        Storage::fake('public');

        $component = FileUpload::make('image')
            ->disk('public')
            ->directory('posts')
            ->visibility('public');

        $file = UploadedFile::fake()->image('cover.png', 1200, 800);

        $storedPath = WebpImageUpload::store($file, $component);

        $this->assertStringEndsWith('.webp', $storedPath);
        Storage::disk('public')->assertExists($storedPath);
    }
}
