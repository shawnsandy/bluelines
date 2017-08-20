<?php

namespace ShawnSandy\Bluelines\Traits;

trait Blue {

	public function post()
		    {
		return $this->hasMany(User::class)  ;

	}
}
