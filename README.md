# Busca CEP
Buscador de endereços no site ViaCEP baseado no CEP, para maiores informações [Visite ViaCEP](https://viacep.com.br/).

## Instruções

### Instalação
Execute no terminal:
```
composer require "adrpnt/busca-cep":"dev-master"
```

Ou edite seu composer.json e adicione
```
require : {
    "adrpnt/busca-cep": "dev-master"
}
```
### Exemplo
```
require 'vendor/autoload.php';

use Cep\BuscaCep;

$busca_cep = new BuscaCep();
$result = $busca_cep->busca($cep, $type);
```

### Resultado
Independente do formato, os campos retornados serão:
```
cep => 01426-000
logradouro => Rua Oscar Freire
complemento => até 608 - lado par
bairro => Cerqueira César
localidade => São Paulo
uf => SP
ibge => 3550308
gia => 1004
```

### Observações
Você pode pesquisar o CEP nos formatos **00000-000** ou **00000000**.

Tipos permitidos ("json", "xml", "piped" ou "querty"), por padrão o tipo é json.