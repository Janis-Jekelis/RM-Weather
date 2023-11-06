<?php
declare(strict_types=1);
namespace App\Models;
class Weather
{
    private const LAT=51.5156177;
    private const LON=-0.0919983;
    private const API="cb83333448e235c04243409d28d8e88b";
    private object $response;
    private float $temp;
    private float $windSpeed;
    private string $weatherDescription;
    public function __construct()
    {
        $lat=self::LAT;
        $lon=self::LON;
        $key=self::API;
        $this->response=(json_decode(file_get_contents(
            "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$key&units=metric"
        ))) ;
    }


    public function getTemp(): float
    {
        return $this->response->main->temp;
    }

        public function getWindSpeed(): float
    {
        return $this->response->wind->speed;
    }

    public function getWeatherDescription(): string
    {
        return $this->response->weather[0]->description;
    }
}
