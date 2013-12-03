<? php namespace MC\Validators;

class ContactUsValidator extends Validator {

    protected static $rules = [
        'name'        => 'required',
        'email'       => 'required|email',
        'description' => 'required',

    ];
}