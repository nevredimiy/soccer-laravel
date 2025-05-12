<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Team;
use App\Models\SeriesMeta;
use App\Services\SeriesTemplatesService;

class ManagerSeriesController extends Controller
{
    public function index()
    {
        return view('manager/series/index');
    }

    public function show($id)
    {
        session()->forget(['selected-type', 'selected-player', 'selected-match', 'selected-teamId']);
        $seriesMeta = SeriesMeta::with('seriesPlayers')->findOrFail($id);
        $event = Event::with('tournament')->findOrFail($seriesMeta->event_id);

        $seriesPlayers = $seriesMeta->seriesPlayers->groupBy('team_id');

        $service = new SeriesTemplatesService();

        $teams = Team::with('color')->where('event_id', $event->id)->get()->toArray();

        $series = $service->getTemplateCalendar($event->tournament->count_teams);
        $template = $series[$seriesMeta->series - 1][$seriesMeta->round - 1];
        $templateMatches = $service ->getMatchTemplate();
        

        // Создаём ассоциативный массив цветов команд
        $teamColors = [];
        foreach ($teams as $team) {
            $teamColors[$team['id']] = $team['color']['color_picker'] ?? '#ddd';
        }

        // Собираем список команд для текущей серии по шаблону
        $teamIdsInSeries = [];
        foreach ($template as $idx) {
            $teamIdsInSeries[] = $teams[$idx]['id'];
        }

        // Создаем массив игроков по номерам для каждой команды
        $playersByNumberByTeamId = [];
        foreach ($seriesPlayers as $players) {
            foreach ($players as $player) {
                $teamId = $player->team_id;
                if (!isset($playersByNumberByTeamId[$teamId])) {
                    $playersByNumberByTeamId[$teamId] = [];
                }
                $playersByNumberByTeamId[$teamId][$player->player_number] = $player;
            }
        }

        return view('manager/series/show', compact(
            'id',
            'event',
            'teamIdsInSeries',
            'playersByNumberByTeamId',
            'teamColors',
            'templateMatches'
        ));
    }
}