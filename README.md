# Busca CEP
Buscador de endereços no site ViaCEP baseado no CEP.
Para maiores informações [Visite ViaCEP](https://viacep.com.br/)

## Instruções

### Instalação
Execute no terminal:
```
composer require "adrpnt/busca-cep"
```

Ou edite seu composer.json e adicione
```
require : {
    "adrpnt/busca-cep" : "dev-master"
}
```
### Exemplo
```
use Cep\BuscaCep;
$busca_cep = new BuscaCep();
result = $busca_cep->busca('00000-000');
```

Você pode pesquisar o CEP nos formatos **00000-000** ou **00000000**