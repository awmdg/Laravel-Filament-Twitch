<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $userCount = User::count();
        $postCount = Post::count();
        $writerCount = Role::where('name', 'Writer')->firstOrFail()->users()->count();
        $moderatorCount = Role::where('name', 'Moderator')->firstOrFail()->users()->count();
        $bounceRate = '21%';

        return [
            Stat::make('Total Posts', $postCount)
                ->description('Total post of users')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Moderator Users', $moderatorCount)
                ->description('Total number of registered users')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('indigo'), // Enhanced color scheme

            Stat::make('Writer Users', $writerCount)
                ->description('Number of users named Writer')
                ->descriptionIcon('heroicon-o-pencil')
                ->color('orange'), // Enhanced color scheme

        ];
    }

    public function view(): \Illuminate\View\View
    {
        return view('widgets.stats_overview', [
            'stats' => $this->getStats(),
        ]);
    }
}
