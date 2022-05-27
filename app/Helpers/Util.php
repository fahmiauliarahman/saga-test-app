<?php

namespace App\Helpers;

use App\Models\Article;
use App\Models\Category;

class Util
{
    public static function defaultFormatter(bool $status = true, string $message = "", array $data = [])
    {
        $result = [
            'status' => $status,
            'message' => $message,
        ];

        if (!empty($data)) {
            $result['data'] = $data;
        }
        return $result;
    }

    private static function _available_slug_model()
    {
        return [
            'article' => Article::class,
            'category' => Category::class,
        ];
    }

    public static function slugify(string $text, string $type, int $increment = 0, string $divider = "-")
    {
        $slug_model = self::_available_slug_model();

        if (array_key_exists($type, $slug_model)) {
            $model = $slug_model[$type];
            $slug = strtolower($text);
            $slug = preg_replace('/[^a-z0-9-]/', $divider, $slug);
            $slug = preg_replace('/-+/', $divider, $slug);
            $slug = rtrim($slug, $divider);
            $slug = $slug . $divider . $increment;
            $slug_count = $model::where('slug', $slug)->count();
            if ($slug_count > 0) {
                return self::slugify($text, $type, $increment + 1, $divider);
            }

            return self::defaultFormatter(true, "", ['slug' => $slug]);
        }

        return self::defaultFormatter(false, "Type not found. Registered type: " . implode(", ", array_keys($slug_model)));
    }
}
