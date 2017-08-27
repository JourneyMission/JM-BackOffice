<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ReviewValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Profile=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Profile=>required',
	],
   ];
}
