# 🧩 Modelagem: Portfólio Felipe Akel

Padrão de modelagem de Banco de Dados.<br>
Este documento define as **boas práticas** e **padrões de modelagem** utilizados no projeto, garantindo padronização, clareza e manutenção consistente do banco de dados.


## 🏗️ Convenções Gerais

No projeto os nomes de tabelas e colunas seguem o padrão **snake case**.

**Snake case** é uma convenção de nomenclatura de programação onde palavras são escritas em letras minúsculas e separadas por um sublinhado "_". É uma forma de tornar o código mais legível, e é frequentemente usado em linguagens de programação e em bancos de dados. 

- **Prefixo de tabelas:** sempre utilizar o prefixo **tb_** para identificar tabelas do banco.
    - **Exemplo:** tb_status, tb_eventos_shows, tb_usuarios.

- **Nome das tabelas:** em regra no plural, com a utilização de padrão **snake case**.
    - ✅ tb_status
    - ✅ tb_eventos_shows
    - ❌ status, tbStatus
    - ❌ eventos_shows, tbEventoShow, tb_EventoShow

- **Prefixo das colunas:** sempre utilizar o prefixo referencial para identificar o tipo de dado que será salvo.
    - id_ → chave estrangeira
    - no_ → nome
    - ds_ → descrição / texto
    - dt_ → data
    - hr_ → hora
    - nr_ → número
    - ch_ → nome / tipo (ex: tamanho máximo definido, flags)
    - bo_ → boolean (ex: true ou false)

- **Nome das colunas:** sempre em **snake case**, com prefixos descritivos aplicável ao tipo de dado que será salvo na coluna.
    - ✅ no_status, no_evento_show
    - ✅ ds_status, ds_evento_show, ds_endereco
    - ✅ dt_evento_show, dt_nascimento, dt_prova
    - ✅ ch_sexo, ch_uf
    - ✅ nr_preco, nr_quantidade
    - ❌ nome, descricao, nome_status, descricao_status, status, evento_show, eventoShow
    - ❌ data_nascimento, dtNascimento


## 🧱 Padrão de Tipos de Dados no Banco de Dados

Esta seção define o tipo de dado a ser utilizado para cada tipo de informação, garantindo padronização, performance e consistência entre tabelas.

### 🔤 Campos de Texto

| Tipo Laravel                   | Tipo SQL Gerado | Tamanho Máximo            | Uso Recomendado                                           | Observações                                                                                            |
| ------------------------------ | --------------- | ------------------------- | --------------------------------------------------------- | ------------------------------------------------------------------------------------------------------ |
| `$table->string('no_campo', 255)` ou `$table->string('ds_campo', 255)` | `VARCHAR(255)`  | 255 caracteres            | Textos curtos como nomes, títulos, e-mails, códigos, CEP, CPF, CNPJ, etc. | Padrão ao não definir o tamanho da coluna, no Laravel é 255.|
| `$table->text('ds_campo')`        | `TEXT`          | ~65.000 caracteres        | Descrições médias e longas, mensagens, URLs longas.                | Não pode ser indexado.                                                                                 |
| `$table->mediumText('ds_campo')`  | `MEDIUMTEXT`    | ~16 milhões de caracteres | Textos grandes (ex: conteúdo de postagens).               | Evite se não for necessário.                                                                           |
| `$table->longText('ds_campo')`    | `LONGTEXT`      | ~4GB de texto             | Grandes volumes de texto (ex: logs, HTML completo, arquivos convertidos em base64).       | Requer muito espaço, use com cautela.                                                                  |
| `$table->char('ch_campo', 1)`     | `CHAR(1)`       | 1, 15 caractere               | Dados com tamanho máximo definido, flags curtos (ex: F = Feminino, M = Masculino, I = Não informado; Unidade Federativa: DF, GO, BA, SP, AM... .).                   | Ideal para campos binários ou de status.                                                               |
| `$table->boolean('bo_campo')`     | `BOOLEAN`       | Boolean: true ou false              | Somente valores: Verdadeiro ou Falso||

### 🔢 Campos Numéricos, Booleans

| Tipo Laravel                          | Tipo SQL Gerado   | Tamanho / Limite           | Uso Recomendado                                  | Observações                                        |
| ------------------------------------- | ----------------- | -------------------------- | ------------------------------------------------ | -------------------------------------------------- |
| `$table->integer('nr_campo')`            | `INT`             | ±2.147.483.647             | IDs manuais, quantidades, CEPs, contadores.      | Para CEP, CPF, e CNPJ utilize o tipo `string` pois podem ser iniciados com zero.
| `$table->bigInteger('nr_campo')`         | `BIGINT`          | ±9.223.372.036.854.775.807 | Valores muito grandes.                           | Evite se não for necessário.                |
| `$table->unsignedBigInteger('id_nome_tabela')` | `BIGINT UNSIGNED` | 0 a 18 quintilhões         | Chaves estrangeiras (`id_usuario`, `id_status`). | Recomendado para relacionamentos.                  |
| `$table->decimal('nr_campo', 10, 2)`     | `DECIMAL(10,2)`   | Precisão 10, 2 casas       | Valores monetários.                              | Evita problemas de arredondamento de `float`.      |
| `$table->float('nr_campo', 8, 2)`        | `FLOAT(8,2)`      | ±16 milhões                | Valores aproximados.                             | Use **apenas** se não for crítico manter precisão. |
| `$table->boolean('bo_campo')`     | `BOOLEAN`       | Boolean: true ou false              | Somente valores: Verdadeiro ou Falso||

### 📅 Campos de Data e Hora

| Tipo Laravel                     | Tipo SQL Gerado | Uso Recomendado                  | Observações                              |
| -------------------------------- | --------------- | -------------------------------- | ---------------------------------------- |
| `$table->timestamp('dt_campo')` | `TIMESTAMP`     | Data e hora com fuso horário UTC | Ideal para eventos, logs e auditorias.   |
| `$table->date('dt_campo')`      | `DATE`          | Apenas a data (AAAA-MM-DD)       | Quando hora não é relevante.             |
| `$table->time('hr_campo')`      | `TIME`          | Apenas hora (HH:MM:SS)           | Ex: horário de funcionamento.            |
| `$table->dateTime('dt_campo')` | `DATETIME`      | Data e hora completas            | Similar a `timestamp`, mas sem timezone. |

### 🔗 Campos de Identificação e Controle
| Tipo Laravel                      | Tipo SQL Gerado                  | Uso Recomendado                               | Observações                                              |
| --------------------------------- | -------------------------------- | --------------------------------------------- | -------------------------------------------------------- |
| `$table->id()`                    | `BIGINT UNSIGNED AUTO_INCREMENT` | Chave primária padrão                         | Sempre usar em tabelas principais.                       |
| `$table->uuid()`                  | `CHAR(36)`                       | Identificador único universal (UUID v4)       | Usado para proteger o valor da chave primária, rastreabilidade e referência entre ambientes. |
| `$table->foreignId('id_nome_tabela')` | `BIGINT UNSIGNED` + FK           | Chave estrangeira com integridade referencial | Simplifica o relacionamento (`references()->on()`).      |

### ⚙️ Campos de Controle Padrão

| Tipo Laravel              | Uso                              | Descrição                                       |
| ------------------------- | -------------------------------- | ----------------------------------------------- |
| `$table->timestamps()`    | Cria `created_at` e `updated_at` | Controle automático de criação e atualização do registro.   |
| `$table->softDeletes()`   | Cria `deleted_at`                | Permite exclusão lógica sem remover o registro. |
| `$table->rememberToken()` | Autenticação                     | Usado em tabelas de usuários (lembrar sessão).  |


## 🧩 Boas Práticas Complementares

- Sempre usar comentários ->comment('...') para documentar o propósito da coluna.
- Ao adicionar uma relacionamento de chave estrangeira, utilize o ->after('uuid') para manter as chaves FK nas primeiras colunas.
- Evite usar float para valores monetários (use decimal).
- Utilize unsignedBigInteger para chaves estrangeiras — garante compatibilidade com $table->id().
- Mantenha nomes consistentes entre tabelas relacionadas (id_usuario, id_status, id_genero_musical, etc.).


## 🚀 Checklist Antes de Subir uma Migration

- [ __ ] Seguiu o padrão de prefixos (no_, ds_, st_, id_, etc)?
- [ __ ] Adicionou uuid, timestamps e softDeletes?
- [ __ ] Incluiu comentários ->comment() em todas as colunas?
- [ __ ] Criou foreign keys corretamente (references()->on())?
- [ __ ] Criou foreign keys e posisionou no inicio da tabela (->after('uuid'))?
- [ __ ] Nomeou a tabela no plural (tb_usuarios, não tb_usuario)?