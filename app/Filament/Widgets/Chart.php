<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class Chart extends ChartWidget
{
    protected static ?string $heading = 'Post posted in a week';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Get the count of posts created for each day of the week (Monday to Sunday)
        $postsCreatedByDayOfWeek = Post::whereBetween('created_at', [now()->subWeek(), now()])
            ->get()
            ->groupBy(function ($post) {
                return Carbon::parse($post->created_at)->format('l');
            })
            ->map(function ($posts, $dayOfWeek) {
                return $posts->count();
            })
            ->toArray();
    
        // Initialize an array to hold the counts for each day of the week
        $counts = array_fill(0, 7, 0);
    
        // Map the counts to their respective days of the week
        foreach ($postsCreatedByDayOfWeek as $dayOfWeek => $count) {
            switch ($dayOfWeek) {
                case 'Monday':
                    $counts[0] = $count;
                    break;
                case 'Tuesday':
                    $counts[1] = $count;
                    break;
                case 'Wednesday':
                    $counts[2] = $count;
                    break;
                case 'Thursday':
                    $counts[3] = $count;
                    break;
                case 'Friday':
                    $counts[4] = $count;
                    break;
                case 'Saturday':
                    $counts[5] = $count;
                    break;
                case 'Sunday':
                    $counts[6] = $count;
                    break;
            }
        }
    
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created in the last week',
                    'data' => $counts,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
