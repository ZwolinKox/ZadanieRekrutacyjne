<?php

use Latte\Runtime as LR;

/** source: ./views/category.latte */
final class Template2d717171fe extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'content' => 'blockContent', 'script' => 'blockScript'],
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
		echo '
    
';
		$this->renderBlock('script', get_defined_vars()) /* line 131 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['message' => '89', 'element' => '88, 103'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		$this->parentName = 'layouts/layout.latte';
		
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Kategorie';
	}


	/** {block content} on line 6 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edytuj kategorie</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="editForm" action="./categories/edit/1">
                <div class="form-group">
                    <label for="categoryName" class="col-form-label">Nazwa kategorii:</label>
                    <input type="text" class="form-control" name="categoryName" id="editCategoryName">
                </div>             
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Czy na pewno chcesz usunąć kategorie <span id="deleteCategoryName"></span> </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <button type="submit" class="btn btn-md btn-danger" id="deleteCategoryHref">Tak</button>
                <button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal" aria-label="Close" class="btn btn-primary">Nie</button>
            </div>
        </div>
    </div>
    </div>

    
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModalLabel">Nowa kategoria </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form method="POST" id="newForm" action="./categories">
                    <div class="form-group">
                        <label for="categoryName" class="col-form-label">Nazwa kategorii:</label>
                        <input type="text" class="form-control" name="categoryName" id="newCategoryName">
                    </div>    
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="submit" class="btn btn-primary">Dodaj kategorie</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

    <div class="container body-content">
    <button type="button" class="btn btn-primary" style="margin: 15px" onclick="location.href=\'./home\'">Wróć do menu</button>
        <div class="page-header">
            <h2 style="text-align: center">Kategorie</h2>
            <div class="form-group">
                <fieldset>
                    <form action="" class="form-group" method="post">
                        <div class="table-responsive">
                            <div class="table-responsive">     
                                <button type="button" class="float-right btn btn-primary" data-bs-target="#newModal" data-bs-toggle="modal" style="margin: 15px">Dodaj kategorie</button>

                                <div>
';
		$iterations = 0;
		foreach ($errors as $element) /* line 88 */ {
			$iterations = 0;
			foreach ($element as $message) /* line 89 */ {
				echo '                                            <h6 style="color: red;">';
				echo LR\Filters::escapeHtmlText($message) /* line 90 */;
				echo '</h6>
';
				$iterations++;
			}
			$iterations++;
		}
		echo '                                </div>

                                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%" data-bs-toggle="table" data-bs-locale="pl-PL">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nazwa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
';
		$iterations = 0;
		foreach ($categories as $element) /* line 103 */ {
			echo '                                                <tr>
                                                    <td>';
			echo LR\Filters::escapeHtmlText($element->id) /* line 105 */;
			echo '</td>
                                                    <td>';
			echo LR\Filters::escapeHtmlText($element->name) /* line 106 */;
			echo '</td>
                                                    <td class="text-center">
                                                        <div class="btn-group inline">
                                                            <button type="button" class="btn btn-success" data-bs-target="#editModal" data-bs-toggle="modal" 
                                                                data-category-id="';
			echo LR\Filters::escapeHtmlAttr($element->id) /* line 110 */;
			echo '" data-category-name="';
			echo LR\Filters::escapeHtmlAttr($element->name) /* line 110 */;
			echo '"><i class="fas fa-edit" style="font-size: 16px"></i>Edytuj</button>
                                                            <button type="button" class="btn btn-danger" data-bs-target="#deleteModal" data-bs-toggle="modal"
                                                               data-category-id="';
			echo LR\Filters::escapeHtmlAttr($element->id) /* line 112 */;
			echo '" data-category-name="';
			echo LR\Filters::escapeHtmlAttr($element->name) /* line 112 */;
			echo '"><i class="fas fa-trash-alt" style="font-size: 16px"></i>Usuń</button>
                                                        </div>
                                                    </td>
                                                </tr>
';
			$iterations++;
		}
		echo '                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
            <hr>
        </div>
    </div>
    

';
	}


	/** {block script} on line 131 */
	public function blockScript(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '    <script>

        $(document).ready (function (){
            $(\'#editModal\').on(\'show.bs.modal\', function(e) {
                const categoryId = $(e.relatedTarget).data(\'category-id\');
                const categoryName = $(e.relatedTarget).data(\'category-name\');

                
                $(e.currentTarget).find(\'form\').attr(\'action\', \'./categories/edit/\' + categoryId);
                $(e.currentTarget).find(\'input[name="categoryName"]\').val(categoryName);

            });
            
            $(\'#deleteModal\').on(\'show.bs.modal\', function(e) {
                const categoryId = $(e.relatedTarget).data(\'category-id\');
                const categoryName = $(e.relatedTarget).data(\'category-name\');
                
                $(e.currentTarget).find(\'#deleteCategoryName\').text(categoryName);
                $(e.currentTarget).find(\'#deleteCategoryHref\').click(function() {
                    location.href = "./categories/delete/" + categoryId;
                });
            });
        });
    </script>
';
	}

}
