<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProfileValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Profile_Email=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Profile_Email=>required',
	],
   ];
}
