<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CheckpointValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	Checkpoint_Score=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	Checkpoint_Score=>required',
	],
   ];
}
