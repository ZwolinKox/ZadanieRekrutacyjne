<?php

use Latte\Runtime as LR;

/** source: ./views/home.latte */
final class Templatef3ed65fc9e extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		echo "\n";
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo '



';
		$this->renderBlock('content', get_defined_vars()) /* line 6 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		$this->parentName = 'layouts/layout.latte';
		
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Strona główna';
	}


	/** {block content} on line 6 */
	public function blockContent(array $ʟ_args): void
	{
		echo '<div class="container  px-5">
    <div class="card-deck">
        <a href="./products" class="card border-secondary text-center my-card my-card-link">
            <div class="card-body">
                <h4 class="card-title">Artykuły</h4>
            </div>
        </a>
    </div>

    <div class="card-deck">
        <a href="./categories" class="card border-secondary text-center my-card my-card-link">
            <div class="card-body">
                <h4 class="card-title">Kategorie</h4>
            </div>
        </a>
    </div>

</div>

';
	}

}
