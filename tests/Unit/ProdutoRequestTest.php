<?php

namespace Tests\Unit;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProdutoRequestTest extends TestCase
{

    /** @test */
    public function rules_returns_array()
    {
        $request = new ProdutoRequest();
        $this->assertIsArray($request->rules());
    }
}
