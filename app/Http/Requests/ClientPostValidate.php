<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ClientPostValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,dns'],
            'firstName' => ['required', 'string'],
            'secondName' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'secondSurname' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'job' => ['required', 'string'],
            'department' => ['required', 'string'],
            'city' => ['required', 'string'],
            'identification' => ['required', 'string'],
            'identificationType' => ['required', 'string'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $transformed = $this->convertMessage($errors);
        throw new HttpResponseException(response()->json(['errors' => $transformed],
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY));

    }

    /**
     * @param array $errors
     * @return array
     */
    private function convertMessage($errors)
    {
        $transformed = [];
        foreach($errors as $field => $message) {
            $message_show = null;
            if(count($message) > 1) {
                foreach($message as $tmp) {
                    foreach($tmp as $key => $value) {
                        $message_show[$key] = $value;
                    }
                }
            } else {
                $message_show = $message[0];
            }
            $transformed[$field] = $message_show;
        }
        return $transformed;
    }

}
