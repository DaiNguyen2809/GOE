<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VietQRController extends Controller
{
    public function generateQR(Request $request)
    {
        $account_no = '12930757';
        $account_name = 'DAO DUY KHANG';
        $amountString =  $request->amount_qr;
        $amount = (int) str_replace(',', '', $amountString);
        $content = $request->content_qr;
        $qr_url = "https://img.vietqr.io/image/970416-{$account_no}-compact.png?amount={$amount}&addInfo={$content}";

        return response()->json(['qr_url' => $qr_url, 'content' => $content, 'account_no' => $account_no, 'amount' => $amount, 'account_name' => $account_name]);
    }
}
