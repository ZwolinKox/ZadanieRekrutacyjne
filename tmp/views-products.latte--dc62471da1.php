<?php

use Latte\Runtime as LR;

/** source: ./views/products.latte */
final class Templatedc62471da1 extends Latte\Runtime\Template
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
		$this->renderBlock('script', get_defined_vars()) /* line 184 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['element' => '38, 100, 127, 145', 'message' => '128'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		$this->parentName = 'layouts/layout.latte';
		
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Produkty';
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
            <h5 class="modal-title" id="editModalLabel">Edytuj produkt</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="editForm" action="./products/edit/1">
                <div class="form-group">
                    <label for="productName" class="col-form-label">Tytuł produktu:</label>
                    <input type="text" class="form-control" name="productName" id="editproductName">
                </div>
                <div class="form-group">
                    <label for="productDescription" class="col-form-label">Opis produktu:</label>
                    <input type="text" class="form-control" name="productDescription" id="editproductName">
                </div>
                <div class="form-group">
                    <label for="productStatus" class="col-form-label">Status</label>
                    <select name="productStatus" id="editstatus" class="form-control">
                        <option value="1">Dostępny</option>
                        <option value="2">Brak</option>
                        <option value="3">Wycofany</option>
                    </select>
                </div>       
                <div class="form-group">
                    <label for="categoryId" class="col-form-label">Kategoria</label>
                    <select name="categoryId" id="categoryId" class="form-control">
';
		$iterations = 0;
		foreach ($categories as $element) /* line 38 */ {
			echo '                            <option value="';
			echo LR\Filters::escapeHtmlAttr($element->id) /* line 39 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($element->name) /* line 39 */;
			echo '</option>
';
			$iterations++;
		}
		echo '                    </select>
                </div>                 
            </div>
            <div class="modal-footer text-center">
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
                <h5 class="modal-title" id="deleteModalLabel">Czy na pewno chcesz usunąć produkt "<span id="deleteproductName"></span>"?</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <button type="submit" class="btn btn-md btn-danger" id="deleteproductHref">Tak</button>
                <button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal" aria-label="Close" class="btn btn-primary">Nie</button>
            </div>
        </div>
    </div>
    </div>

    
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModalLabel">Nowy produkt</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form method="POST" id="newForm" action="./products">
                <div class="form-group">
                    <label for="productName" class="col-form-label">Tytuł produktu:</label>
                    <input type="text" class="form-control" name="productName" id="newproductName">
                </div>
                <div class="form-group">
                    <label for="productDescription" class="col-form-label">Opis produktu:</label>
                    <input type="text" class="form-control" name="productDescription" id="newproductName">
                </div>
                <div class="form-group">
                    <label for="productStatus" class="col-form-label">Status</label>
                    <select name="productStatus" id="newstatus" class="form-control">
                        <option value="1">Dostępny</option>
                        <option value="2">Brak</option>
                        <option value="3">Wycofany</option>
                    </select>
                </div>       
                <div class="form-group">
                    <label for="categoryId" class="col-form-label">Kategoria</label>
                    <select name="categoryId" id="newcategoryId" class="form-control">
';
		$iterations = 0;
		foreach ($categories as $element) /* line 100 */ {
			echo '                            <option value="';
			echo LR\Filters::escapeHtmlAttr($element->id) /* line 101 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($element->name) /* line 101 */;
			echo '</option>
';
			$iterations++;
		}
		echo '                    </select>
                </div>                      
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-primary">Dodaj produkt</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <div class="container body-content">
    <button type="button" class="btn btn-primary" style="margin: 15px" onclick="location.href=\'./home\'">Wróć do menu</button>
        <div class="page-header">
            <h2 style="text-align: center">Produkty</h2>
            <div class="form-group">
                <fieldset>
                    <form action="" class="form-group" method="post">
                        <div class="table-responsive">
                            <div class="table-responsive">     
                                <button type="button" class="float-right btn btn-primary" data-bs-target="#newModal" data-bs-toggle="modal" style="margin: 15px">Dodaj produkt</button>     

                                <div>
';
		$iterations = 0;
		foreach ($errors as $element) /* line 127 */ {
			$iterations = 0;
			foreach ($element as $message) /* line 128 */ {
				echo '                                            <h6 style="color: red;">';
				echo LR\Filters::escapeHtmlText($message) /* line 129 */;
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
                                            <th>Tytuł</th>
                                            <th>Opis</th>
                                            <th>Status</th>
                                            <th>Kategoria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
';
		$iterations = 0;
		foreach ($products as $element) /* line 145 */ {
			echo '                                                <tr>
                                                    <td>';
			echo LR\Filters::escapeHtmlText($element->id) /* line 147 */;
			echo '</td>
                                                    <td>';
			echo LR\Filters::escapeHtmlText($element->name) /* line 148 */;
			echo '</td>
                                                    <td>';
			echo LR\Filters::escapeHtmlText($element->description) /* line 149 */;
			echo '</td>

';
			if ($element->status == 1) /* line 151 */ {
				echo '                                                        <td>Dostępny</td>
';
			}
			elseif ($element->status == 2) /* line 153 */ {
				echo '                                                        <td>Brak</td>
';
			}
			else /* line 155 */ {
				echo '                                                        <td>Wycofany</td>
';
			}
			echo '
                                                    <td>';
			echo LR\Filters::escapeHtmlText($element->categoryName) /* line 159 */;
			echo '</td>
                                                    <td class="text-center">
                                                        <div class="btn-group inline">
                                                            <button type="button" class="btn btn-success" data-bs-target="#editModal" data-bs-toggle="modal" 
                                                                data-product-id="';
			echo LR\Filters::escapeHtmlAttr($element->id) /* line 163 */;
			echo '" data-product-name="';
			echo LR\Filters::escapeHtmlAttr($element->name) /* line 163 */;
			echo '" data-product-description="';
			echo LR\Filters::escapeHtmlAttr($element->description) /* line 163 */;
			echo '" data-product-status="';
			echo LR\Filters::escapeHtmlAttr($element->status) /* line 163 */;
			echo '" data-product-category="';
			echo LR\Filters::escapeHtmlAttr($element->category_id) /* line 163 */;
			echo '"><i class="fas fa-edit" style="font-size: 16px"></i>Edytuj</button>
                                                            <button type="button" class="btn btn-danger" data-bs-target="#deleteModal" data-bs-toggle="modal"
                                                                data-product-id="';
			echo LR\Filters::escapeHtmlAttr($element->id) /* line 165 */;
			echo '" data-product-name="';
			echo LR\Filters::escapeHtmlAttr($element->name) /* line 165 */;
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


	/** {block script} on line 184 */
	public function blockScript(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '    <script>

        $(document).ready (function (){
            $(\'#editModal\').on(\'show.bs.modal\', function(e) {
                const productId = $(e.relatedTarget).data(\'product-id\');
                const productName = $(e.relatedTarget).data(\'product-name\');
                const productDescription = $(e.relatedTarget).data(\'product-description\');
                const productStatus = $(e.relatedTarget).data(\'product-status\');
                const productCategory = $(e.relatedTarget).data(\'product-category\');
                
                $(e.currentTarget).find(\'form\').attr(\'action\', \'./products/edit/\' + productId);
                $(e.currentTarget).find(\'input[name="productName"]\').val(productName);
                $(e.currentTarget).find(\'input[name="productDescription"]\').val(productDescription);
                $(e.currentTarget).find(\'select[name="productStatus"]\').val(productStatus);
                $(e.currentTarget).find(\'select[name="categoryId"]\').val(productCategory);
            });
            
            $(\'#deleteModal\').on(\'show.bs.modal\', function(e) {
                const productId = $(e.relatedTarget).data(\'product-id\');
                const productName = $(e.relatedTarget).data(\'product-name\');
                
                $(e.currentTarget).find(\'#deleteproductName\').text(productName);
                $(e.currentTarget).find(\'#deleteproductHref\').click(function() {
                    location.href = "./products/delete/" + productId;
                });
            });
        });
    </script>
';
	}

}
