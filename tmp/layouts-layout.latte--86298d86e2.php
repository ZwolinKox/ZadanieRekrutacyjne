<?php

use Latte\Runtime as LR;

/** source: views\layouts\layout.latte */
final class Template86298d86e2 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'content' => 'blockContent', 'script' => 'blockScript'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<!doctype html>
<html lang="pl" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./resources/css/lux.css">
    <link rel="stylesheet" href="./resources/css/app.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">


    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script defer src="https://kit.fontawesome.com/0f41993dae.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    


    <title>';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars()) /* line 18 */;
		echo ' | Zadanie rekrutacyjne PHP Developer</title>
  </head>
  <body>
        <div class="se-pre-con"></div>
        <div id="app" class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <div class="container">
                <a class="navbar-brand" href="./home">
                    Zadanie rekrutacyjne PHP Developer
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __(\'Toggle navigation\') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
';
		if (!Aurora\Auth\Auth::isLogin()) /* line 38 */ {
			echo '                            <li class="nav-item">
                            <a class="nav-link" href="./login">Logowanie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./register">Rejestracja</a>
                            </li>
';
		}
		echo '                        
';
		if (Aurora\Auth\Auth::isLogin()) /* line 47 */ {
			echo '                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                ';
			echo LR\Filters::escapeHtmlText(Aurora\Auth\Auth::user()->name) /* line 50 */;
			echo '
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./logout">
                                    Wyloguj się
                                </a>
                            </div>
                        </li>
';
		}
		echo '                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            ';
		$this->renderBlock('content', get_defined_vars()) /* line 66 */;
		echo '
        </main>
        
        <footer class="fixed-bottom text-center bg-dark text-white">
                <p style="margin-top: 25px;">Szymon Zwoliński 2021 &copy;</p>
        </footer>
    </div>

    ';
		$this->renderBlock('script', get_defined_vars()) /* line 74 */;
		echo '
  </body>
</html>';
		return get_defined_vars();
	}


	/** {block title} on line 18 */
	public function blockTitle(array $ʟ_args): void
	{
		
	}


	/** {block content} on line 66 */
	public function blockContent(array $ʟ_args): void
	{
		
	}


	/** {block script} on line 74 */
	public function blockScript(array $ʟ_args): void
	{
		
	}

}
