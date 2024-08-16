<?php

namespace App\Http\Controllers\Api;

use App\Models\SuccessfulEmails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\emailParseTrait;

class SuccessfulEmailsController extends Controller
{

    use emailParseTrait;

    public function emailContentParser()
    {
        $updatedRawText = [];

        $allEmails = SuccessfulEmails::all();
        $emptyRows = $allEmails->where('raw_text', '');

        foreach ($emptyRows as $emptyRow) {
            $emailContent = $emptyRow['email'];
            $plainText = $this->emailParse($emailContent);

            $updatedRawText[] = SuccessfulEmails::where('id', $emptyRow['id'])->update(['raw_text' => $plainText]);
        }

        $data = json_encode($updatedRawText);

        return response()->json($data, 200);
    }
}
