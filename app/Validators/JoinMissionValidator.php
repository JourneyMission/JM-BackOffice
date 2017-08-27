<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class JoinMissionValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Profile_ID=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Profile_ID=>required',
	],
   ];
}
