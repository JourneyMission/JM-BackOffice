<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProvienceValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Provience_CodeName=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Provience_CodeName=>required',
	],
   ];
}
