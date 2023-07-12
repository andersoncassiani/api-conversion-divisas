<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ConversionDivisa extends Component
{
    public $amount;
    public $from;
    public $to;
    public $resultConversionAmount = 0;
    public $divisas = [];

    public function render()
    {
        return view('livewire.conversion-divisa');
    }
    //Constructor function que inicializa variables y no es modificadas 
    public function mount()
    {
        $this->divisas = ['USD', 'CAD', 'EUR', 'COP', 'NOK', 'RUB', 'ZAR', 'MXN'];
    }

    public function getConversion()
    {
        try {
            $url = 'https://api.fastforex.io/convert';
            $params = [
                'api_key' => '70d2e8be59-ded2069958-rksu8h',
                'amount'  => $this->amount,
                'to'      => $this->to,
                'from'    => $this->from,

            ];
            $request = Http::get($url, $params);
            $response = $request->json();
            $this->resultConversionAmount = $response['result'][$this->to];
        } catch (Exception $th) {
            dd($th->getMessage());
        }
    }
}
