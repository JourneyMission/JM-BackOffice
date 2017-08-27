<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BadgeValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Badge_status=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Badge_status=>required',
	],
   ];
}
