<?php

namespace PlanA23\Paymob\Classes;

use Illuminate\Http\Request;

class Callback
{

    public function process(Request $request): array
    {
        $string = $request['amount_cents'] . $request['created_at'] . $request['currency'] . $request['error_occured'] . $request['has_parent_transaction'] . $request['id'] . $request['integration_id'] . $request['is_3d_secure'] . $request['is_auth'] . $request['is_capture'] . $request['is_refunded'] . $request['is_standalone_payment'] . $request['is_voided'] . $request['order'] . $request['owner'] . $request['pending'] . $request['source_data_pan'] . $request['source_data_sub_type'] . $request['source_data_type'] . $request['success'];

        if (hash_hmac('sha512', $string, config('PlanA23-payments.PAYMOB_HMAC'))) {
            if ($request['success'] == "true") {
                return [
                    'success' => true,
                    'payment_id'=>$request['order'],
                    'message' => __('PlanA23::messages.PAYMENT_DONE'),
                    'process_data' => $request->all()
                ];
            } else {
                return [
                    'success' => false,
                    'payment_id'=>$request['order'],
                    'message' => __('PlanA23::messages.PAYMENT_FAILED_WITH_CODE',['CODE'=>$this->getErrorMessage($request['txn_response_code'])]),
                    'process_data' => $request->all()
                ];
            }

        } else {
            return [
                'success' => false,
                'payment_id'=>$request['order'],
                'message' => __('PlanA23::messages.PAYMENT_FAILED'),
                'process_data' => $request->all()
            ];
        }
    }
    public function getErrorMessage($code){
        $errors=[
            'BLOCKED'=>__('PlanA23::messages.Process_Has_Been_Blocked_From_System'),
            'B'=>__('PlanA23::messages.Process_Has_Been_Blocked_From_System'),
            '5'=>__('PlanA23::messages.Balance_is_not_enough'),
            'F'=>__('PlanA23::messages.Your_card_is_not_authorized_with_3D_secure'),
            '7'=>__('PlanA23::messages.Incorrect_card_expiration_date'),
            '2'=>__('PlanA23::messages.Declined'),
            '6051'=>__('PlanA23::messages.Balance_is_not_enough'),
            '637'=>__('PlanA23::messages.The_OTP_number_was_entered_incorrectly'),
            '11'=>__('PlanA23::messages.Security_checks_are_not_passed_by_the_system'),
        ];
        if(isset($errors[$code]))
            return $errors[$code];
        else
            return __('PlanA23::messages.An_error_occurred_while_executing_the_operation');
    }


}
