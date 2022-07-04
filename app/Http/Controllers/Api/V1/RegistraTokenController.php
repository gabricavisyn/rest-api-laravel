<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\RegistraTokenRequest;
use App\Http\Resources\RegistraTokenResource;
use App\Mail\ResponseAuthorization;
use App\Models\TokenApiIts;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistraTokenController extends ApiController
{
    public function registra(RegistraTokenRequest $request)
    {
        $data = collect($request->validated());
        abort_if($data->get('passwordUniversale') != "its-mobile-2022",401);

        $token = sha1($data->get('emailIts').Str::random(40));
        $model = new TokenApiIts([
            'email' => $data->get('emailIts'),
            'token' => $token
        ]);
        $model->save();
        Mail::to($model->email)->send(new ResponseAuthorization([
            'email' => $model->email,
            'token' => $model->token,
            'id' => $model->uuid
        ]));
        return new RegistraTokenResource($model);
    }
}
