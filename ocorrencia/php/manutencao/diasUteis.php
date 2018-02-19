<?php
	function diasUteis($dia){
		//Verifica Feriados fixos.
		$i = 17;

		if (date('N', strtotime($dia)) == 7){ //Se for domingo o registro será realizado na segunda feira.
    		return ++$dia;
    	}else if (date('N', strtotime($dia)) == 6) { //Se for sabado o registro será realizado na segunda feira.
    		$dia2 = ++$dia;
    		return ++$dia2;
    	}else if (date('N', strtotime($dia)) == 5) { //Verifica regra de sexta com apatricia;
    		$dia2 = ++$dia;
    		return ++$dia2;
    	}else{
    		while ($i < 99) {
			//se for natal, a função retorna um dia depois
			if ($dia == '20'.$i.'-12-25') {
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}
			}else if ($dia == '20'.$i.'-12-24') {
    			return ++$dia;
    			break;
			//se for ano novo, a função retorna um dia depois
    		}else if ($dia == '20'.$i.'-01-01'){
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}	
			}else if ($dia == '20'.$i.'-12-31') {
				return ++$dia;
    			break;
			//se for feriado de tiradentes, a função retorna um dia depois
			}else if ($dia == '20'.$i.'-04-21') {
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}
			}else if ($dia == '20'.$i.'-04-20') {
				return ++$dia;
				break;
			//se for feriado de independencia do brasil, a função retorna um dia depois
			}else if ($dia == '20'.$i.'-09-07'){
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}
			}else if ($dia == '20'.$i.'-09-06') {
				return ++$dia;
				break;
			//se for dia das crianças e dia de nossa senhora da aparecida, a função retorna um dia depois
			}else if ($dia == '20'.$i.'-10-12') {
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}
			}else if ($dia == '20'.$i.'-10-11') {
				return ++$dia;
				break;
			//se for dia de finados, a função retorna um dia depois
			}else if ($dia == '20'.$i.'-11-02') {
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}
				}else if ($dia == '20'.$i.'-11-01') {
				return ++$dia;
				break;
			//se for dia da proclamação da república, a função retorna um dia depois
			}else if ($dia == '20'.$i.'-11-15'){
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}
			}else if ($dia == '20'.$i.'-11-14') {
				return ++$dia;
				break;
			//se for feriado do dia dos trabalhadores, a função retorna um dia depois
			}else if ($dia == '20'.$i.'-05-01'){ 
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}
				}else if ($dia == '20'.$i.'-04-30') {
				return ++$dia;
				break;
			}else if ($dia == '20'.$i.'-02-02'){ 
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				break;
				}
				}else if ($dia == '20'.$i.'-02-01') {
				return ++$dia;
				break;
			}
			
			$i++;
		}//Final do While{}

		/*Feriados móveis*/

		//recesso de carnaval de 2018

		if ($dia == '2018-02-13'){ 
				if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2018-02-12') {
				return ++$dia;
				
		//feriado pascoa 2018
		}else if ($dia == '2018-04-01') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2018-03-31') {
				return ++$dia;
			
		//Feriado Corpus Crist 2018
		}else if ($dia == '2018-05-31') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2018-05-30') {
				return ++$dia;
				
		//carnaval 2019
		}else if ($dia == '2019-03-05') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
		
				}
				}else if ($dia == '2019-03-04') {
				return ++$dia;
			
		//feriado corpus cristi 2019
		}else if ($dia == '2019-06-20') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2019-06-19') {
				return ++$dia;
				
		//carnaval 2020
		}else if ($dia == '2020-02-25') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2020-02-24') {
				return ++$dia;
				
		//pascoa 2020
		}else if ($dia == '2020-04-12') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2020-04-11') {
				return ++$dia;
				
		//Corpus Crist 2020
		}else if ($dia == '2020-06-11') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2020-06-10') {
				return ++$dia;
				
		//Carnaval 2021
		}else if ($dia == '2021-02-16') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2021-02-15') {
				return ++$dia;
				
		//pascoa 2021
		}else if ($dia == '2021-04-04') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2021-04-03') {
				return ++$dia;
				
		//Corpus Crist 2021
		}else if ($dia == '2021-06-03') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2021-06-02') {
				return ++$dia;
				
		//Carnaval 2022
		}else if ($dia == '2022-03-01') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2022-02-28') {
				return ++$dia;
				
		//Pascoa 2022
		}else if ($dia == '2022-04-17') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2022-04-16') {
				return ++$dia;
				
		//Corpus Cristi 2022
		}else if ($dia == '2022-06-16') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2022-06-15') {
				return ++$dia;
				
		//Carnaval 2023
		}else if ($dia == '2023-02-21') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2023-02-20') {
				return ++$dia;
				
		//Pascoa 2023
		}else if ($dia == '2023-04-09') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2023-04-08') {
				return ++$dia;
				
		//Corpus cristi 2023
		}else if ($dia == '2023-06-08') {
			if (date('N', strtotime($dia)) == 4) {
					$dia2 = ++$dia;
					$dia3 = ++$dia2;
					$dia4 = ++$dia3;
					return $dia4;
				}else{
				return ++$dia;
				
				}
				}else if ($dia == '2023-06-07') {
				return ++$dia;
				
		}else {
			return $dia;
		}	
    }

	} //Final da função{}


/*
	Se eu precisar futuramente.

	function FimDeSemana($dia) {
    	if (date('N', strtotime($dia)) >= 6){
    		echo "Final de Semana";
    	}
	}
*/
?>