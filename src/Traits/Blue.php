<?php

namespace ShawnSandy\Bluelines\Traits;

trait Blue {

	public function posts() {
		return $this->hasMany(User::class);

	}
}
