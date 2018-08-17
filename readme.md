# Repositório usado no curso de laravel no USPdev

 - issue 1: Criação de Resource para Disciplinas, com model, controller e migrations
 - issue 2: Implementação do método index (criar exemplos com o tinker)
 - issue 3: Implementar método show, ou seja, criação de página que mostra a disciplina e sua ementa
 - issue 4: Criação de formulário para cadastro de disciplina. Persistir
 - issue 5: Criação de formulário para edição de disciplina. Persistir
 - issue 6: Implementar opção de delete de disciplina. Mostrar botão no index
 - issue 7: Criar model e migrations para Turmas
 - issue 8: Implementar relacionamento entre os Model de Turma e Disciplina
 - issue 9: Criação de formulário para cadastro de turma no contexto da disciplina. Persistir
 - issue 10: Listar as turmas cadastradas nas páginas das disciplinas
 - issue 11: Implementar autenticação de usuário local. Restringir acesso de cadastro de turma e disciplina para usuários logados.
 - issue 12: Implementar busca por nome da disciplina
 - issue 13: Criar o template master usando um exemplo do bootstrap4. Fazer todos outros templetes herdarem o estilo do template master
 - issue 14: Implementar calendário do tipo datepicker (jquery ou bootstrap) nos campos de data início e fim do cadastro de turma

Seeders que podem ajudar na produção de dados aleatórios:

    php artisan db:seed --class=DisciplinaSeeder
    php artisan db:seed --class=TurmaSeeder

Para cada issue, há um teste correspondente, exemplo:

    ./vendor/bin/phpunit --filter Issue2Test

