<?php

use Latte\Runtime as LR;

/** source: ./views/login.latte */
final class Templatec9087e5e56 extends Latte\Runtime\Template
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
            <div class="card">
                <div class="card-header">Zaloguj się</div>

                <div class="card-body">
                    <form method="POST" action="login">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adres email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control ';
		if (isset($error)) /* line 16 */ {
			echo ' is-invalid ';
		}
		echo '" name="email" required autocomplete="email" autofocus>

';
		if (isset($error)) /* line 18 */ {
			echo '                                    <span class="invalid-feedback" role="alert">
                                        <strong>';
			echo LR\Filters::escapeHtmlText($error) /* line 20 */;
			echo '</strong>
                                    </span>
';
		}
		echo '
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    Zaloguj
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
