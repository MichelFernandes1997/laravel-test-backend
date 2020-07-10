<?php

namespace Tests\Unit;

use Tests\TestCase;

class ImovelTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateImovel()
    {
        $this->post('/imoveis', $data);
    }
}
