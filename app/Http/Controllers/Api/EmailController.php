<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuccessfulEmailsRequest;
use App\Http\Requests\UpdateSuccessfulEmailsRequest;
use App\Models\SuccessfulEmails;
use App\Traits\emailParseTrait;

class EmailController extends Controller
{
    use emailParseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SuccessfulEmails::query()->orderBy('id', 'desc')->paginate(5);

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuccessfulEmailsRequest $request)
    {
        $data = $request->validated();
        $data['raw_text'] = $this->emailParse($data['email']);
        $email = SuccessfulEmails::create($data);

        return response()->json($email, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = SuccessfulEmails::findOrFail($id);

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuccessfulEmailsRequest $request, $id)
    {
        $data = SuccessfulEmails::findOrFail($id);
        $dataValidated = $request->validated();
        $data->update($dataValidated);

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = SuccessfulEmails::find($id);

        if ($data) {
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Email deleted successfully.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email not found.'
            ], 404);
        }
    }
}
