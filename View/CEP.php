<?php

class Cep{

    private $codigoCep;
    private $cidade;
    private $estado;
    private $uf;
    private $logradouro;

     // Getter para codigoCep
     public function getCodigoCep() {
        return $this->codigoCep;
    }

    // Getter para cidade
    public function getCidade() {
        return $this->cidade;
    }

    // Getter  para estado
    public function getEstado() {
        return $this->estado;
    }

    // Getter para uf
    public function getUf() {
        return $this->uf;
    }

    // Getter para logradouro
    public function getlogradouro() {
        return $this->logradouro;
    }

    
    public function CEP($endereco){
        $cep = $endereco;

        function get_endereco($cep){
            $cep = preg_replace("/[^0-9]/","",$cep);
            $url = "http://viacep.com.br/ws/$cep/xml/";
        
            $xml = simplexml_load_file($url);
            return $xml;
        }
        $cep = get_endereco($endereco);

        
       
        
        $cidade = $cep->localidade;
        $UF = $cep->uf;
        $CEP = $cep->cep;
        $logradouro = $cep->logradouro;

        
        
        switch ($UF) {
            case 'AC':
                $estado =  'Acre';
                break;
            case 'AL':
                $estado =  'Alagoas';
                break;
            case 'AP':
                $estado =  'Amapá';
                break;
            case 'AM':
                $estado =  'Amazonas';
                break;
            case 'BA':
                $estado =  'Bahia';
                break;
            case 'CE':
                $estado =  'Ceará';
                break;
            case 'DF':
                $estado =  'Distrito Federal';
                break;
            case 'ES':
                $estado =  'Espírito Santo';
                break;
            case 'GO':
                $estado =  'Goiás';
                break;
            case 'MA':
                $estado =  'Maranhão';
                break;
            case 'MT':
                $estado =  'Mato Grosso';
                break;
            case 'MS':
                $estado =  'Mato Grosso do Sul';
                break;
            case 'MG':
                $estado =  'Minas Gerais';
                break;
            case 'PA':
                $estado =  'Pará';
                break;
            case 'PB':
                $estado =  'Paraíba';
                break;
            case 'PR':
                $estado =  'Paraná';
                break;
            case 'PE':
                $estado =  'Pernambuco';
                break;
            case 'PI':
                $estado =  'Piauí';
                break;
            case 'RJ':
                $estado =  'Rio de Janeiro';
                break;
            case 'RN':
                $estado =  'Rio Grande do Norte';
                break;
            case 'RS':
                $estado =  'Rio Grande do Sul';
                break;
            case 'RO':
                $estado =  'Rondônia';
                break;
            case 'RR':
                $estado =  'Roraima';
                break;
            case 'SC':
                $estado =  'Santa Catarina';
                break;
            case 'SP':
                $estado =  'São Paulo';
                break;
            case 'SE':
                $estado =  'Sergipe';
                break;
            case 'TO':
                $estado =  'Tocantins';
                break;
            default:
                echo 'Estado não encontrado';
        }
        
        //echo $cidade . " " .$UF." ". $CEP." ".$estado;

        $this->cidade = $cidade;
        $this->uf = $UF;
        $this->codigoCep = $CEP;
        $this->estado = $estado;
        $this->logradouro = $logradouro;

        return true;
        

    }
}
