<?php

namespace Tests\Unit;

use App\Http\Requests\UserRequest;
use Tests\TestCase;

class UserRequestTest extends TestCase
{
    /** @test */
    public function authorize_always_returns_true()
    {
        $request = new UserRequest();
        $this->assertTrue($request->authorize());
    }

    /** @test */
    public function rules_returns_expected_fields()
    {
        $request = new UserRequest();
        $rules = $request->rules();

        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('email', $rules);
        $this->assertArrayHasKey('password', $rules);
        $this->assertArrayHasKey('role', $rules);
    }

    /** @test */
    public function messages_returns_custom_messages()
    {
        $request = new UserRequest();
        $messages = $request->messages();

        $this->assertArrayHasKey('name.required', $messages);
        $this->assertArrayHasKey('email.required', $messages);
        $this->assertArrayHasKey('email.unique', $messages);
        $this->assertArrayHasKey('password.min', $messages);
    }
}
