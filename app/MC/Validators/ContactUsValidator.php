<? php namespace MC\Validators;

class ContactUsValidator extends Validator {

     static $rules = [
        'name'        => 'required',
        'email'       => 'required|email',
        'description' => 'required',

    ];
}