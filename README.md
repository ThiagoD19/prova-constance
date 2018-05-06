## Prova-PHP

#### Requisitos do servidor
   
    PHP >= 7.1.3
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension
    Ctype PHP Extension
    JSON PHP Extension
    Composer
    Git

#### Instalação
    
   + Clone o repositório, [ git clone git@github.com:ThiagoD19/prova-php.git ] 
   + Execute o comando 'composer install'
   + Renomeie ou copie o arquivo '.env.example' para '.env'
   + Execute os comandos 'php artisan key:generate' e 'php artisan storage:link'
   + Defina suas credenciais de banco de dados em seu arquivo '.env'
   + Execute o comando 'php artisan migrate' ou 'php artisan migrate --seed'
   + Execute o comando 'php artisan serve'
   + Visite 'localhost:8000' no seu navegador
    
   ##### Importante:
      Se o comando 'php artisan storage:link' não for executado as imagens não serão acessíveis a partir da Web.
    
    



