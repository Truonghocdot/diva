<?php

namespace App\Support;

use Filament\Forms\Components\BaseFileUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use InvalidArgumentException;

class WebpImageUpload
{
    public static function store(UploadedFile $file, BaseFileUpload $component, int $quality = 85): string
    {
        $sourcePath = $file->getRealPath();

        if (! $sourcePath || ! file_exists($sourcePath)) {
            throw new InvalidArgumentException('Uploaded image file is missing.');
        }

        $image = self::createImageResource($sourcePath, $file->getMimeType() ?: $file->getClientMimeType());

        if (! $image) {
            throw new InvalidArgumentException('Unsupported image format for WebP conversion.');
        }

        self::prepareTransparency($image);

        $tempPath = tempnam(sys_get_temp_dir(), 'webp_');

        if ($tempPath === false) {
            imagedestroy($image);

            throw new InvalidArgumentException('Unable to create temporary file for WebP conversion.');
        }

        $webpTempPath = $tempPath . '.webp';

        if (! imagewebp($image, $webpTempPath, $quality)) {
            imagedestroy($image);
            @unlink($tempPath);

            throw new InvalidArgumentException('Failed to convert uploaded image to WebP.');
        }

        imagedestroy($image);
        @unlink($tempPath);

        $directory = trim((string) $component->getDirectory(), '/');
        $path = trim(($directory ? $directory . '/' : '') . Str::ulid() . '.webp', '/');

        $disk = $component->getDisk();

        $stream = fopen($webpTempPath, 'r');

        if ($stream === false) {
            @unlink($webpTempPath);

            throw new InvalidArgumentException('Failed to open converted WebP file.');
        }

        $disk->put($path, $stream, ['visibility' => $component->getVisibility() ?? 'public']);

        if (is_resource($stream)) {
            fclose($stream);
        }

        @unlink($webpTempPath);

        return $path;
    }

    protected static function createImageResource(string $path, ?string $mime): mixed
    {
        return match ($mime) {
            'image/jpeg', 'image/jpg' => imagecreatefromjpeg($path),
            'image/png' => imagecreatefrompng($path),
            'image/gif' => imagecreatefromgif($path),
            'image/webp' => imagecreatefromwebp($path),
            default => null,
        };
    }

    protected static function prepareTransparency(mixed $image): void
    {
        if (! is_object($image) && ! is_resource($image)) {
            return;
        }

        if (function_exists('imagepalettetotruecolor')) {
            imagepalettetotruecolor($image);
        }

        imagealphablending($image, true);
        imagesavealpha($image, true);
    }
}
