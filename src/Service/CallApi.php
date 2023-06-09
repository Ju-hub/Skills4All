<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApi
{
    //J'utilise HttpClientInterface pour faire appel a l'api
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function getWeather(): array
    {
        //Jefais une requête GET pour interroger l'api avec l'url du site
        $response = $this->client->request(
            'GET',
            'https://api.open-meteo.com/v1/forecast?latitude=48.85&longitude=2.35&current_weather=true&hourly=temperature_2m&hourly=weathercode&timezone=Europe/Berlin&Weathermodels=GFS_Seamless'
        );
        
        return $response->toArray();
    }

    //Function pour pour récupérer le code meteo et en fonction du résultat afficher l'icone correspondante
    public function getIcon(){
        $data  = $this->getWeather();
        
        //J'affiche en fonction du resultat du weathercode l'image correspondante
        $weathercode = $data['hourly']['weathercode'][0];
        
        switch($weathercode){
                case 0 : $weathercode =  'https://cdn-icons-png.flaticon.com/128/4814/4814268.png';break;
                case 1|2|3 : $weathercode =  'https://cdn-icons-png.flaticon.com/128/1163/1163661.png';break;
                case 45|48:$weathercode =  'https://cdn-icons-png.flaticon.com/128/1163/1163624.png';break;
                case 51|53|55|56|57|61|63|65|66|67: $weathercode =  'https://cdn-icons-png.flaticon.com/128/3262/3262912.png';break;
                case 71|73|75|77|85|86: $weathercode =  'https://cdn-icons-png.flaticon.com/128/557/557706.png';break;
                case 95|96|99: $weathercode =  'https://cdn-icons-png.flaticon.com/128/1146/1146860.png';break;
        }
        
        return $weathercode;
        

    }
}
