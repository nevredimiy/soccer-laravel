<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\SeriesMeta;
use App\Models\Tournament;
use App\Models\Team;
use App\Models\Matche;
use Carbon\Carbon;
use App\Services\SeriesTemplatesService;


class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;


    protected function afterCreate(): void
    {
        $data = $this->form->getState();

        $event = $this->record;
        $tournament = Tournament::find($data['tournament_id']);

        if (!$tournament) {
            return; // или логгируй ошибку
        }

        $this->createSeriesMeta(
            tournament: $tournament,
            eventId: $event->id,
            data: $data,
        );

        $this->createTeams($data['teams'] ?? [], $event->id);
        // $this->createMatches($event->id, $data['series'] ?? [], $data['rounds'] ?? []);

        $this->redirect(EventResource::getUrl());
    }

    // Создание метаданных для серий
    protected function createSeriesMeta(Tournament $tournament, int $eventId, array $data): void
    {
        $series = collect();
    
        for ($round = 1; $round <= $tournament->count_rounds; $round++) {
            for ($seriesIndex = 1; $seriesIndex <= $tournament->count_series; $seriesIndex++) {
                $series->push([
                    'round' => $round,
                    'series' => $seriesIndex,
                ]);
            }
        }
    
        // Преобразуем даты в объекты Carbon
        $startDate = Carbon::parse($data['series_start_all']);
        $endDate = Carbon::parse($data['series_end_all']);
    
        $series->each(function ($item, $index) use (
            $eventId, $data, $tournament, &$startDate, &$endDate
        ) {
            SeriesMeta::create([
                'event_id' => $eventId,
                'stadium_id' => $data['stadium_id'],
                'league_id' => $data['league_id'],
                'size_field' => $data['size_field'],
                'start_date' => $startDate->copy(),
                'end_date' => $endDate->copy(),
                'round' => $item['round'],
                'series' => $item['series'],
                'price' => $data['series_price_all'],
            ]);
    
            // Увеличиваем дату на 7 дней только если подтип регулярный
            if ($tournament->subtype === 'regular') {
                $startDate->addDays(7);
                $endDate->addDays(7);
            }
        });
    }

    // Создание команд
    protected function createTeams(array $teams, int $eventId): void
    {
        foreach ($teams as $teamData) {
            Team::create([
                'event_id' => $eventId,
                'owner_id' => auth()->id(),
                'name' => $teamData['name'],
                'color_id' => $teamData['color_id'],
                'status' => 'paid',
            ]);
        }
    }

    // Создания матчей
    // protected function createMatches( int $eventId, int $series, int $round): void
    // {
    //     $seriesTemplatesService = new SeriesTemplatesService();
    //     $teamIds = Team::where('event_id', $eventId)->pluck('id')->toArray();
    //     $matches = $seriesTemplatesService->getSeries($series, $teamIds);
        
    //     // foreach ($matches as $matchData) {
    //     //     Matche::create([
    //     //         'event_id' => $eventId,
    //     //         'team1_id' => $matchData['team1_id'],
    //     //         'team2_id' => $matchData['team2_id'],
    //     //         'date' => Carbon::parse($matchData['date']),
    //     //         'stadium_id' => $matchData['stadium_id'],
    //     //     ]);
    //     // }
    // }
}

