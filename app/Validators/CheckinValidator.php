<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CheckinValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Checkin_Date=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Checkin_Date=>required',
	],
   ];
}
