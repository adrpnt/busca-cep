<?php 

namespace Cep;

/**
 * Class BuscaCEP
 * 
 * Busca endereços no site ViaCEP pelo CEP informado.
 */
class BuscaCep {
	/**
     * @constant string URL do ViaCEP para fazer a busca
     */
    CONST URL = "https://viacep.com.br/ws/[cep]/[type]/";

     /**
     * Faz a busca pelo endereço do CEP informado e imprime um JsonArray com o endereço encontrado
     * ou vazio em caso de erro
     * 
     * @param string $cep CEP nos formatos XXXXXXXX ou XXXXX-XXX
     * @param string $type Tipo de retorno ("json", "xml", "piped" ou "querty")
     * @echo string
     */
    public function busca($cep, $type = json) {
    	if(!$this->validarCep($cep)){
    		return json_encode(['error' => "CEP em formato inválido."];
    	}

        $url = str_replace(array('[cep]', '[type]'), array($cep, $type), self::URL);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);

        return $data;
    }

    // verifica o formato numérico do CEP
	private function validarCep($cep) {
	    // retira espacos em branco
	    $cep = str_replace("-", "", trim($cep));

	    // expressao regular para avaliar o cep
	    $checkCep = preg_match("^[0-9]{8}$", $cep);
	    
	    // verifica o resultado
	    if(!$checkCep) {            
	        return false;
	    }
	    
	    return true;
	}
}