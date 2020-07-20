<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Wallet;
use App\Transfer;

class WalletTest extends TestCase
{

    use  RefreshDatabase;
    /**
     * Testing que valida el retorno de los wallets 
     *
     * @return void
     */
    public function testGetWallet()
    {
        //Aquí estoy creando un wallet con el factory para usarlo en el testing
        $wallet = factory(Wallet::class)->create();
        
        //Aquí estoy creando tres transferencias con el factory para usarlo en el testing
        $transfers = factory(Transfer::class, 3)->create([
            //Estoy reemplazando el wallet_id que se va a generar automaticamente con el id
            //de el wallet anteriormente creado
            'wallet_id' => $wallet->id
        ]);
        

        $response = $this->json('GET', '/api/wallet');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'money',
            'transfers' => [
                '*' => [
                    'id',
                    'amount',
                    'description',
                    'wallet_id'
                ]
            ]
        ]);

        $this->assertCount(3, $response->json()['transfers']);

    }
}
