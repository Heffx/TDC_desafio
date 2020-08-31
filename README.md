##Desafio TDC
Projeto desenvolvido utilizando laravel, mysql e docker.
Todos os arquivos de funcionamento foram enviados, incluindo db populado e .env. 
Para rodar o sistema, basta subir os containers com o docker.

docker-compose up --build

Caso queira executar comandos do laravel, acessar o container app.

docker exec -it app bash

Funcionamento
Rota principal localhost:8000/

Caso o usuário nao esteja logado, será redirecionado para rota de login. Após o login ser efetuado com sucesso o usuário será redirecionado para a rota principal.

Usuário cadastrado
email: admin@admin.com
senha: 12345678

Para funcionar a autenticação em 3 níveis, foi criada uma variável que ao se registrar direto na rota de registro ele cria por default
o usuário com permissões apenas de comentários. O sistema possui apenas o administrador default. Ao criar uma Loja e criado um usuário que
acessa apenas informações da sua loja.


Foi preparado um seed para adicionar um usuário, apenas popule o banco com o seed

php artisan db:seed

Não implementei a parte de relatórios, por falta de tempo.
