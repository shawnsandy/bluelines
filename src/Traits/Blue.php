<?php

namespace ShawnSandy\Bluelines\Traits;

use ShawnSandy\Bluelines\App\Blueline;

trait Blue {

	public function content() {
		return $this->hasMany(Blueline::class);

	}
}
