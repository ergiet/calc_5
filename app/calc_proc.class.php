<?php

require_once $conf->root_path.'/libs/Smarty.class.php';
require_once $conf->root_path.'/app/Messages.class.php';
require_once $conf->root_path.'/app/CalcData.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class calc_proc{
	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku


	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcData();
		$this->result = new CalcResult();
	}

	public function getParams(){
		$this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
		$this->form->okres = isset($_REQUEST['okres']) ? $_REQUEST['okres'] : null;
		$this->form->oproc = isset($_REQUEST['oproc']) ? $_REQUEST['oproc'] : null;
	}

	public function validate() {
		if (! (isset($this->form->kwota) && isset($this->form->okres) && isset($this->form->oproc))){
			return false;
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == ""){
			$this->msgs->addError('Nie podano kwoty.');
		}
		if ($this->form->okres == ""){
			$this->msgs->addError('Nie podano terminu spłaty.');
		}
        if ($this->form->oproc == ""){
			$this->msgs->addError('Nie podano oprocentowania.');
		}
		
		if (! $this->msgs->isError()){
			
			if (! is_numeric ( $this->form->kwota )){
				$this->msgs->addError('Wpisana kwota nie jest liczbą.');
			}
			if (! is_numeric ( $this->form->okres )){
				$this->msgs->addError('Wpisany termin zwrotu nie jest liczbą.');
			}
            if (! is_numeric ( $this->form->oproc )){
				$this->msgs->addError('Wpisane oprocentowanie nie jest liczbą.');
			}
		}
		return ! $this->msgs->isError();
	}

	public function process(){
		$this->getparams();
		if ($this->validate()) {
			$this->form->kwota = intval($this->form->kwota);
			$this->form->okres = floatval($this->form->okres);
            $this->form->oproc = intval($this->form->oproc);

			$this->msgs->addInfo('Parametry poprawne.');
				
            $this->result->result = round($this->form->kwota/($this->form->okres*12) + ($this->form->kwota/($this->form->okres*12))*($this->form->oproc/100), 2);
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}

    public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Przykład 05');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);

    if($this->msgs->isError()){
        echo "Wystąpiły błędy: <br><ol>";
            foreach($this->msgs->getErrors() as $err){
                echo "<li>" . $err . "</li>";
            }
        echo '</ol>';
    }

if($this->msgs->isInfo()){
	echo "Informacje: <br><ol>";
	foreach($this->msgs->getInfos() as $inf){
        echo "<li>" . $inf . "</li>";
    	}
    echo '</ol>';
}

    if(isset($this->result->result)){
        echo "Miesięczna rata wynosi: " . $this->result->result . " złotych.";
    }
}
}
?>