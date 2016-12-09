<?php

/**
 * categoriesController
 */
class categoriesController extends AppsController
{
	
	public function __construct()
	{
		parent::__construct();
		//Es para agregar la ruta de las librerias
		$this->_view->setlayout("website");

	}
	/**
	 * Metodo que permite hacer listado de las categorias 
	 * @return array es un conjunto de categorias a mostrar
	 * @author  Edwin Poot Diaz <edwin.poot.diaz@gmail.com>
	 * @access  public 
	 */	
	public function index()
	{
		//Estos valores se envian en la vista de los usuarios index.php
		$categories = $this->categories->find("categories", "all");
		$categoriesCount = $this->categories->find("categories", "count");
		$this->set("categories", $categories);
		$this->set("categoriesCount", $categoriesCount);

		//$this->set("categories", $this->categories->find("categories"));
	}
	/**
	 * Description
	 * @return type
	 */

	public function add(){
		if ($_SESSION["type_name"]=="Administradores") {

			if ($_POST) {
			//Manda los valores en la funcion save para guardar los registros
			if ($this->categories->save("categories",$_POST )) {
				$this->redirect(array("controller"=>"categories"));
			}else{
				$this->redirect(array("controller"=>"categories", "methos"=>"add"));
			}
		}
		$this->set("categories", $this->categories->find("categories"));//Hacemos referencia a la tabla types
		$this->_view->setView("add");//Es una funcion indicamos que vista queremos visualizar
		}else{
			$this->redirect(array("controller"=>"categories"));
		}
	}

		public function edit($id){

		if ($_SESSION["type_name"]=="Administradores") {
			//$this->_view->setlayout("website");
			if ($_GET) {
				if ($id){
					$options = array("conditions"=>"id=".$id);
					$category = $this->categories->find("categories", "first", $options);
					$this->set("category", $category);
				}else{
					//Redirecciona cuando se hace la peticion de update
					$this->redirect(array("controller"=>"categories"));
				}
				//Comporbar si esta recibiendo los datos con el $_POST
				if ($_POST) {
					//Primero le mandamo el nombre d ela tabla y luego el POST es donde estan almacenados los datos a editar
					if ($this->categories->update("categories", $_POST)) {
						$this->redirect(array("controller"=>"categories"));
					}else{
					$this->redirect(array("controller"=>"categories", "method"=>"edit/".$_POST["id"]));
					}
					
				}	
			}
		}else{
			$this->redirect(array("controller"=>"categories"));
		}	
	}


	public function delete($id){
		if ($_SESSION["type_name"]=="Administradores") {
			$conditions = "id=".$id;
			if ($_GET) {
				if ($this->categories->delete("categories", $conditions)) {
					$this->redirect(array("controller"=>"categories"));
				}else{
					$this->redirect(array("controller"=>"categories", "method"=>"add"));
				}
			}
		}else{
			$this->redirect(array("controller"=>"categories"));
		}
	}

}