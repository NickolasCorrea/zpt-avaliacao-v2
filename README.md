# Avaliação ZPT Digital

Obrigado por dedicar seu tempo à avaliação da ZPT Digital!

O intuito deste teste é termos uma amostra do seu trabalho nos mais diferentes níveis. Faça-o como se você já tivesse sido contratado pela ZPT Digital e estas fossem suas primeiras tarefas nos nossos repositórios. Use esta avaliação para mostrar o melhor de si!

## Questões
Faça as questões em ordem.

Algumas questões podem parecer enigmáticas e pouco detalhadas. Isso é intencional.

Crie uma branch para cada questão e mescle para a `master`.

Ao concluir o teste, compacte e devolva o repositório com suas alterações.

---------------------
**DDL (MySQL)**
```sql
CREATE TABLE `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `department` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `employees` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `user_department` (
  `user` int unsigned NOT NULL,
  `department` int unsigned NOT NULL,
  PRIMARY KEY (`user`,`department`),
  CONSTRAINT `FK_department` FOREIGN KEY (`department`) REFERENCES `department` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB;
```
---------------------

1) Desenhe o MER.
Resposta: Arquivo PNG adicionado na raíz do projeto.

2) O método em [/src/User.php#L7-L15](./src/User.php#L4-L11) está muito lento. Deixe-o mais rápido. Esse método é em pseudocódigo PHP, isto é, não é possível executá-lo de fato. Sua solução pode ser em pseudocódigo também.
Resposta: O método foi modificado para realizar uma única consulta pela lista de IDs.

3) Ainda referente ao método da questão anterior, melhore o nome dele.
Resposta: Melhorado para getUsernamesByIds.

4) Tomando por base o pseudocódigo que já existe, implemente um método que retorne o maior departamento (o que tiver mais `employees`) de cada usuário, isto é, de todos os usuários de uma vez, sem qualquer filtro.
Resposta: Método getLargestDepartmentForAllUsers criado.

5) O que pode ser feito para deixar a query abaixo mais rápida?

```sql
SELECT dept.id FROM user
INNER JOIN user_department u_d ON u_d.user = user.id
INNER JOIN department dept ON u_d.department = dept.id
WHERE user.username = 'zpt'
```
Resposta:
  ```sql
  SELECT dept.id FROM user
  INNER JOIN user_department u_d ON u_d.user = user.id
  WHERE user.username = 'zpt'
  ```
  Tendo em visto que a query retorna o ID do departamento, e o mesmo se encontra na tabela user_department (tabela de ligação), não há necessidade de fazer um JOIN direto com a tabela  departamento pois podemos retornar esse mesmo ID da tabela de ligação.

6) A classe `User` tem o método `setDb()` que recebe uma conexão com o banco de dados. As classes `Company` e `Department` precisam ter esse mesmo método, idêntico. Implemente.
Resposta: O método setDb() foi transferido para a classe Base.php, que é usada como classe mãe das demais classes que necessitam do método.

7) [Esta função](./src/Utils.php#L4) permite atribuir uma conexão em estilo procedural. Faça a função aceitar instâncias de `Company` e `Department` também.
Resposta: Função modificada em Utils.php

8) Utilize a API https://ipinfo.io/json via JavaScript para consultar o IP do usuário e exibir na lacuna designada em [./src/index.html](./src/index.html).
Resposta: Composer e pacote IpInfo instalados para conseguir implementar a API no projeto, cuja o código se encontra em IpInfo.php. O JavaScript foi utilizado para buscar o IP do usuário localizado pelo PHP e mostrar na tela.

9) Crie a classe `CompanyClient`, que é uma `Company` que, além do `id`, tem um número chamado `registration`. A saudação deve exibir o `id` e o `registration`.
Resposta: Classe criada sendo herdeira da `Company`.

10) **Qual commit** introduziu [este erro](./src/Department.php#L10)? Explique e corrija o erro.
RESPOSTA: O erro foi inserido no commit "feat(department): get ready to allow operations on User from inside Department" (hash: b72835e5be4018e4361427b8b099360ad855f80e). A classe está errada, tanto na declaração de seus atributos, quanto no método construtor que está tentando instanciar um User de maneira equivoca.