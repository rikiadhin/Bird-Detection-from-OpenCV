<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class ApiController extends Controller
{

    public function sendDataBird(String $sensor)
    {
        $now = Carbon::now('Asia/Jakarta');

        $filename = 'bird.json';
        $existingData = Storage::exists('json/' . $filename) ?
            json_decode(Storage::get('json/' . $filename), true) : [];

        if ($sensor !== 'camera' && $sensor !== 'radar') {
            return response()->json(['message' => 'Data gagal disimpan'], 400);
        }
        $newData = [
            'timestamp' => $now->toDateTimeString(),
            'bird' => true,
            'source' => $sensor,
        ];

        $existingData[] = $newData;

        Storage::put('json/' . $filename, json_encode($existingData, JSON_PRETTY_PRINT));

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function sendDataTemp(float $temp)
    {
        $now = Carbon::now('Asia/Jakarta');

        $filename = 'temperature.json';
        $existingData = Storage::exists('json/' . $filename) ?
            json_decode(Storage::get('json/' . $filename), true) : [];

        $newData = [
            'timestamp' => $now->toDateTimeString(),
            'temperature' => $temp,
        ];

        $existingData[] = $newData;

        Storage::put('json/' . $filename, json_encode($existingData, JSON_PRETTY_PRINT));

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }


    public function getData()
    {
        $now = Carbon::now('Asia/Jakarta');

        $birdFilePath = 'json/bird.json';
        $temperatureFilePath = 'json/temperature.json';

        if (Storage::exists($birdFilePath) && Storage::exists($temperatureFilePath)) {
            $birdData = Storage::get($birdFilePath);
            $temperatureData = Storage::get($temperatureFilePath);

            $decodedBirdData = json_decode($birdData, true);
            $decodedTemperatureData = json_decode($temperatureData, true);

            if ($decodedBirdData !== null && $decodedTemperatureData !== null) {
                $latestBirdEntry = end($decodedBirdData);
                $latestTemperatureEntry = end($decodedTemperatureData);

                $birdEntriesForCurrentDay = array_filter(
                    $decodedBirdData,
                    function ($entry) use ($now) {
                        return Carbon::parse($entry['timestamp'])->isSameDay($now);
                    }
                );
                $totalBirdOfTheDay = count($birdEntriesForCurrentDay);

                $combinedLatestData = [
                    'bird' => $latestBirdEntry,
                    'temperature' => $latestTemperatureEntry,
                    'totalBird' => $totalBirdOfTheDay,
                ];

                return response()->json($combinedLatestData, 200);
            } else {
                return response()->json(['message' => 'Error decoding JSON data'], 500);
            }
        } else {
            return response()->json(['message' => 'Data file does not exist'], 404);
        }
    }

    public static function getDataCamera()
    {
        $now = Carbon::now('Asia/Jakarta');

        $birdFilePath = 'json/bird.json';

        if (Storage::exists($birdFilePath)) {
            $birdData = Storage::get($birdFilePath);

            $decodedBirdData = json_decode($birdData, true);

            if ($decodedBirdData !== null) {
                $filteredBirdData = array_filter(
                    $decodedBirdData,
                    function ($entry) {
                        return $entry['source'] === 'camera';
                    }
                );

                $latestBirdEntry = end($filteredBirdData);

                if ($latestBirdEntry !== false) {
                    $latestBirdTimestamp = Carbon::parse($latestBirdEntry['timestamp'])->subHours(7);
                    $latestBirdTimestamp->setTimezone('Asia/Jakarta');

                    $timeDifferenceInSeconds = $now->diffInSeconds($latestBirdTimestamp);

                    $birdExist = $timeDifferenceInSeconds <= 15;

                    return response()->json($birdExist, 200);
                } else {
                    return response()->json(['message' => 'No camera entries found'], 404);
                }
            } else {
                return response()->json(['message' => 'Error decoding JSON data'], 500);
            }
        } else {
            return response()->json(['message' => 'Data file does not exist'], 404);
        }
    }
}
