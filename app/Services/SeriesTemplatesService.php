<?php
namespace App\Services;

class SeriesTemplatesService
{
    public function getSeries(int $count, array $teamIds): array
    {
        $series = [];

        if ($count === 4) {
            $series['series1'] = [
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[0], $teamIds[1], $teamIds[3]],
                [$teamIds[0], $teamIds[2], $teamIds[3]],
                [$teamIds[1], $teamIds[2], $teamIds[3]],
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[0], $teamIds[1], $teamIds[3]],
                [$teamIds[0], $teamIds[2], $teamIds[3]],
                [$teamIds[1], $teamIds[2], $teamIds[3]],
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[0], $teamIds[1], $teamIds[3]],
                [$teamIds[0], $teamIds[2], $teamIds[3]],
                [$teamIds[1], $teamIds[2], $teamIds[3]],
            ];
        }

        if ($count === 6) {
            $series['series1'] = [
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[4], $teamIds[1], $teamIds[3]],
                [$teamIds[3], $teamIds[4], $teamIds[2]],
                [$teamIds[5], $teamIds[1], $teamIds[2]],
                [$teamIds[4], $teamIds[2], $teamIds[1]],
                [$teamIds[1], $teamIds[3], $teamIds[0]],
                [$teamIds[5], $teamIds[1], $teamIds[3]],
                [$teamIds[3], $teamIds[2], $teamIds[0]],
                [$teamIds[1], $teamIds[0], $teamIds[4]],
                [$teamIds[5], $teamIds[4], $teamIds[0]],
            ];
            $series['series2'] = [
                [$teamIds[3], $teamIds[4], $teamIds[5]],
                [$teamIds[0], $teamIds[2], $teamIds[5]],
                [$teamIds[5], $teamIds[0], $teamIds[1]],
                [$teamIds[3], $teamIds[4], $teamIds[0]],
                [$teamIds[0], $teamIds[3], $teamIds[5]],
                [$teamIds[2], $teamIds[5], $teamIds[4]],
                [$teamIds[0], $teamIds[4], $teamIds[2]],
                [$teamIds[4], $teamIds[1], $teamIds[5]],
                [$teamIds[2], $teamIds[5], $teamIds[3]],
                [$teamIds[1], $teamIds[3], $teamIds[2]],
            ];
        }

        if ($count === 9) {
            $series['series1'] = [
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[0], $teamIds[3], $teamIds[6]],
                [$teamIds[0], $teamIds[4], $teamIds[8]],
                [$teamIds[0], $teamIds[5], $teamIds[7]],
                [$teamIds[1], $teamIds[2], $teamIds[3]],
                [$teamIds[1], $teamIds[4], $teamIds[7]],
                [$teamIds[1], $teamIds[5], $teamIds[0]],
                [$teamIds[1], $teamIds[6], $teamIds[8]],
                [$teamIds[2], $teamIds[6], $teamIds[1]],
                [$teamIds[2], $teamIds[7], $teamIds[0]],
            ];
            $series['series2'] = [
                [$teamIds[3], $teamIds[4], $teamIds[5]],
                [$teamIds[1], $teamIds[4], $teamIds[7]],
                [$teamIds[1], $teamIds[5], $teamIds[6]],
                [$teamIds[1], $teamIds[3], $teamIds[8]],
                [$teamIds[4], $teamIds[5], $teamIds[6]],
                [$teamIds[2], $teamIds[5], $teamIds[8]],
                [$teamIds[2], $teamIds[6], $teamIds[7]],
                [$teamIds[2], $teamIds[4], $teamIds[0]],
                [$teamIds[3], $teamIds[7], $teamIds[8]],
                [$teamIds[3], $teamIds[5], $teamIds[1]],
            ];
            $series['series3'] = [
                [$teamIds[6], $teamIds[7], $teamIds[8]],
                [$teamIds[2], $teamIds[5], $teamIds[8]],
                [$teamIds[2], $teamIds[3], $teamIds[7]],
                [$teamIds[2], $teamIds[4], $teamIds[6]],
                [$teamIds[7], $teamIds[8], $teamIds[0]],
                [$teamIds[3], $teamIds[6], $teamIds[0]],
                [$teamIds[8], $teamIds[0], $teamIds[1]],
                [$teamIds[4], $teamIds[7], $teamIds[1]],
                [$teamIds[4], $teamIds[5], $teamIds[0]],
                [$teamIds[4], $teamIds[6], $teamIds[8]],
            ];
        }

        return $series;
    }

    public function getTeamIds(int $count, int $seriesNum, int $roundNum)
    {
        if ($count === 4) {
            $series[1] = [
                [0, 1, 2],
                [0, 1, 3],
                [0, 2, 3],
                [1, 2, 3],
                [0, 1, 2],
                [0, 1, 3],
                [0, 2, 3],
                [1, 2, 3],
                [0, 1, 2],
                [0, 1, 3],
                [0, 2, 3],
                [1, 2, 3],
            ];
            return $series[$seriesNum][$roundNum];
        }

        if ($count === 6) {
            $series[1] = [
                [0, 1, 2],
                [4, 1, 3],
                [3, 4, 2],
                [5, 1, 2],
                [4, 2, 1],
                [1, 3, 0],
                [5, 1, 3],
                [3, 2, 0],
                [1, 0, 4],
                [5, 4, 0],
            ];
            $series[2] = [
                [3, 4, 5],
                [0, 2, 5],
                [5, 0, 1],
                [3, 4, 0],
                [0, 3, 5],
                [2, 5, 4],
                [0, 4, 2],
                [4, 1, 5],
                [2, 5, 3],
                [1, 3, 2],
            ];
            return $series[$seriesNum][$roundNum];
        }

        if ($count === 9) {
            $series[1] = [
                [0, 1, 2],
                [0, 3, 6],
                [0, 4, 8],
                [0, 5, 7],
                [1, 2, 3],
                [1, 4, 7],
                [1, 5, 0],
                [1, 6, 8],
                [2, 6, 1],
                [2, 7, 0],
            ];
            $series[2] = [
                [3, 4, 5],
                [1, 4, 7],
                [1, 5, 6],
                [1, 3, 8],
                [4, 5, 6],
                [2, 5, 8],
                [2, 6, 7],
                [2, 4, 0],
                [3, 7, 8],
                [3, 5, 1],
            ];
            $series[3] = [
                [6, 7, 8],
                [2, 5, 8],
                [2, 3, 7],
                [2, 4, 6],
                [7, 8, 0],
                [3, 6, 0],
                [8, 0, 1],
                [4, 7, 1],
                [4, 5, 0],
                [4, 6, 8],
            ];
            return $series[$seriesNum][$roundNum];
        }
    }

    public function getColorClass(string $colorName)
    {
        $colorClasses = [
            'Жовтий' => 'yellow-bg',
            'Помаранчевий' => 'orange-bg',
            'Зелений' => 'green-bg',
            'Сірий' => 'gray-bg',
            'Синій' => 'blue-bg',
            'Червоний' => 'red-bg',
            'Рожевий' => 'pink-bg',
            'Голубий' => 'sky-bg',
            'Лаймовий' => 'lime-bg'
        ];

        return  $colorClasses[$colorName];
    }
}
