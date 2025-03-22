<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\OrderModel as Order;


class PaymentCheckoutController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function paymentCheckout(Request $request)
    {
        if (isset($_POST['payUrl'])) {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $amount = $request->thanhtien;
            $orderId = $request->order_code;
            $orderInfo = "Thanh toán hóa đơn " . $orderId . " qua MoMo ";
            $redirectUrl = "http://127.0.0.1:8000/kiem-tra-trang-thai-dat-hang";
            $ipnUrl = "http://127.0.0.1:8000/kiem-tra-trang-thai-dat-hang";
            $extraData = "";
            $serectkey = $secretKey;
            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true); // decode json
            //save URL payment before return url
            $order = Order::where('order_code', $orderId)->first();
            $order->order_payment_url = $jsonResult['payUrl'];
            $order->save();
            return redirect()->to($jsonResult['payUrl']);
        } else if (isset($_POST['redirect'])) {
            // $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            // $vnp_Returnurl = "http://127.0.0.1:8000/kiem-tra-trang-thai-dat-hang";
            // $vnp_TmnCode = "7QNE3V4B"; //Mã website tại VNPAY 
            // $vnp_HashSecret = "QBXZZTJKBOVFPXGRUNQTMXXJOEOHCXGE"; //Chuỗi bí mật

            $vnp_Url = env('VNP_URL');
            $vnp_Returnurl = env('APP_URL'). "kiem-tra-trang-thai-dat-hang";
            $vnp_TmnCode = env('VNP_TMNCODE'); //Mã website tại VNPAY 
            $vnp_HashSecret = env('VNP_HASHSECRET'); //Chuỗi bí mật


            $vnp_TxnRef = $request->order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán hóa đơn " . $request->order_code . " qua VNPay ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $request->thanhtien * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00'
                ,
                'message' => 'success'
                ,
                'data' => $vnp_Url
            );
            
            $order = Order::where('order_code', $vnp_TxnRef)->first();
            $order->order_payment_url = $vnp_Url;
            $order->save();
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
    }
}