<?php

use Latte\Runtime as LR;

/** source: ./views/register.latte */
final class Templatebf933e2dc3 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		echo "\n";
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		$this->parentName = 'layouts/layout.latte';
		
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light">
                <div class="card-header">Zarejestruj</div>

                <div class="card-body">
                    <form method="POST" action="./register">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa użytkownika</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control ';
		if (isset($errorName)) /* line 16 */ {
			echo ' is-invalid ';
		}
		echo '" name="name" required autocomplete="name" autofocus>

';
		if (isset($errorName)) /* line 18 */ {
			echo '                                    <span class="invalid-feedback" role="alert">
                                        <strong>';
			echo LR\Filters::escapeHtmlText($errorName) /* line 20 */;
			echo '</strong>
                                    </span>
';
		}
		echo '                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adres email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control ';
		if (isset($errorEmail)) /* line 30 */ {
			echo ' is-invalid ';
		}
		echo '" name="email" required autocomplete="email">

';
		if (isset($errorEmail)) /* line 32 */ {
			echo '                                    <span class="invalid-feedback" role="alert">
                                        <strong>';
			echo LR\Filters::escapeHtmlText($errorEmail) /* line 34 */;
			echo '</strong>
                                    </span>
';
		}
		echo '                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control ';
		if (isset($errorPassword)) /* line 44 */ {
			echo ' is-invalid ';
		}
		echo '" name="password" required autocomplete="new-password">

';
		if (isset($errorPassword)) /* line 46 */ {
			echo '                                    <span class="invalid-feedback" role="alert">
                                        <strong>';
			echo LR\Filters::escapeHtmlText($errorPassword) /* line 48 */;
			echo '</strong>
                                    </span>
';
		}
		echo '                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Potwierdź hasło</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control ';
		if (isset($errorSecondPassword)) /* line 58 */ {
			echo ' is-invalid ';
		}
		echo '" name="password_confirmation" required autocomplete="new-password">

';
		if (isset($errorSecondPassword)) /* line 60 */ {
			echo '                                    <span class="invalid-feedback" role="alert">
                                        <strong>';
			echo LR\Filters::escapeHtmlText($errorSecondPassword) /* line 62 */;
			echo '</strong>
                                    </span>
';
		}
		echo '                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-7">
                                <button type="submit" class="btn btn-outline-primary">
                                    Zarejestruj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
';
	}

}
