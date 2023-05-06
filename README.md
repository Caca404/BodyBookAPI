# Body Book

## Instalação e Uso
Primeiro instale os pacotes do composer pelo seguinte comando:

    composer install
    
Depois, crie um arquivo _.env_ e copie as infos do arquivo _.env.example_. Preencha as infos do banco de dados MySQL (Se quiser usar outro, pesquise como faz). Após isso, crie uma chave de segurança do Laravel pelo comando: 

    php artisan key:generate
    
Em seguida, faça a migração dos dados pelo comando:

    php artisan migrate
    
Caso queira popular o banco de dados com dados ficticios, acrescente no final "--seed":

    php artisan migrate --seed
    
Depois disso tudo, para iniciar o servidor:

    php artisan serve
    
No entanto, o Laravel deixa que você não precise todas as vezes redirecionar na porta :8000 do localhost, já que é um problema pro React Native que está num dispositivo diferente do seu computador. Então, quando for apontar para API do Laravel pelo App React Native, coloque a seguinte string de API:

    http://<ip-do-seu-pc>/BodyBookAPI/public
    
Para isso funcionar, você precisa de um servidor WAMP ou XAMP para criar um VirtualHost da sua aplicação direcionada para essa pasta. Além disso, também precisa que o seu computador aceite requisições de outros dispositivos dentro de uma rede. Para isso: 

1. Entre no "Windows Defender Firewall com Segurança Avançada".
2. Crie uma nova regra de entrada.
3. Tipo Porta.
4. TCP e a porta 80 (protocolo http).
5. Permitir conexão.
6. Selecione dentro do seu dominio e particular, não deixando aceitar requisições publicas.
7. Por fim, coloque o nome que deseja.
