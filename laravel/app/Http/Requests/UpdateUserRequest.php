<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'fname'                         => 'max:255',
            'lname'                         => 'max:255',
            'newpassword'                   => 'sometimes|min:6|same:confirmpassword',
            'confirmpassword'               => 'required_with:password|sometimes|min:6|same:newpassword'
		];
	}

}
